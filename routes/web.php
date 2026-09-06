<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HabitController;


Route::get('/', [SiteController::class, 'index'])->name('site.index');

Route::get('/login', [LoginController::class, 'index'])->name('site.login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('auth.login');
Route::get('/register', [RegisterController::class, 'index'])->name('site.register');
Route::post('/register', [RegisterController::class, 'store'])->name('auth.register');


Route::middleware('auth')->group(function(){
    Route::get('/dashboard', [SiteController::class, 'dashboard'])->name('site.dashboard');
    Route::get('/logout', [LoginController::class, 'logout'])->name('auth.logout');
    Route::resource('/dashboard/habits', HabitController::class)->except('show');
    Route::get('/dashboard/habits/configurar', [HabitController::class, 'settings'])->name('habits.settings');
    Route::post('/dashboard/habits/{habit}/toggle', [HabitController::class, 'toggle'])->name('habits.toggle');
    Route::get('/dashboard/habits/historico/{year?}', [HabitController::class, 'history'])->name('habits.history');
});