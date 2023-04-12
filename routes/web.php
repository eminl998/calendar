<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VacationRequestController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HolidayVacationsController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/vacation-requests', [VacationRequestController::class, 'index'])->name('vacation-requests.index');
    Route::post('/vacation-requests', [VacationRequestController::class, 'store'])->name('vacation-requests.store');
    Route::post('/vacation-requests/{request}/approve', [DashboardController::class, 'approve'])->name('vacation-requests.approve');
    Route::post('/vacation-requests/{request}/reject', [DashboardController::class, 'reject'])->name('vacation-requests.reject');
    Route::delete('/vacation-requests/{id}', [VacationRequestController::class, 'destroy'])->name('vacation-requests.destroy');

    Route::get('/holidays', [HolidayVacationsController::class, 'index'])->name('holidays.index');
    Route::post('/holidays', [HolidayVacationsController::class, 'store'])->name('holidays.store');
    Route::delete('/holidays/{title}', [HolidayVacationsController::class, 'destroy'])->name('holidays.destroy');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{email}/pdf', [UserController::class, 'downloadPdf'])->name('users.downloadPdf');


    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';