<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;

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

}
