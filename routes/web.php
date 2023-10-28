<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RestaurantController;
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
Route::get('/',[AuthController::class, 'loginPage'])->name('login');
Route::post('/login-user',[AuthController::class, 'login']);
Route::get('/logout',[AuthController::class, 'logout']);
Route::get('/register',[AuthController::class, 'registerPage']);
Route::post('/register-user',[AuthController::class, 'register']);

                     // User Pages
Route::middleware('auth')->group(function () {
    Route::get('/home',[RestaurantController::class, 'index'])->name('home');
});
                    // Admin Pages
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
});