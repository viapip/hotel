<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HomePageController;
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
    Route::post('/upload-image', 'ImageController@upload')->name('image.upload');
    Route::post('/delete-image', 'ImageController@delete')->name('image.delete');
});

Route::get('{any}', function () {
    return view('index');
})->where('any', '.*');
