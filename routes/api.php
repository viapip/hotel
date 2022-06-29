<?php

use App\Http\Controllers\API\V1\AboutController;
use App\Http\Controllers\API\V1\ContactController;
use App\Http\Controllers\API\V1\DiscoverController;
use App\Http\Controllers\API\V1\EventsController;
use App\Http\Controllers\API\V1\FormController;
use App\Http\Controllers\API\V1\GalleryController;
use App\Http\Controllers\API\V1\HomePageController;
use App\Http\Controllers\API\V1\LocationController;
use App\Http\Controllers\API\V1\PrivacyController;
use App\Http\Controllers\API\V1\RoomsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/home', [HomePageController::class, 'index']);
Route::get('/discover', [DiscoverController::class, 'index']);
Route::get('/discover/{id}', [DiscoverController::class, 'get']);
Route::get('/rooms-page', [RoomsController::class, 'index']);
Route::get('/room/{slug}', [RoomsController::class, 'get']);
Route::get('/events-page', [EventsController::class, 'index']);
Route::get('/location-page', [LocationController::class, 'index']);
Route::get('/contact', [ContactController::class, 'index']);
Route::get('/gallery', [GalleryController::class, 'index']);
Route::get('/privacy', [PrivacyController::class, 'index']);
Route::post('/form', [FormController::class, 'default']);
