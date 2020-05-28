<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Customer;

class FrontController extends Controller
{
    public function index(){
        //MEMBUAT QUERY UNTUK MENGAMBIL DATA PRODUK YANG DIURUTKAN BERDASARKAN TGL TERBARU
        //DAN DI-LOAD 10 DATA PER PAGENYA
        $products = Product::orderBy('created_at', 'DESC')->paginate(10);
        //LOAD VIEW INDEX.BLADE.PHP DAN PASSING DATA DARI VARIABLE PRODUCTS
        return view('front.ecommerce.index', compact('products'));
    }

    public function product(){
        $products = Product::orderBy('created_at', 'DESC')->paginate(12);
        return view('front.ecommerce.product', compact('products'));
    }

    public function categoryProduct($slug){
        $products = Category::where('slug', $slug)->first()->product()->orderBy('created_at', 'DESC')->paginate(12);
        return view('front.ecommerce.product', compact('products'));
    }
    
    public function show($slug){
        $product = Product::with(['category'])->where('slug', $slug)->first();
        return view('front.ecommerce.show', compact('product'));
    }

    public function verifyCustomerRegistration($token){
        //JADI KITA BUAT QUERY UNTUK MENGMABIL DATA USER BERDASARKAN TOKEN YANG DITERIMA
        $customer = Customer::where('activate_token', $token)->first();
        if ($customer) {
            //JIKA ADA MAKA DATANYA DIUPDATE DENGNA MENGOSONGKAN TOKENNYA DAN STATUSNYA JADI AKTIF
            $customer->update([
                'activate_token' => null,
                'status' => 1
            ]);
            //REDIRECT KE HALAMAN LOGIN DENGAN MENGIRIMKAN FLASH SESSION SUCCESS
            return redirect(route('customer.login'))->with(['success' => 'Verifikasi Berhasil, Silahkan Login']);
        }
        //JIKA TIDAK ADA, MAKA REDIRECT KE HALAMAN LOGIN
        //DENGAN MENGIRIMKAN FLASH SESSION ERROR
        return redirect(route('customer.login'))->with(['error' => 'Invalid Verifikasi Token']);
    }

}
