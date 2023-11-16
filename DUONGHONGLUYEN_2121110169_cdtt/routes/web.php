<?php
//frontend
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\SiteController;
use App\Http\Controllers\frontend\ContactFeController;
use App\Http\Controllers\frontend\CustomerFeController;
use App\Http\Controllers\frontend\SearchController;
use App\Http\Controllers\frontend\CartController;

//backend
use App\Http\Controllers\backend\AuthController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\ConfigController;
use App\Http\Controllers\backend\ContactController;
use App\Http\Controllers\backend\MenuController;
use App\Http\Controllers\backend\OrderController;
use App\Http\Controllers\backend\PostController;
use App\Http\Controllers\backend\PageController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\SliderController;
use App\Http\Controllers\backend\TopicController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\CustomerController;


Route::get('/',[SiteController::class, 'index'])->name('home');
Route::get('/products',[SiteController::class, 'products'])->name('products');
Route::get('/about',[SiteController::class, 'about'])->name('about');
Route::get('/client',[SiteController::class, 'client'])->name('client');
Route::get('/contact',[SiteController::class, 'contact'])->name('contact');

Route::get('lien-he', [ContactFeController::class, 'index'])->name('site.contact');
Route::get('khach-hang',[CustomerFeController::class, 'index'])->name('site.customer');
Route::get('gio-hang/addCart', [CartController::class, 'addCart'])->name('site.cart.addcart');
Route::get('san-pham', [SiteController::class, 'product'])->name('site.product');
Route::get('bai-viet', [SiteController::class, 'post'])->name('site.post');
Route::get('tim-kiem', [SearchController::class, 'index'])->name('site.search');
Route::get('dang-ky', [SiteController::class, 'register'])->name('site.register');


Route::get('admin/login', [AuthController::class, 'getlogin'])->name('admin.getlogin');
Route::post('admin/login', [AuthController::class, 'postlogin'])->name('admin.postlogin');

Route::prefix('admin')->middleware('adminlogin')->group(function (){
    Route::get('logout', [AuthController::class, 'getlogin'])->name('admin.logout');
    Route::get("/",[DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('brand/trash', [BrandController::class, 'trash'])->name('brand.trash');
    Route::get('brand/delete/{brand}', [BrandController::class, 'delete'])->name('brand.delete');
    Route::get('brand/restore/{brand}', [BrandController::class, 'restore'])->name('brand.restore');
    Route::get('brand/status/{brand}', [BrandController::class, 'status'])->name('brand.status');
    Route::resource('brand', BrandController::class);

    Route::get('category/trash', [CategoryController::class, 'trash'])->name('category.trash');
    Route::get('category/delete/{category}', [CategoryController::class, 'delete'])->name('category.delete');
    Route::get('category/restore/{category}', [CategoryController::class, 'restore'])->name('category.restore');
    Route::get('category/status/{category}', [CategoryController::class, 'status'])->name('category.status');
    Route::resource('category', CategoryController::class);

    Route::get('product/trash', [ProductController::class, 'trash'])->name('product.trash');
    Route::get('product/delete/{product}', [ProductController::class, 'delete'])->name('product.delete');
    Route::get('product/restore/{product}', [ProductController::class, 'restore'])->name('product.restore');
    Route::get('product/status/{product}', [ProductController::class, 'status'])->name('product.status');
    Route::resource('product', ProductController::class);


    Route::get('post/trash', [PostController::class, 'trash'])->name('post.trash');
    Route::get('post/delete/{post}', [PostController::class, 'delete'])->name('post.delete');
    Route::get('post/restore/{post}', [PostController::class, 'restore'])->name('post.restore');
    Route::get('post/status/{post}', [PostController::class, 'status'])->name('post.status');
    Route::resource('post', PostController::class);

    Route::get('topic/trash', [TopicController::class, 'trash'])->name('topic.trash');
    Route::get('topic/delete/{topic}', [TopicController::class, 'delete'])->name('topic.delete');
    Route::get('topic/restore/{topic}', [TopicController::class, 'restore'])->name('topic.restore');
    Route::get('topic/status/{topic}', [TopicController::class, 'status'])->name('topic.status');
    Route::resource('topic', TopicController::class);

    Route::get('page/trash', [PageController::class, 'trash'])->name('page.trash');
    Route::get('page/delete/{page}', [PageController::class, 'delete'])->name('page.delete');
    Route::get('page/restore/{page}', [PageController::class, 'restore'])->name('page.restore');
    Route::get('page/status/{page}', [PageController::class, 'status'])->name('page.status');
    Route::resource('page', PageController::class);

    Route::get('contact/trash', [ContactController::class, 'trash'])->name('contact.trash');
    Route::get('contact/delete/{contact}', [ContactController::class, 'delete'])->name('contact.delete');
    Route::get('contact/restore/{contact}', [ContactController::class, 'restore'])->name('contact.restore');
    Route::get('contact/status/{contact}', [ContactController::class, 'status'])->name('contact.status');
    Route::resource('contact', ContactController::class);

    Route::get('order/trash', [OrderController::class, 'trash'])->name('order.trash');
    Route::get('order/delete/{order}', [OrderController::class, 'delete'])->name('order.delete');
    Route::get('order/restore/{order}', [OrderController::class, 'restore'])->name('order.restore');
    Route::get('order/status/{order}', [OrderController::class, 'status'])->name('order.status');
    Route::resource('order', OrderController::class);

    Route::get('slider/trash', [SliderController::class, 'trash'])->name('slider.trash');
    Route::get('slider/delete/{slider}', [SliderController::class, 'delete'])->name('slider.delete');
    Route::get('slider/restore/{slider}', [SliderController::class, 'restore'])->name('slider.restore');
    Route::get('slider/status/{slider}', [SliderController::class, 'status'])->name('slider.status');
    Route::resource('slider', SliderController::class);

    Route::get('menu/trash', [MenuController::class, 'trash'])->name('menu.trash');
    Route::get('menu/delete/{menu}', [MenuController::class, 'delete'])->name('menu.delete');
    Route::get('menu/restore/{menu}', [MenuController::class, 'restore'])->name('menu.restore');
    Route::get('menu/status/{menu}', [MenuController::class, 'status'])->name('menu.status');
    Route::resource('menu', MenuController::class);

    Route::get('config/trash', [ConfigController::class, 'trash'])->name('config.trash');
    Route::get('config/delete/{config}', [ConfigController::class, 'delete'])->name('config.delete');
    Route::get('config/restore/{config}', [ConfigController::class, 'restore'])->name('config.restore');
    Route::get('config/status/{config}', [ConfigController::class, 'status'])->name('config.status');
    Route::resource('config', ConfigController::class);

    Route::get('user/trash', [UserController::class, 'trash'])->name('user.trash');
    Route::get('user/delete/{user}', [UserController::class, 'delete'])->name('user.delete');
    Route::get('user/restore/{user}', [UserController::class, 'restore'])->name('user.restore');
    Route::get('user/status/{user}', [UserController::class, 'status'])->name('user.status');
    Route::resource('user', UserController::class);
    Route::resource('customer', CustomerController::class);


});



Route::get('{slug}', [SiteController::class, 'index'])->name('site.slug');