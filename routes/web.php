<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Artisan;
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
Route::get('/clear', function () {
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('cache:clear');
    Artisan::call('optimize:clear');
    Artisan::call('storage:link');
    Artisan::call('make:model Contact -c');
    // Artisan::call('make:model CustomerRating -c');
    return "Cache Clear......";
})->name('cache.clear');




Route::get('/', [FrontendController::class, 'index'])->name('web.index');
Route::get('/shop', [FrontendController::class, 'shop'])->name('web.shop');
Route::get('/shop-details/{id}', [FrontendController::class, 'shopDetails'])->name('web.shop.details');
Route::get('/blog', [FrontendController::class, 'blog'])->name('web.blog');
Route::get('/about', [FrontendController::class, 'about'])->name('web.about');
Route::get('/contact', [FrontendController::class, 'contact'])->name('web.contact');
Route::post('/contact', [FrontendController::class, 'contactSubmit'])->name('web.contactSubmit');
Route::get('/cart', [FrontendController::class, 'cart'])->name('web.cart');
Route::post('/newsletter', [FrontendController::class, 'newsletter'])->name('web.newsletter');


//Add To Cart
Route::get('/cart-add/{id}', [FrontendController::class, 'cartAdd'])->name('cart.add');
Route::post('/cart-update', [FrontendController::class, 'cartUpdate'])->name('cart.update');
Route::delete('/cart-delete', [FrontendController::class, 'cartDelete'])->name('cart.delete');


//Place Order
Route::post('/place-order', [FrontendController::class, 'placeOrder'])->name('place.order');


Route::namespace('Backend')->prefix('dashboard')->as('backend.')->group(function () {

    Route::get('/login', 'AuthController@index')->name('login');
    Route::post('/login', 'AuthController@login')->name('login.submit');
});

Route::namespace('Backend')->prefix('dashboard')->as('backend.')->middleware(['auth'])->group(function () {
    //  Auth Control
    Route::get('/logout', 'AuthController@logout')->name('logout');
    // Dashboard Control
    Route::get('/', 'DashboardController@index')->name('dashboard');

    // Admin
    Route::prefix('users')->as('users.')->group(function () {
        Route::get('/', 'UserController@index')->name('index');
        Route::get('/create', 'UserController@create')->name('create');
        Route::post('/create', 'UserController@store')->name('store');
        Route::get('/{id}/edit', 'UserController@edit')->name('edit');
        Route::post('/{id}/edit', 'UserController@update')->name('update');
        Route::get('/{id}/delete', 'UserController@delete')->name('delete');
        Route::get('newsletter', 'UserController@newsletter')->name('newsletter');
        Route::get('orders', 'UserController@orders')->name('orders');
    });
    


    // Categorie
    Route::prefix('categories')->as('categories.')->group(function () {
        Route::get('/', 'CategorieController@index')->name('index');
        Route::get('/create', 'CategorieController@create')->name('create');
        Route::post('/create', 'CategorieController@store')->name('store');
        Route::get('/{id}/edit', 'CategorieController@edit')->name('edit');
        Route::post('/{id}/edit', 'CategorieController@update')->name('update');
        Route::get('/{id}/delete', 'CategorieController@delete')->name('delete');
    });

    Route::prefix('content')->as('content.')->group(function () {
        
        Route::prefix('pages')->as('pages.')->group(function () {
            Route::get('/', 'PageController@index')->name('index');
            Route::get('/{slug}/edit', 'PageController@edit')->name('edit');
            Route::post('/{slug}/edit', 'PageController@update')->name('update');
        });
        
        Route::prefix('slider')->as('slider.')->group(function () {
            Route::get('/', 'SliderController@index')->name('index');
            Route::get('/{id}/edit', 'SliderController@edit')->name('edit');
            Route::post('/{id}/edit', 'SliderController@update')->name('update');
        });
        
        Route::prefix('about')->as('about.')->group(function () {
            Route::get('/', 'AboutController@index')->name('index');
            Route::get('/{id}/edit', 'AboutController@edit')->name('edit');
            Route::post('/{id}/edit', 'AboutController@update')->name('update');
        });
        //backend.content.services.index
        Route::prefix('services')->as('services.')->group(function () {
            Route::get('/', 'ServicesController@index')->name('index');
            Route::get('/create', 'ServicesController@create')->name('create');
            Route::post('/create', 'ServicesController@store')->name('store');
            Route::get('/{id}/edit', 'ServicesController@edit')->name('edit');
            Route::post('/{id}/edit', 'ServicesController@update')->name('update');
            Route::get('/{id}/delete', 'ServicesController@delete')->name('delete');
        });
        
        
        //backend.content.team.index
        Route::prefix('team')->as('team.')->group(function () {
            Route::get('/', 'TeamController@index')->name('index');
            Route::get('/create', 'TeamController@create')->name('create');
            Route::post('/create', 'TeamController@store')->name('store');
            Route::get('/{id}/edit', 'TeamController@edit')->name('edit');
            Route::post('/{id}/edit', 'TeamController@update')->name('update');
            Route::get('/{id}/delete', 'TeamController@delete')->name('delete');
        });
        //backend.content.project.index
        Route::prefix('project')->as('project.')->group(function () {
            Route::get('/', 'CustomerProjectController@index')->name('index');
            Route::get('/create', 'CustomerProjectController@create')->name('create');
            Route::post('/create', 'CustomerProjectController@store')->name('store');
            Route::get('/{id}/edit', 'CustomerProjectController@edit')->name('edit');
            Route::post('/{id}/edit', 'CustomerProjectController@update')->name('update');
            Route::get('/{id}/delete', 'CustomerProjectController@delete')->name('delete');
        });
        //backend.content.project.index
        Route::prefix('rating')->as('rating.')->group(function () {
            Route::get('/', 'CustomerRatingController@index')->name('index');
            Route::get('/create', 'CustomerRatingController@create')->name('create');
            Route::post('/create', 'CustomerRatingController@store')->name('store');
            Route::get('/{id}/edit', 'CustomerRatingController@edit')->name('edit');
            Route::post('/{id}/edit', 'CustomerRatingController@update')->name('update');
            Route::get('/{id}/delete', 'CustomerRatingController@delete')->name('delete');
        });
        
    });
    Route::prefix('blog')->as('blog.')->group(function () {
        Route::get('/', 'BlogController@index')->name('index');
        Route::get('/create', 'BlogController@create')->name('create');
        Route::post('/create', 'BlogController@store')->name('store');
        Route::get('/{id}/edit', 'BlogController@edit')->name('edit');
        Route::post('/{id}/edit', 'BlogController@update')->name('update');
        Route::get('/{id}/delete', 'BlogController@delete')->name('delete');
        Route::get('/{id}/delete', 'BlogController@delete')->name('delete');
    });
    Route::get('/contact/', 'BlogController@contact_index')->name('contact_index');

    Route::prefix('settings')->as('settings.')->group(function () {
        Route::get('/', 'SettingsController@index')->name('index');
        Route::post('/update', 'SettingsController@update')->name('update');
        Route::get('/password', 'SettingsController@password')->name('password');
        Route::post('/password/update', 'SettingsController@passwordSubmit')->name('passwordSubmit');
    });
    
});