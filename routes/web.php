<?php

use App\Http\Controllers\CountryController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/welcome', function () {
    return view('welcome');
});
//front page route
Route::get('/', [OrderController::class, 'front'])->name('front-page');
Route::prefix('order')->name('order-')->group(function () {
    Route::get('', [OrderController::class, 'index'])->name('index');
    Route::get('/list/{id}', [OrderController::class, 'orderList'])->name('orderList')->middleware('roleP:user');
    Route::post('store/{id}', [OrderController::class, 'store'])->name('store')->middleware('roleP:user');
    Route::get('edit', [OrderController::class, 'edit'])->name('edit')->middleware('roleP:admin');
    Route::put('update/{order}', [OrderController::class, 'update'])->name('update')->middleware('roleP:admin');
    Route::delete('delete/{order}', [OrderController::class, 'destroy'])->name('destroy')->middleware('roleP:user');
    Route::get('pdf_print/{order}', [OrderController::class, 'pdf_print'])->name('pdf_print')->middleware('roleP:admin');
});

// country round
Route::prefix('country')->name('country-')->group(function () {
    Route::get('', [CountryController::class, 'index'])->name('index')->middleware('roleP:admin');
    Route::get('/create', [CountryController::class, 'create'])->name('create')->middleware('roleP:admin');
    Route::post('store', [CountryController::class, 'store'])->name('store')->middleware('roleP:admin');
    Route::get('edit/{country}', [CountryController::class, 'edit'])->name('edit')->middleware('roleP:admin');
    Route::put('update/{country}', [CountryController::class, 'update'])->name('update')->middleware('roleP:admin');
    Route::delete('delete/{country}', [CountryController::class, 'destroy'])->name('destroy')->middleware('roleP:admin');
    Route::get('show/{country}', [CountryController::class, 'show'])->name('show')->middleware('roleP:admin');
});

// hotel routes

Route::prefix('hotel')->name('hotel-')->group(function () {
    Route::get('', [HotelController::class, 'index'])->name('index')->middleware('roleP:admin');
    Route::get('/create', [HotelController::class, 'create'])->name('create')->middleware('roleP:admin');
    Route::post('store', [HotelController::class, 'store'])->name('store')->middleware('roleP:admin');
    Route::get('edit/{hotel}', [HotelController::class, 'edit'])->name('edit')->middleware('roleP:admin');
    Route::put('update/{hotel}', [HotelController::class, 'update'])->name('update')->middleware('roleP:admin');
    Route::delete('delete/{hotel}', [HotelController::class, 'destroy'])->name('destroy')->middleware('roleP:admin');
    Route::get('show/{hotel}', [HotelController::class, 'show'])->name('show')->middleware('roleP:admin');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
