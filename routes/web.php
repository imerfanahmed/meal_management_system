<?php

use App\Http\Controllers\AuthConroller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\mealController;
use App\Http\Controllers\MemberController;
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

// Route::get('/', function () {
//     return view('dashboard')->with('title', 'Dashboard');
// })->middleware('auth');

Route::get('/',[HomeController::class,'index'])->middleware('auth');


Route::get('/login',[AuthConroller::class,'login'])->name('login')->middleware('guest');
Route::post('/login',[AuthConroller::class,'login_post'])->middleware('guest');

Route::get('/logout',[AuthConroller::class,'logout'])->name('logout')->middleware('auth');

Route::get('/register',[AuthConroller::class,'register'])->name('register')->middleware('guest');
Route::post('/register',[AuthConroller::class,'register_post'])->middleware('guest');


//All About Member Crud
Route::get('members',[MemberController::class,'index'])->name('members')->middleware('auth');
Route::post('add_members',[MemberController::class,'addMember']);
Route::get('delete_members',[MemberController::class,'deleteMember']);
Route::get('get_member',[MemberController::class,'getMember']);
Route::post('update_member',[MemberController::class,'updateMember']);


Route::view('bazar_cost','addBazar');
Route::get('daily_meal',[mealController::class,'index']);
Route::view('configuration','configuration');

