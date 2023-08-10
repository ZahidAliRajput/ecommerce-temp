<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\PostcatController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\PosttagController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\IframeController;
use App\Http\Controllers\Admin\ShippingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\ContactUsController;
use App\Http\Controllers\User\FrontendController;
use App\Http\Controllers\User\ProductController as UserProductController;
use App\Http\Controllers\User\ShopController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';
// Route::get('/dashboard', function () {
//     return view('admin.dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

   //Iframe Routes
   Route::get('index', [IframeController::class, 'index'])->name('index');
   Route::get('iframe', [IframeController::class, 'iframe'])->name('iframe');

Route::group(['prefix' => 'user'], function () {
    Route::get('index', [FrontendController::class, 'index'])->name('index');
    Route::get('about', [FrontendController::class, 'about'])->name('about');

    Route::get('shop', [ShopController::class, 'index'])->name('shop');
    Route::get('filterbycategory/{slug}', [ShopController::class, 'filterbycategory'])->name('filterbycategory');
    Route::get('addtocart/{id}', [ShopController::class, 'addtocart'])->name('addtocart');

    Route::get('cart', [FrontendController::class, 'cart'])->name('cart');
    Route::get('contactus', [FrontendController::class, 'contactus'])->name('contactus');
    Route::post('contactus', [ContactUsController::class, 'contactus'])->name('contactus');
    Route::get('checkout', [FrontendController::class, 'checkout'])->name('checkout');
    Route::get('on-sale', [UserProductController::class, 'onsale'])->name('onsale');
});

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    });

    Route::get('media_manager', function(){
        return view('admin.media.mediamanager');
    })->name('media_manager');

    // Route::group(['prefix' => 'laravel-filemanager'], function () {
    //     \UniSharp\LaravelFilemanager\Lfm::routes();
    // });

    Route::resource('categories', 'App\Http\Controllers\Admin\CategoryController');
    Route::get('category/delete/{id?}', [CategoryController::class, 'delete'])->name('category.delete');
    Route::get('category/status/{id?}', [CategoryController::class, 'status'])->name('category.status');

    Route::resource('coupons', 'App\Http\Controllers\Admin\CouponController');
    Route::get('coupon/delete/{id?}', [CouponController::class, 'delete'])->name('coupon.delete');
    Route::get('coupon/status/{id?}', [CouponController::class, 'status'])->name('coupon.status');

    Route::resource('products', 'App\Http\Controllers\Admin\ProductController');
    Route::get('product/delete/{id?}', [ProductController::class, 'delete'])->name('product.delete');
    Route::get('product/status/{id?}', [ProductController::class, 'status'])->name('product.status');

    Route::resource('banners', 'App\Http\Controllers\Admin\BannerController');
    Route::get('banner/delete/{id?}', [BannerController::class, 'delete'])->name('banner.delete');
    Route::get('banner/status/{id?}', [BannerController::class, 'status'])->name('banner.status');

    Route::resource('brands', 'App\Http\Controllers\Admin\BrandController');
    Route::get('brand/delete/{id?}', [BrandController::class, 'delete'])->name('brand.delete');
    Route::get('brand/status/{id?}', [BrandController::class, 'status'])->name('brand.status');

    Route::resource('plans', 'App\Http\Controllers\Admin\PlanController');
    Route::get('plan/delete/{id?}', [PlanController::class, 'delete'])->name('plan.delete');

    Route::resource('shippings', 'App\Http\Controllers\Admin\ShippingController');
    Route::get('shipping/delete/{id?}', [ShippingController::class, 'delete'])->name('shipping.delete');
    Route::get('shipping/status/{id?}', [ShippingController::class, 'status'])->name('shipping.status');

    Route::resource('posttags', 'App\Http\Controllers\Admin\PosttagController');
    Route::get('posttag/delete/{id?}', [PosttagController::class, 'delete'])->name('posttag.delete');

    Route::resource('postcats', 'App\Http\Controllers\Admin\PostcatController');
    Route::get('postcat/delete/{id?}', [PostcatController::class, 'delete'])->name('postcat.delete');

    Route::resource('posts', 'App\Http\Controllers\Admin\PostController');
    Route::get('post/delete/{id?}', [PostController::class, 'delete'])->name('post.delete');

    Route::resource('roles', 'App\Http\Controllers\Admin\RoleController');
    Route::get('role/delete/{id?}', [RoleController::class, 'delete'])->name('role.delete');

    Route::resource('users', 'App\Http\Controllers\Admin\AdminController');
    Route::get('user/delete/{id?}', [AdminController::class, 'delete'])->name('user.delete');

    // Route::get('destroy/{id}', [CategoryController::class, 'destroy'])->name('destroy');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
