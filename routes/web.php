<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\ReservationController;

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
Route::get('/login',[AuthController::class, 'loginPage'])->name('login');
Route::post('/login-user',[AuthController::class, 'login']);
Route::get('/logout',[AuthController::class, 'logout']);
// Route::get('/register',[AuthController::class, 'registerPage']);
// Route::post('/register-user',[AuthController::class, 'register']);

                     // User Pages
Route::get('/',[RestaurantController::class, 'home'])->name('home');
Route::get('/menu',[RestaurantController::class, 'menu'])->name('menu');
Route::get('/menu/{category}',[RestaurantController::class, 'show']);
Route::get('/reservation',[RestaurantController::class, 'reservation'])->name('reservation');
Route::get('/contact',[RestaurantController::class, 'contact'])->name('contact');
Route::post('/contact',[RestaurantController::class, 'send']);
Route::post('/reservation' , [RestaurantController::class, 'create']);


                    // Admin Pages
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index']);
    Route::get('/dashboard/reservation', [AdminController::class, 'reservation'])->name('admin.Reservation');
    Route::get('/dashboard/tables', [AdminController::class, 'table'])->name('admin.Table');
    Route::get('/dashboard/menu', [MenuController::class, 'index']);
    Route::post('/add-dish', [MenuController::class, 'create']);
    Route::post('/delete/{id}', [MenuController::class, 'destroy']);
    Route::get('/edit/{id}', [MenuController::class, 'edit']);
    Route::post('/edit/{id}', [MenuController::class, 'update']);
    Route::get('/dashboard/create-table', [ReservationController::class, 'create']);
    Route::post('/add-table', [ReservationController::class, 'store']);
    Route::post('/delete-reservation/{id}', [ReservationController::class, 'destroy']);
    Route::get('/edit-reservation/{id}', [ReservationController::class, 'edit']);
    Route::post('/edit-reservation/{id}', [ReservationController::class, 'update']);
    Route::post('/delete-table/{id}', [TableController::class, 'destroy']);
});