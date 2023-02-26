<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\ClientAuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\RraAuthController;
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

Route::get('/', function () {
    return view('welcome');
});

// Admin routes
Route::prefix('admin')->group(function () {
    Route::view('/login', 'admin.login')->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
    Route::get('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
});

// Rra routes
Route::prefix('rra')->group(function () {
    Route::view('/login', 'rra.login')->name('rra.login');
    Route::post('/login', [RraAuthController::class, 'login'])->name('rra.login.submit');
    Route::get('/logout', [RraAuthController::class, 'logout'])->name('rra.logout');
});

// Client routes
Route::prefix('client')->group(function () {
    Route::view('/login', 'client.login')->name('client.login');
    Route::post('/login', [ClientAuthController::class, 'login'])->name('client.login.submit');
    Route::get('/logout', [ClientAuthController::class, 'logout'])->name('client.logout');
    Route::view('/signup', 'client.signup');
    Route::post('/signup', [ClientController::class, 'register'])->name('client.signup.submit');
});

// PROTECTED AUTH MIDDLEWARE ROUTES
Route::prefix('admin')->middleware(['auth:admin'])->group(function () {
    Route::view('/dashboard', 'admin.dashboard');
});

// Rra routes
Route::middleware(['auth:rra'])->group(function () {
    Route::get('/dashboard', [RraController::class, 'dashboard'])->name('rra.dashboard');
});

// Client routes
Route::middleware(['auth:client'])->group(function () {
    Route::get('/dashboard', [ClientController::class, 'dashboard'])->name('client.dashboard');
});
