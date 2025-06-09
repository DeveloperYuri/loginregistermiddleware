<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/registerpost', [AuthController::class, 'registerpost'])->name('registerpost');
Route::post('/loginpost', [AuthController::class, 'loginpost'])->name('loginpost');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'login'], function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('indexdashboard');
});


