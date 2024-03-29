<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\ClientAuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DeliveryAuthController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\FlutterwaveController;
use App\Http\Controllers\MineralController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RraAuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('client.login');
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


// Shipping Partner routes
Route::prefix('delivery')->group(function () {
    Route::view('/login', 'delivery.login')->name('delivery.login');
    Route::post('/login', [DeliveryAuthController::class, 'login'])->name('delivery.login.submit');
    Route::get('/logout', [DeliveryAuthController::class, 'logout'])->name('delivery.logout');
});

// PROTECTED AUTH MIDDLEWARE ROUTES
Route::prefix('admin')->middleware(['auth:admin'])->group(function () {
    Route::get('/dashboard', [AnalyticsController::class, 'adminAnalytics']);
    Route::get('/payment', [FlutterwaveController::class, 'paymentHistory']);
    Route::get('/new-mineral', [MineralController::class, 'create']);
    Route::post('/minerals', [MineralController::class, 'store'])->name('minerals.store');
    Route::get('/manage-minerals', [MineralController::class, 'index'])->name('minerals.index');
    Route::post('/shipping', [DeliveryController::class, 'store'])->name('deliveries.store');
    Route::get('/shipping', [DeliveryController::class, 'index'])->name('deliveries.index');
    Route::get('/orders', [OrderController::class, 'showOrders'])->name('orders.show');
    Route::put('/orders/{id}', [OrderController::class,'assignDelivery'])->name('orders.update');
    Route::get('/daily-pdf', [MineralController::class, 'generateMineralsPdf']);
    Route::get('/order-pdf', [OrderController::class, 'generateDailyOrderReport']);
    Route::get('/payment-pdf', [FlutterwaveController::class, 'generateDailyPaymentReport']);
});

// Rra routes
Route::prefix('rra')->middleware(['auth:rra'])->group(function () {
    Route::view('/dashboard', 'rra.dashboard');
    Route::get('/transit', [OrderController::class, 'showOrdersTransit'])->name('orders.rra.show');
    Route::get('/transit/{id}', [OrderController::class,'rraInspection'])->name('orders.transit');
    Route::get('/generate/{id}', [OrderController::class,'generateRrra'])->name('orders.transit');
});

// Shipping Partner routes
Route::prefix('delivery')->middleware(['auth:delivery'])->group(function () {
    Route::view('/dashboard', 'delivery.dashboard');
    Route::get('/shipping', [OrderController::class, 'showOrdersDeliveryGuy']);
    Route::get('/shipping/approve/{id}', [OrderController::class, 'deliverOrder']);
    Route::get('/order-pdf', [OrderController::class, 'generateLogisticsDocument']);
});

// Client routes
Route::prefix('client')->middleware(['auth:client'])->group(function () {
    Route::view('/dashboard', 'client.dashboard');
    Route::get('/view-minerals', [MineralController::class, 'indexClient'])->name('minerals.index');
    Route::get('/view-minerals/{id}', [MineralController::class, 'show'])->name('minerals.show');
    Route::post('/view-minerals', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders', [OrderController::class, 'showOrdersClient'])->name('orders.client');
    
});

// flutterwave callback function
Route::get('/rave/callback', [FlutterwaveController::class, 'callback'])->name('callback');
?>