<?php

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
})->name('welcome');

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/msu/{id}', [App\Http\Controllers\ShortenUrlController::class, 'search_url'])->name('search_url');
Route::post('/shorten/url', [App\Http\Controllers\ShortenUrlController::class, 'shorten_url'])->name('shorten_url');
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin_page', [App\Http\Controllers\ShortenUrlController::class, 'admin_page'])->name('admin_page');
    Route::delete('/delete/short/link/{id}', [App\Http\Controllers\ShortenUrlController::class, 'delete_short_link'])->name('destroy');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
