<?php

use App\Http\Controllers\administrator\aboutController;
use App\Http\Controllers\administrator\homeController;
use App\Http\Controllers\administrator\skillController;
use App\Http\Controllers\front\frontController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Route::get('/', function () {
//     return view('front.index');
// })->name('front');
Route::get('/', [frontController::class,'index'])->name('front');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/home/home.page', function () {
//     return view('admin.home.index');
// })->name('home.page');

Route::resource('/home/home', homeController::class)->parameters(['home'=>'id']);
Route::resource('/home/about', aboutController::class)->parameters(['about'=>'id']);
Route::resource('/home/skill', skillController::class)->parameters(['skill'=>'id']);