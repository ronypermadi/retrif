<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'front\FrontController@index')->name('front.index');
Route::get('/product', 'front\FrontController@product')->name('front.product');
Route::get('/category/{slug}', 'front\FrontController@categoryProduct')->name('front.category');
Route::get('/product/{slug}', 'front\FrontController@show')->name('front.show_product');
Route::post('cart', 'front\CartController@addToCart')->name('front.cart');
Route::get('/cart', 'front\CartController@listCart')->name('front.list_cart');
Route::post('/cart/update', 'front\CartController@updateCart')->name('front.update_cart');
Route::get('/checkout', 'front\CartController@checkout')->name('front.checkout');
Route::post('/checkout', 'front\CartController@processCheckout')->name('front.store_checkout');
Route::get('/checkout/{invoice}', 'front\CartController@checkoutFinish')->name('front.finish_checkout');
Route::get('/product/ref/{user}/{product}', 'front\FrontController@referalProduct')->name('front.afiliasi');

Auth::routes();

//JADI INI GROUPING ROUTE, SEHINGGA SEMUA ROUTE YANG ADA DIDALAMNYA
//SECARA OTOMATIS AKAN DIAWALI DENGAN administrator
//CONTOH: /administrator/category ATAU /administrator/product, DAN SEBAGAINYA
Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function() {
    Route::get('/', 'back\HomeController@index')->name('home'); //JADI ROUTING INI SUDAH ADA DARI ARTIKEL SEBELUMNYA TAPI KITA PINDAHKAN KEDALAM GROUPING

    Route::resource('category', 'back\CategoryController')->except(['create', 'show']);
    Route::resource('product', 'back\ProductController')->except(['show']);
    Route::get('/product/bulk', 'back\ProductController@massUploadForm')->name('product.bulk');
    Route::post('/product/bulk', 'back\ProductController@massUpload')->name('product.saveBulk');
});
Route::group(['prefix' => 'orders','middleware' => 'auth', 'namespace' => 'back'], function() {
    Route::get('/', 'OrderController@index')->name('orders.index');
    Route::delete('/{id}', 'OrderController@destroy')->name('orders.destroy');
    Route::get('/{invoice}', 'OrderController@view')->name('orders.view');
    Route::get('/payment/{invoice}', 'OrderController@acceptPayment')->name('orders.approve_payment');
    Route::post('/shipping', 'OrderController@shippingOrder')->name('orders.shipping');
    Route::get('/return/{invoice}', 'OrderController@return')->name('orders.return');
    Route::post('/return', 'OrderController@approveReturn')->name('orders.approve_return');
});
Route::group(['prefix' => 'reports','middleware' => 'auth', 'namespace' => 'back'], function() {
    Route::get('/order', 'HomeController@orderReport')->name('report.order');
    Route::get('/order/pdf/{daterange}', 'HomeController@orderReportPdf')->name('report.order_pdf');
    Route::get('/return', 'HomeController@returnReport')->name('report.return');
    Route::get('/return/pdf/{daterange}', 'HomeController@returnReportPdf')->name('report.return_pdf');
});

Route::group(['prefix' => 'member', 'namespace' => 'front'], function() {
    Route::get('login', 'LoginController@loginForm')->name('customer.login');
    Route::post('login', 'LoginController@login')->name('customer.post_login');
    Route::get('verify/{token}', 'FrontController@verifyCustomerRegistration')->name('customer.verify');

    Route::group(['middleware' => 'customer'], function() {
        Route::get('dashboard', 'LoginController@dashboard')->name('customer.dashboard');
        Route::get('logout', 'LoginController@logout')->name('customer.logout');
        Route::get('orders', 'OrderController@index')->name('customer.orders');
        Route::get('orders/{invoice}', 'OrderController@view')->name('customer.view_order');
        Route::get('orders/pdf/{invoice}', 'OrderController@pdf')->name('customer.order_pdf');
        Route::post('orders/accept', 'OrderController@acceptOrder')->name('customer.order_accept');
        Route::get('orders/return/{invoice}', 'OrderController@returnForm')->name('customer.order_return');
        Route::put('orders/return/{invoice}', 'OrderController@processReturn')->name('customer.return');
        Route::get('/afiliasi', 'FrontController@listCommission')->name('customer.affiliate');
        Route::get('payment', 'OrderController@paymentForm')->name('customer.paymentForm');
        Route::post('payment', 'OrderController@storePayment')->name('customer.savePayment');
        Route::get('setting', 'FrontController@customerSettingForm')->name('customer.settingForm');
        Route::post('setting', 'FrontController@customerUpdateProfile')->name('customer.setting');
    });

});