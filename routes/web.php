<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminHomeController;
use App\Http\Controllers\Backend\AdminHotelController;
use App\Http\Controllers\Backend\AdminBookingController;
use App\Http\Controllers\Backend\AdminRoomController;
use App\Http\Controllers\Backend\AdminStuffController;
use App\Http\Controllers\HomeController;

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

Auth::routes();

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/dashboard', [AdminHomeController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/bookings', [AdminHomeController::class, 'bookings'])->name('admin.bookings');
    Route::get('/admin/hotels', [AdminHomeController::class, 'hotels'])->name('admin.hotels');
    Route::get('/admin/clients', [AdminHomeController::class, 'clients'])->name('admin.clients');
    Route::get('/admin/staff', [AdminHomeController::class, 'staff'])->name('admin.staff');
    Route::get('/admin/staff/create', [AdminStuffController::class, 'create'])->name('admin.stuff.create');
    Route::post('/admin/staff/create', [AdminStuffController::class, 'store'])->name('admin.stuff.store');
    Route::get('/admin/booking/{id}/edit', [AdminBookingController::class, 'edit'])->name('admin.booking.edit');
    Route::put('/admin/booking/{id}/edit', [AdminBookingController::class, 'update'])->name('admin.booking.update');
    Route::delete('/admin/bookings/destroy/{id}', [AdminBookingController::class, 'destroyBooking'])->name('admin.bookings.destroy');
    Route::get('/admin/hotels/{hotel}', [AdminHotelController::class, 'show'])->name('admin.hotels.show');
    Route::get('/admin/hotel/create' , [AdminHotelController::class, 'create'])->name('admin.hotel.create');
    Route::post('/admin/hotels/create', [AdminHotelController::class, 'store'])->name('admin.hotels.store');
    Route::get('/admin/hotels/{hotel}/edit', [AdminHotelController::class, 'edit'])->name('admin.hotels.edit');
    Route::put('/admin/hotels/{hotel}', [AdminHotelController::class, 'update'])->name('admin.hotels.update');
    Route::delete('/admin/hotels/{hotel}', [AdminHotelController::class, 'destroy'])->name('admin.hotels.destroy');
    Route::get('/admin/hotels/{hotel}/rooms', [AdminRoomController::class, 'index'])->name('admin.rooms.index');
    Route::get('/admin/hotels/{hotel}/rooms/create', [AdminRoomController::class, 'create'])->name('admin.rooms.create');
    Route::post('/admin/hotels/{hotel}/rooms/create', [AdminRoomController::class, 'store'])->name('admin.rooms.store');
    Route::get('/admin/hotels/rooms/{room}/edit', [AdminRoomController::class, 'edit'])->name('admin.rooms.edit');
    Route::put('/admin/hotels/rooms/{room}', [AdminRoomController::class, 'update'])->name('admin.rooms.update');
    Route::delete('/admin/hotels/rooms/{room}', [AdminRoomController::class, 'destroy'])->name('admin.rooms.destroy');
});


