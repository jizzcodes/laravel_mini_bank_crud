<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('index',[UserController::class,'index'])->name('index');
Route::get('adduser',[UserController::class,'adduser'])->name('adduser');
Route::get('show/{id}',[UserController::class,'show'])->name('show');
Route::post('store',[UserController::class,'store'])->name('store');
Route::post('update/{id}',[UserController::class,'update'])->name('update');
Route::get('destroy/{id}',[UserController::class,'destroy'])->name('destroy');