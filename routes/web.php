<?php

use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\PhotoController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\BookingController as UserBookingController;
use App\Http\Controllers\User\CarController as UserCarController;
use App\Http\Controllers\User\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/car/{car:slug}', [UserCarController::class, 'show'])->name('car.show');
Route::get('/booking/success', [UserBookingController::class, 'success'])->name('booking.success');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/booking/{car:slug}/create', [UserBookingController::class, 'create'])->name('booking.create');
    Route::post('/booking/{car}', [UserBookingController::class, 'store'])->name('booking.store');
    Route::get('/booking/{booking}', [UserBookingController::class, 'show'])->name('booking.show');
    Route::put('/booking/{booking}', [UserBookingController::class, 'update'])->name('booking.update');

    Route::middleware(['admin'])->name('admin.')->prefix('admin')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
        Route::resource('brand', BrandController::class)->except('show');
        Route::resource('type', TypeController::class)->except('show');
        Route::resource('car', CarController::class);
        Route::resource('car.photo', PhotoController::class)->shallow()->only('create', 'store', 'destroy');
        Route::resource('car.feature', FeatureController::class)->shallow()->except('index', 'show');
        Route::resource('user', UserController::class);
        Route::resource('booking', BookingController::class)->except('create', 'store', 'edit', 'destroy');
    });
});

require __DIR__ . '/auth.php';
