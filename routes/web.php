<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\RatingController;
use App\Http\Controllers\Frontend\ReviewController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\WishlistController;

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


Route::get('/',[FrontendController::class, 'index']);
Route::get('/category',[FrontendController::class, 'category']);
Route::get('/view_category/{slug}',[FrontendController::class, 'viewCategory']);
Route::get('/category/{cat_slug}/{prod_slug}',[FrontendController::class, 'productview']);


Route::get('load-cart-data',[CartController::class, 'cartcount']);
Route::post('add-to-cart',[CartController::class, 'addtocart']);
Route::post('delete-cart-item',[CartController::class, 'deleteitem']);
Route::post('update-cart',[CartController::class, 'updatecart']);

Route::get('load-wishlist-data',[WishlistController::class, 'wishlistcount']);
Route::post('add-to-wishlist',[WishlistController::class, 'addtowishlist']);
Route::post('delete-wishlist-item',[WishlistController::class, 'delete']);

// search product
Route::get('product-list',[FrontendController::class, 'getproduct']);
Route::post('serch-product',[FrontendController::class, 'searchproduct']);











Route::middleware(['auth'])->group(function () {
    Route::get('/cart',[CartController::class, 'viewcart']);
    Route::get('/checkout',[CheckoutController::class, 'index']);
    Route::get('/my-order',[UserController::class, 'index']);
    Route::get('/view-order/{id}',[UserController::class, 'vieworder']);
    Route::post('/place-order',[CheckoutController::class, 'placeorder']);    

    Route::get('/wishlist',[WishlistController::class, 'index']);

    Route::post('proceed-to-pay',[CheckoutController::class, 'razorpaycheck']);

    Route::post('/add-rating',[RatingController::class, 'addrating']);

    Route::get('add-review/{product_slug}/userreview',[ReviewController::class, 'add']);
    Route::get('edit-review/{product_slug}/userreview',[ReviewController::class, 'edit']);

    Route::post('/add-review',[ReviewController::class, 'add_review']);
    Route::put('/update-review',[ReviewController::class, 'update_review']);

    

    

});

Auth::routes();
Route::group(['middleware' => ['auth','isAdmin']], function () {
    Route::get('/dashboard',[AdminController::class, 'index']);
    Route::get('/categories',[CategoryController::class, 'index']);
    Route::get('/add-category',[CategoryController::class, 'add']);
    Route::post('/insert_category',[CategoryController::class, 'insert']);
    Route::get('/edit-category/{id}',[CategoryController::class, 'edit']);
    Route::put('/update_category/{id}',[CategoryController::class, 'update']);
    Route::get('/delete-category/{id}',[CategoryController::class, 'destroy']);

    Route::get('/products',[ProductController::class, 'index']);
    Route::get('/add-product',[ProductController::class, 'add']);
    Route::post('/insert_product',[ProductController::class, 'insert']);
    Route::get('/edit-products/{id}',[ProductController::class, 'edit']);
    Route::put('/update_products/{id}',[ProductController::class, 'update']);
    Route::get('/delete-products/{id}',[ProductController::class, 'destroy']);
       
    Route::get('/orders',[OrderController::class, 'index']);
    Route::get('/admin/view-order/{id}',[OrderController::class, 'view']);
    Route::get('/order-history',[OrderController::class, 'orderhistory']);
    Route::put('/update-order/{id}',[OrderController::class, 'updateorder']);

    Route::get('/users',[DashboardController::class, 'user']);
    Route::get('/view-user/{id}',[DashboardController::class, 'viewuser']);

 });

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
