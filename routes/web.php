<?php

use App\Http\Controllers\AuthConroller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('dashboard')->with('title', 'Dashboard');
})->middleware('auth');


Route::get('/login',[AuthConroller::class,'login'])->name('login')->middleware('guest');
Route::post('/login',[AuthConroller::class,'login_post'])->middleware('guest');

Route::get('/logout',[AuthConroller::class,'logout'])->name('logout')->middleware('auth');

Route::get('/register',[AuthConroller::class,'register'])->name('register')->middleware('guest');
Route::post('/register',[AuthConroller::class,'register_post'])->middleware('guest');
