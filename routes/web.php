<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
});

Route::get('snoep', [App\Http\Controllers\SnoepController::class, 'index']);

Route::middleware('auth')->group(function() {
Route::get('snoep/create', [App\Http\Controllers\SnoepController::class, 'create']);
Route::post('snoep/store', [App\Http\Controllers\SnoepController::class, 'store']);
Route::get('snoep/edit/{id}',   [App\Http\Controllers\SnoepController::class, 'edit']);
Route::post('snoep/update/{id}',   [App\Http\Controllers\SnoepController::class, 'update']);
Route::post('snoep/destroy/{id}',  [App\Http\Controllers\SnoepController::class, 'destroy']);
});
require __DIR__.'/auth.php';
