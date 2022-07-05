<?php

use App\Http\Controllers\Admin\AboutBannersController;
use App\Http\Controllers\Admin\AboutPageController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DiscoverBlockController;
use App\Http\Controllers\Admin\DiscoverController;
use App\Http\Controllers\Admin\EventsBannerController;
use App\Http\Controllers\Admin\EventsController;
use App\Http\Controllers\Admin\EventsPageController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\GalleryPageController;
use App\Http\Controllers\Admin\HomePageController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\LocationHomeController;
use App\Http\Controllers\Admin\LocationPageController;
use App\Http\Controllers\Admin\PrivacyController;
use App\Http\Controllers\Admin\RoomsController;
use App\Http\Controllers\Admin\RoomsPageController;
use App\Http\Controllers\UserController;
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

Route::group(['middleware' => 'guest'], function (){
    Route::get('/register', [UserController::class, 'create'])->name('register.create');
    Route::post('/register', [UserController::class, 'store'])->name('register.store');
    Route::get('/login', [UserController::class, 'loginForm'])->name('login.create');
    Route::post('/login', [UserController::class, 'login'])->name('login');
});

Route::group(['middleware' => 'admin','prefix' => 'admin'], function () {
    Route::resource('/home-page', HomePageController::class, ['as' => 'admin']);
    Route::get('/', [DashboardController::class, 'index'])->name('admin.home');
    Route::resource('/location-home', LocationHomeController::class, ['as' => 'admin']);
    Route::resource('/rooms-page', RoomsPageController::class, ['as' => 'admin']);
    Route::resource('/rooms', RoomsController::class, ['as' => 'admin']);
    Route::resource('/feature', FeatureController::class, ['as' => 'admin']);
    Route::resource('/events-page', EventsPageController::class, ['as' => 'admin']);
    Route::resource('/events-banner', EventsBannerController::class, ['as' => 'admin']);
    Route::resource('/events', EventsController::class, ['as' => 'admin']);
    Route::resource('/location-page', LocationPageController::class, ['as' => 'admin']);
    Route::resource('/about-page', AboutPageController::class, ['as' => 'admin']);
    Route::resource('/about-banners', AboutBannersController::class, ['as' => 'admin']);
    Route::resource('/contact', ContactController::class, ['as' => 'admin']);
    Route::resource('/privacy', PrivacyController::class, ['as' => 'admin']);
    Route::resource('/discover', DiscoverController::class, ['as' => 'admin']);
    Route::resource('/discover-block', DiscoverBlockController::class, ['as' => 'admin']);
    Route::resource('/gallery-page', GalleryPageController::class, ['as' => 'admin']);
    Route::resource('/gallery', GalleryController::class, ['as' => 'admin']);

    Route::post('/image', [ImageController::class, 'upload']);
    Route::delete('/image', [ImageController::class, 'deleteAll']);
});

Route::get('{any}', function () {
    return view('index');
})->where('any', '.*');
