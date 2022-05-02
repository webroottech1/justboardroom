<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




Route::get('/home', [App\Http\Controllers\Api\ListingController::class, 'index'])->name('homepage');
Route::post('/getlisting', [App\Http\Controllers\Api\ListingController::class, 'getlisting'])->name('getlisting');
Route::get('/listing-details/{id}', [App\Http\Controllers\Api\ListingController::class, 'get_listing_details'])->name('listing_details');

