<?php

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






////////////////listing pages routes ////////////////////////////
Route::get('/', function () {
    return view('login_dashboard');
})->name('login_dashboard');


Route::get('/listing/dashboard', function () {
    return view('/listing/listing_dashboard');
})->name('listing_dashboard');

Route::get('/listing/buildinginfo', function () {
    return view('/listing/listing_buildinginfo');
})->name('listing_buildinginfo');

Route::get('/listing/about', function () {
    return view('/listing/listing_about');
})->name('listing_about');

///////////// End listing pages routes  ///////////////////

Route::get('/the-why', function () {
    return view('the_whypage');
})->name('the-why'); 

// Route::get('/home', function () {
//     return view('home');
// })->name('home');


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/welcome', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');

// Auth::routes();

// Route::get('/mypage', [App\Http\Controllers\HomeController::class, 'index'])->name('mypage');
