<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\LoginController;


Route::get('/', [\App\Http\Controllers\SiteController::class, 'index']);

Route::get('/login', [\App\Http\Controllers\LoginController::class, 'index'])->name('site.login'); //pagina di login
Route::post('/login',[\App\Http\Controllers\LoginController::class, 'authenticate'])->name('auth.authenticate'); //autenticazione

Route::middleware('auth')->group(

    function() {
        Route::get('/dashboard',[\App\Http\Controllers\SiteController::class, 'dashboard'])->name('site.dashboard');
        Route::post('/logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('auth.logout');
    }
);

Route::get('/register', [\App\Http\Controllers\RegisterController::class, 'index'])->name('site.register'); //pagina di registrazione
