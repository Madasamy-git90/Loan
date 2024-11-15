<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoanDetailsController;
use App\Http\Controllers\ProcessController;
use App\Http\Controllers\EmiDetailsController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(['auth'])->name('admin');

Route::middleware('auth')->group(function () {
    Route::get('/loan-details', [LoanDetailsController::class, 'index'])->name('loan.details');
    Route::get('/process-data', [ProcessController::class, 'processData'])->name('processData');
    Route::post('/process-data', [ProcessController::class, 'processData']);
});

require __DIR__.'/auth.php';
