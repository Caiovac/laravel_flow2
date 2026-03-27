<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;


Route::get('/', [SiteController::class, 'index'])->name('index');

Route::get('/login', [LoginController::class, 'index'])->name('site.login'); //pagina di login
Route::post('/login', [LoginController::class, 'authenticate'])->name('auth.authenticate'); //autenticazione

Route::middleware('auth')->group(

    function() {
        Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout');

        //La manipolazione delle abittudini occorre dal fatto che un utente sia logato e abbia visionato la sua dashboard
        //Dalla /dashboard vediamo le rotta complementari come /habits/create oppure
        // Route::get('/dashboard',[SiteController::class, 'dashboard'])->name('site.dashboard');
        // Route::get('/dashboard/habits/create', [HabitController::class, 'create'])->name('habits.create');
        // Route::post('/dashboard/habits', [HabitController::class, 'store'])->name('habit.store');
        // Route::delete('/dashboard/habits/{habit}', [HabitController::class, 'destroy'])->name('habit.destroy');
        // Route::get('/dashboard/habits/{habit}/edit', [HabitController::class, 'edit'])->name('habit.edit');
        // Route::put('/dashobard/habits/{habit}', [HabitController::class, 'update'])->name('habit.update');
        Route::resource('/dashboard/habits', HabitController::class);


    }
);

Route::get('/register', [RegisterController::class, 'index'])->name('site.register'); //pagina di registrazione
Route::post('/register', [RegisterController::class, 'store'])->name('auth.register');