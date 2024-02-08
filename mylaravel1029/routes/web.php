<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// -------------------- NORMAL ROUTES -------------------- //
// Route::get('/', function () {
//     return view('layout');
// });

// Route::get('/trang-chu', function () {
//     return view('about');
// });

Route::get('/lien-he', function () {
    return view('about');
});

Route::get('/san-pham', function () {
    return view('sanpham');
});

// -------------------- NEWS CONTROLLER -------------------- //
Route::get('/news', 'App\Http\Controllers\NewsController@goiview');

// Laravel version < 8x
Route::get('/tintuc', 'App\Http\Controllers\NewsController@index');

// Laravel version >= 8x
use App\Http\Controllers\NewsController;
Route::get('gioithieu', [NewsController::class, 'index']);

// use App\Http\Controllers\NewsController;
Route::get('/tin-tuc-nhe',[NewsController::class,'index']);

// -------------------- ADMIN CONTROLLER -------------------- //
Route::get('/admin','App\Http\Controllers\AdminController@index');
Route::get('/dashboard','App\Http\Controllers\AdminController@show_dashboard');

// -------------------- HOME CONTROLLER -------------------- //
Route::get('/','App\Http\Controllers\HomeController@index');
Route::get('/trang-chu','App\Http\Controllers\HomeController@index');
Route::get('/contact','App\Http\Controllers\HomeController@GoiContact');
// Route::post('/tim-kiem','HomeController@search');
Route::post('/tim-kiem',[HomeController::class, 'search']);

Route::get('/cap-nhat-user','HomeController@get_customer');
Route::post('/update-user','HomeController@update_user');
Route::get('/cap-nhat-pass','HomeController@show_update_pass');
Route::post('/update_pass_save','HomeController@update_pass_saver');
Route::get('/show-pass','HomeController@show_pass');
Route::post('/send-email-customer','HomeController@send_email_pass');

// -------------------- ADMIN CONTROLLER -------------------- //
use App\Http\Controllers\AdminController;
// Route::post('/admin-dashboard','AdminController@dashboard');
Route::post('/admin-dashboard',[AdminController::class, 'dashboard']);
// Route::get('/logout','AdminController@logout');
Route::get('/logout',[AdminController::class, 'logout']);

Route::get('/found-order-day','AdminController@show_order_day');
Route::get('/found-order-week','AdminController@show_order_week');
Route::get('/found-order-month','AdminController@show_order_month');
Route::get('/found-order-year','AdminController@show_order_year');

// multi-email
Route::get('/multi-email','AdminController@show_multi_email');
Route::get('/send-mail','AdminController@send_mail');

// -------------------- CATEGORY PRODUCT -------------------- //
use App\Http\Controllers\CategoryProduct;
// Route::get('/add-category-product','CategoryProduct@add_category_product');
Route::get('/add-category-product',[CategoryProduct::class, 'add_category_product']);

// Route::get('/all-category-product','CategoryProduct@all_category_product');
Route::get('/all-category-product',[CategoryProduct::class, 'all_category_product']);

// Route::post('/save-category-product','CategoryProduct@save_category_product');
Route::post('/save-category-product',[CategoryProduct::class, 'save_category_product']);

// Route::get('/unactive-category-product/{category_product_id}','CategoryProduct@unactive_category_product');
Route::get('/unactive-category-product/{category_product_id}',[CategoryProduct::class, 'unactive_category_product']);

// Route::get('/active-category-product/{category_product_id}','CategoryProduct@active_category_product');
Route::get('/active-category-product/{category_product_id}',[CategoryProduct::class, 'active_category_product']);

// Route::get('/edit-category-product/{category_product_id}','CategoryProduct@edit_category_product');
Route::get('/edit-category-product/{category_product_id}',[CategoryProduct::class, 'edit_category_product']);

// Route::post('/update-category-product/{category_product_id}','CategoryProduct@update_category_product');
Route::post('/update-category-product/{category_product_id}',[CategoryProduct::class, 'update_category_product']);

// Route::get('/delete-category-product/{category_product_id}','CategoryProduct@delete_category_product');
Route::get('/delete-category-product/{category_product_id}',[CategoryProduct::class, 'delete_category_product']);

// Route::get('/danh-muc-san-pham/{slug_category_product}','CategoryProduct@show_category_home');
Route::get('/danh-muc-san-pham/{slug_category_product}',[CategoryProduct::class, 'show_category_home']);

// -------------------- BRAND PRODUCT -------------------- //
use App\Http\Controllers\BrandProduct;
// Route::get('/add-brand-product','BrandProduct@add_brand_product');
Route::get('/add-brand-product',[BrandProduct::class, 'add_brand_product']);

// Route::get('/all-brand-product','BrandProduct@all_brand_product');
Route::get('/all-brand-product',[BrandProduct::class, 'all_brand_product']);

// Route::post('/save-brand-product','BrandProduct@save_brand_product');
Route::post('/save-brand-product',[BrandProduct::class, 'save_brand_product']);

// Route::get('/unactive-brand-product/{brand_product_id}','BrandProduct@unactive_brand_product');
Route::get('/unactive-brand-product/{brand_product_id}',[BrandProduct::class, 'unactive_brand_product']);

// Route::get('/active-brand-product/{brand_product_id}','BrandProduct@active_brand_product');
Route::get('/active-brand-product/{brand_product_id}',[BrandProduct::class, 'active_brand_product']);

// Route::get('/edit-brand-product/{brand_product_id}','BrandProduct@edit_brand_product');
Route::get('/edit-brand-product/{brand_product_id}',[BrandProduct::class, 'edit_brand_product']);

// Route::post('/update-brand-product/{brand_product_id}','BrandProduct@update_brand_product');
Route::post('/update-brand-product/{brand_product_id}',[BrandProduct::class, 'update_brand_product']);

// Route::get('/delete-brand-product/{brand_product_id}','BrandProduct@delete_brand_product');
Route::get('/delete-brand-product/{brand_product_id}',[BrandProduct::class, 'delete_brand_product']);

// Route::get('/thuong-hieu-san-pham/{brand_slug}','BrandProduct@show_brand_home');
Route::get('/thuong-hieu-san-pham/{brand_slug}',[BrandProduct::class, 'show_brand_home']);

// -------------------- PRODUCT CONTROLLER -------------------- //
use App\Http\Controllers\ProductController;
// Route::get('/add-product','ProductController@add_product');
Route::get('/add-product',[ProductController::class, 'add_product']);

// Route::get('/all-product','ProductController@all_product');
Route::get('/all-product',[ProductController::class, 'all_product']);

// Route::post('/save-product','ProductController@save_product');
Route::post('/save-product',[ProductController::class, 'save_product']);

// Route::get('/unactive-product/{product_id}','ProductController@unactive_product');
Route::get('/unactive-product/{product_id}',[ProductController::class, 'unactive_product']);

// Route::get('/active-product/{product_id}','ProductController@active_product');
Route::get('/active-product/{product_id}',[ProductController::class, 'active_product']);

// Route::get('/edit-product/{product_id}','ProductController@edit_product');
Route::get('/edit-product/{product_id}',[ProductController::class, 'edit_product']);

// Route::post('/update-product/{product_id}','ProductController@update_product');
Route::post('/update-product/{product_id}',[ProductController::class, 'update_product']);

// Route::get('/delete-product/{product_id}','ProductController@delete_product');
Route::get('/delete-product/{product_id}',[ProductController::class, 'delete_product']);

// Route::get('/chi-tiet-san-pham/{product_slug}','ProductController@details_product');
// Route::get('/chi-tiet-san-pham/{product_slug}',[ProductController::class, 'details_product']);

// Route::get('/chi-tiet-san-pham/{product_id}','ProductController@details_product');
Route::get('/chi-tiet-san-pham/{product_id}',[ProductController::class, 'details_product']);

// -------------------- CART CONTROLLER -------------------- //
use App\Http\Controllers\CartController;
// Route::post('/save-cart','CartController@save_cart');
Route::post('/save-cart',[CartController::class, 'save_cart']);

// Route::get('/show-cart','CartController@show_cart');
Route::get('/show-cart',[CartController::class, 'show_cart']);

// Route::get('/delete-to-cart/{rowId}','CartController@delete_to_cart');
Route::get('/delete-to-cart/{rowId}',[CartController::class, 'delete_to_cart']);

// Route::post('/update-cart-quantity','CartController@update_cart_quantity');
Route::post('/update-cart-quantity',[CartController::class, 'update_cart_quantity']);

// -------------------- CHECKOUT CONTROLLER -------------------- //
use App\Http\Controllers\CheckoutController;
// Route::get('/login-checkout','CheckoutController@login_checkout');
Route::get('/login-checkout',[CheckoutController::class, 'login_checkout']);

// Route::post('/add-customer','CheckoutController@add_customer');
Route::post('/add-customer',[CheckoutController::class, 'add_customer']);

// Route::get('/checkout','CheckoutController@checkout');
Route::get('/checkout',[CheckoutController::class, 'checkout']);

// Route::post('/login-customer','CheckoutController@login_customer');
Route::post('/login-customer',[CheckoutController::class, 'login_customer']);

// Route::get('/logout-checkout','CheckoutController@logout_checkout');
Route::get('/logout-checkout',[CheckoutController::class, 'logout_checkout']);

// Route::post('/save-checkout-customer','CheckoutController@save_checkout_customer');
Route::post('/save-checkout-customer',[CheckoutController::class, 'save_checkout_customer']);

// Route::get('/payment','CheckoutController@payment');
Route::get('/payment',[CheckoutController::class, 'payment']);

// Route::post('/order-place','CheckoutController@order_place');
Route::post('/order-place',[CheckoutController::class, 'order_place']);

// Route::get('/manage-order','CheckoutController@manage_order');
Route::get('/manage-order',[CheckoutController::class, 'manage_order']);

// Route::get('/view-order/{orderId}','CheckoutController@view_order');
Route::get('/view-order/{orderId}',[CheckoutController::class, 'view_order']);

// Route::get('/taikhoan','CheckoutController@user_setting');
Route::get('/taikhoan',[CheckoutController::class, 'user_setting']);

// Route::get('/view-order-user/{orderId}','CheckoutController@view_order_user');
Route::get('/view-order-user/{orderId}',[CheckoutController::class, 'view_order_user']);
