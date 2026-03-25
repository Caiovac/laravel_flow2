<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;


Route::get('/', [SiteController::class, 'index']);

Route::get('/login', [LoginController::class, 'index'])->name('site.getLogin'); //pagina di login
Route::post('/login', [LoginController::class, 'authenticate'])->name('auth.authenticate'); //autenticazione

Route::middleware('auth')->group(

    function() {
        Route::get('/dashboard',[SiteController::class, 'dashboard'])->name('site.dashboard');
        Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout');

        //Habits
        Route::get('/dashboard/habits/create', [HabitController::class, 'create'])->name('habits.create');
        Route::post('/dashboard/habits/store', [HabitController::class, 'store'])->name('habits.store');
    }
);

Route::get('/register', [RegisterController::class, 'index'])->name('site.register'); //pagina di registrazione
Route::post('/register', [RegisterController::class, 'store'])->name('auth.register');