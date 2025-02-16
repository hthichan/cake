<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PromotionsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
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

Route::prefix('')->group(function () {
    Route::get('', [HomeController::class, 'index'])->name('home');
    Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');
    Route::get('/birthdat_cake', [HomeController::class, 'birthdat_cake'])->name('home.birthdat_cake');

    // Shop
    Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
    Route::post('/shop', [ShopController::class, 'price_filter'])->name('shop.price_filter');
    Route::post('/shop/search', [ShopController::class, 'search_item'])->name('shop.search_name');
    Route::get('/shop/{cat}', [ShopController::class, 'getProduct'])->name('shop.product');
    Route::get('/shop/details/{id}', [ShopController::class, 'productDetails'])->name('shop.details');

    //SortBy
    Route::post('/sort', [ShopController::class, 'item_sort'])->name('shop.item_sort');

    // Route cart
    Route::get('/cart', [HomeController::class, 'cart'])->name('home.cart');
    Route::post('/add_to_cart', [HomeController::class, 'add_to_cart'])->name('home.add_to_cart');
    Route::post('/delete_cart', [HomeController::class, 'delete_cart'])->name('home.delete_cart');
    Route::get('/clear_cart/{cart_id}', [HomeController::class, 'clear_cart'])->name('home.clear_cart');
    Route::get('/destroy_cartItem/{cartItem_id}', [HomeController::class, 'destroy_cartItem'])->name('home.destroy_cartItem');

    Route::get('/checkout', [HomeController::class, 'checkout'])->name('home.checkout');
    Route::get('/cancelOrder/{order_id}', [HomeController::class, 'cancel_order'])->name('home.cancelOrder');

    Route::post('/checkout', [HomeController::class, 'handle_checkout']);

    // Route::post('favorited', [HomeController::class, 'favorited'])->name('home.favorited');

    //comment
    Route::post('/comment', [ReviewController::class, 'comment'])->name('review.comment');

    Route::post('/tabList', [HomeController::class, 'tabList'])->name('home.tabList');
});

Route::group(['prefix' => '/user'], function () {
    // Route::get('/index', [UserController::class, 'index'])->name('user.index')->middleware('auth');

    //profile
    Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::post('/profile', [UserController::class, 'check_profile']);
    Route::post('/profile/change_password', [UserController::class, 'check_change_password'])->name('check_change_password');

    //order route
    Route::get('/order', [UserController::class, 'order'])->name('user.order');
    Route::get('/order_details/{order_id}', [UserController::class, 'order_details'])->name('user.orderDetails');

    Route::get('/verify-account/{email}', [UserController::class, 'verify'])->name('user.verify');

    // Login 
    Route::get('/login', [UserController::class, 'login'])->name('user.login');
    Route::post('/login', [UserController::class, 'check_login']);

    // Logout
    Route::get('/logout', [UserController::class, 'check_logout'])->name('user.logout');

    // Register
    Route::get('/register', [UserController::class, 'register'])->name('user.register');
    Route::post('/register', [UserController::class, 'check_register']);

    //forgot password
    Route::get('/forgot', [UserController::class, 'forgot_password'])->name('user.forgot');
    Route::post('/forgot', [UserController::class, 'check_forgot_password']);

    //reset password
    Route::get('/reset_password/{token}', [UserController::class, 'reset_password'])->name('user.reset_password');
    Route::post('/reset_password/{token}', [UserController::class, 'check_reset_password']);

    Route::get('/favorited', [UserController::class, 'favorited'])->name('user.favorited');
});

//Route admin
Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('admin/login', [AdminController::class, 'check_login']);
Route::middleware('admin.login')->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.home');


    Route::resources([
        'category' => CategoryController::class,
        'product' => ProductController::class,
        'promotions' => PromotionsController::class,
    ]);
    Route::get('orders', [AdminController::class, 'orders'])->name('admin.orders');
    Route::get('orders/details/{order}', [AdminController::class, 'details'])->name('admin.details');
    Route::get('orders/confirm/{order}', [AdminController::class, 'confirm_order'])->name('admin.confirm');

    Route::get('users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('users/{user_id}', [AdminController::class, 'order_user'])->name('admin.order_user');

    Route::get('check_logout', [AdminController::class, 'check_logout'])->name('admin.check_logout');
});
