<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Province;
use App\City;
use App\District;
use App\Customer;
use App\Order;
use App\OrderDetail;
use Illuminate\Support\Str;
use DB;
use App\Mail\CustomerRegisterMail;
use Mail;
use Cookie;
use GuzzleHttp\Client;

class CartController extends Controller
{
    private function getCarts(){
        $carts = json_decode(request()->cookie('my-carts'), true);
        $carts = $carts != '' ? $carts:[];
        return $carts;
    }

    public function addToCart(Request $request){
        
        $this->validate($request, [
            'product_id' => 'required|exists:products,id', 
            'qty' => 'required|integer'
        ]);

        $carts = json_decode($request->cookie('my-carts'), true); 
    
        if ($carts && array_key_exists($request->product_id, $carts)) {
            $carts[$request->product_id]['qty'] += $request->qty;
        } else {
            $product = Product::find($request->product_id);
            $carts[$request->product_id] = [
                'qty' => $request->qty,
                'product_id' => $product->id,
                'product_name' => $product->name,
                'product_price' => $product->price,
                'product_image' => $product->image,
                'weight' => $product->weight
            ];
        }

        $cookie = cookie('my-carts', json_encode($carts), 2880);

        return redirect()->back()->with(['success' => 'Produk Ditambahkan ke Keranjang'])->cookie($cookie);
    }

    public function listCart(){
        //MENGAMBIL DATA DARI COOKIE
        $carts = $this->getCarts();
        //UBAH ARRAY MENJADI COLLECTION, KEMUDIAN GUNAKAN METHOD SUM UNTUK MENGHITUNG SUBTOTAL
        $subtotal = collect($carts)->sum(function($q) {
            return $q['qty'] * $q['product_price']; //SUBTOTAL TERDIRI DARI QTY * PRICE
        });
        //LOAD VIEW CART.BLADE.PHP DAN PASSING DATA CARTS DAN SUBTOTAL
        return view('front.ecommerce.cart', compact('carts', 'subtotal'));
    }

    public function updateCart(Request $request){
        //AMBIL DATA DARI COOKIE
        $carts = $this->getCarts();
        //KEMUDIAN LOOPING DATA PRODUCT_ID, KARENA NAMENYA ARRAY PADA VIEW SEBELUMNYA
        //MAKA DATA YANG DITERIMA ADALAH ARRAY SEHINGGA BISA DI-LOOPING
        if($request->product_id){
            foreach ($request->product_id as $key => $row) {
                //DI CHECK, JIKA QTY DENGAN KEY YANG SAMA DENGAN PRODUCT_ID = 0
                if ($request->qty[$key] == 0) {
                    //MAKA DATA TERSEBUT DIHAPUS DARI ARRAY
                    unset($carts[$row]);
                } else {
                    //SELAIN ITU MAKA AKAN DIPERBAHARUI
                    $carts[$row]['qty'] = $request->qty[$key];
                }
            }
        }
        //SET KEMBALI COOKIE-NYA SEPERTI SEBELUMNYA
        $cookie = cookie('my-carts', json_encode($carts), 2880);
        //DAN STORE KE BROWSER.
        return redirect()->back()->cookie($cookie);
    }

    public function checkout(){
        $provinces = Province::orderBy('created_at', 'DESC')->get();
        $carts = $this->getCarts(); 
        $subtotal = collect($carts)->sum(function($q) {
            return $q['qty'] * $q['product_price'];
        });
        $weight = collect($carts)->sum(function($q) {
            return $q['qty'] * $q['weight'];
        });
        return view('front.ecommerce.checkout', compact('provinces', 'carts', 'subtotal', 'weight'));
    }

    public function getCity(){
        $cities = City::where('province_id', request()->province_id)->get();
        return response()->json(['status' => 'success', 'data' => $cities]);
    }

    public function getDistrict(){
        $districts = District::where('city_id', request()->city_id)->get();
        return response()->json(['status' => 'success', 'data' => $districts]);
    }

    public function processCheckout(Request $request){
        
        $this->validate($request, [
            'customer_name' => 'required|string|max:100',
            'customer_phone' => 'required',
            'email' => 'required|email',
            'customer_address' => 'required|string',
            'province_id' => 'required|exists:provinces,id',
            'city_id' => 'required|exists:cities,id',
            'district_id' => 'required|exists:districts,id',
            'courier' => 'required'
        ]);

        //INISIASI DATABASE TRANSACTION
        //DATABASE TRANSACTION BERFUNGSI UNTUK MEMASTIKAN SEMUA PROSES SUKSES UNTUK KEMUDIAN DI COMMIT AGAR DATA BENAR BENAR DISIMPAN, JIKA TERJADI ERROR MAKA KITA ROLLBACK AGAR DATANYA SELARAS
        DB::beginTransaction();
        try {
            
            //GET COOKIE DARI BROWSER
            $affiliate = json_decode(request()->cookie('my-afiliasi'), true);
            //EXPLODE DATA COOKIE UNTUK MEMISAHKAN USERID DAN PRODUCTID
            $explodeAffiliate = explode('-', $affiliate);

            //CHECK DATA CUSTOMER BERDASARKAN EMAIL
            $customer = Customer::where('email', $request->email)->first();
            //JIKA DIA TIDAK LOGIN DAN DATA CUSTOMERNYA ADA
            if (!auth()->guard('customer')->check() && $customer) {
                return redirect()->back()->with(['error' => 'Silahkan Login Terlebih Dahulu']);
            }

            $carts = $this->getCarts();
            $subtotal = collect($carts)->sum(function($q) {
                return $q['qty'] * $q['product_price'];
            });

           //UNTUK MENGHINDARI DUPLICATE CUSTOMER, MASUKKAN QUERY UNTUK MENAMBAHKAN CUSTOMER BARU
            //SEBENARNYA VALIDASINYA BISA DIMASUKKAN PADA METHOD VALIDATION DIATAS, TAPI TIDAK MENGAPA UNTUK MENCOBA CARA BERBEDA
            if (!auth()->guard('customer')->check()) {
                $password = Str::random(8);
                $customer = Customer::create([
                    'name' => $request->customer_name,
                    'email' => $request->email,
                    'password' => $password,
                    'phone_number' => $request->customer_phone,
                    'address' => $request->customer_address,
                    'district_id' => $request->district_id,
                    'activate_token' => Str::random(30),
                    'status' => false
                ]);
            }

            $shipping = explode('-', $request->courier); //EXPLODE DATA KURIR, KARENA FORMATNYA, NAMAKURIR-SERVICE-COST
            $order = Order::create([
                'invoice' => Str::random(4) . '-' . time(),
                'customer_id' => $customer->id,
                'customer_name' => $customer->name,
                'customer_phone' => $request->customer_phone,
                'customer_address' => $request->customer_address,
                'district_id' => $request->district_id,
                'subtotal' => $subtotal,
                'cost' => $shipping[2], //SIMPAN INFORMASI BIAYA ONGKIRNYA PADA INDEX 2
                'shipping' => $shipping[0] . '-' . $shipping[1], //SIMPAN NAMA KURIR DAN SERVICE YANG DIGUNAKAN
                'ref' => $affiliate != '' && $explodeAffiliate[0] != auth()->guard('customer')->user()->id ? $affiliate:NULL
            ]);
            //CODE DIATAS MELAKUKAN PENGECEKAN JIKA USERID NYA BUKAN DIRINYA SENDIRI, MAKA AFILIASINYA DISIMPAN

            foreach ($carts as $row) {
                $product = Product::find($row['product_id']);
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $row['product_id'],
                    'price' => $row['product_price'],
                    'qty' => $row['qty'],
                    'weight' => $product->weight
                ]);
            }
            
            //TIDAK TERJADI ERROR, MAKA COMMIT DATANYA UNTUK MENINFORMASIKAN BAHWA DATA SUDAH FIX UNTUK DISIMPAN
            DB::commit();

            $carts = [];
            //KOSONGKAN DATA KERANJANG DI COOKIE
            $cookie = cookie('my-cart', json_encode($carts), 2880);
            //KEMUDIAN HAPUS DATA COOKIE AFILIASI
            Cookie::queue(Cookie::forget('my-afiliasi'));

            //EMAILNYA JUGA UNTUK CUSTOMER BARU
            if (!auth()->guard('customer')->check()) {
                Mail::to($request->email)->send(new CustomerRegisterMail($customer, $password));
            }
            //REDIRECT KE HALAMAN FINISH TRANSAKSI
            return redirect(route('front.finish_checkout', $order->invoice))->cookie($cookie);
        } catch (\Exception $e) {
            //JIKA TERJADI ERROR, MAKA ROLLBACK DATANYA
            DB::rollback();
            //DAN KEMBALI KE FORM TRANSAKSI SERTA MENAMPILKAN ERROR
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    
    public function checkoutFinish($invoice){
        //AMBIL DATA PESANAN BERDASARKAN INVOICE
        $order = Order::with(['district.city'])->where('invoice', $invoice)->first();
        //LOAD VIEW checkout_finish.blade.php DAN PASSING DATA ORDER
        return view('front.ecommerce.checkout_finish', compact('order'));
    }

    public function getCourier(Request $request){
        $this->validate($request, [
            'destination' => 'required',
            'weight' => 'required|integer'
        ]);

        //MENGIRIM PERMINTAAN KE API RUANGAPI UNTUK MENGAMBIL DATA ONGKOS KIRIM
        //BACA DOKUMENTASI UNTUK PENJELASAN LEBIH LANJUT
        $url = 'https://ruangapi.com/api/v1/shipping';
        $client = new Client();
        $response = $client->request('POST', $url, [
            'headers' => [
                'Authorization' => 'hwA8w6CMvQZ3U061JU5IGsvrIMr2a7NbBMTo4kSv'
            ],
            //yogyakarta id 5, sleman id 419
            //jawa tengah id 10, klaten id 196
            'form_params' => [
                'origin' => 196, //ASAL PENGIRIMAN, 196 = Klaten
                'destination' => $request->destination,
                'weight' => $request->weight,
                'courier' => 'jne,jnt' //MASUKKAN KEY KURIR LAINNYA JIKA INGIN MENDAPATKAN DATA ONGKIR DARI KURIR YANG LAIN
            ]
        ]);

        $body = json_decode($response->getBody(), true);
        return $body;
    }

}
