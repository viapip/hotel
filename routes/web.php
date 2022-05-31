<?php

use App\Http\Controllers\Admin\HomePageController;
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

Auth::routes();

Route::group(['middleware' => 'admin','prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::resource('home-page', HomePageController::class, ['as' => 'admin']);
    Route::resource('/', HomePageController::class, ['as' => 'admin']);
    Route::post('/upload-image', 'ImageController@upload')->name('image.upload');
    Route::post('/delete-image', 'ImageController@delete')->name('image.delete');
});

Route::get('{any}', function () {
    return view('index');
})->where('any', '.*');
