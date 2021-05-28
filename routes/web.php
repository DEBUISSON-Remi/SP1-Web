<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get("/login", [\App\Http\Controllers\ConnexionController::class, 'index'])->name('login');

Route::post("/login", [\App\Http\Controllers\ConnexionController::class, 'userLogin'])->name('login.api');

Route::middleware(['auth-api'])->group(function () {

    Route::get('/compteRendu', [\App\Http\Controllers\CompteRenduController::class, 'list'])->name('compteRendu');

    Route::get('/', [\App\Http\Controllers\HomeController::class, 'home'])->name('home');

    Route::get('/portefeuillePraticien', [\App\Http\Controllers\PractitionerController::class, 'list'])->name('portefeuillePraticien');

    Route::get('/activitesComplementaires', [\App\Http\Controllers\ActivityController::class, 'list'])->name('activitesComplementaires');

    Route::get('/profil', [\App\Http\Controllers\EmployeeController::class, 'profil'])->name('profil');

    Route::get("/logout", [\App\Http\Controllers\ConnexionController::class, 'logout'])->name('logout');

    Route::middleware(['admin'])->group(function () {
        Route::get('/administration', [\App\Http\Controllers\AdministrationController::class, 'admin'])->name('administration');

        Route::put('administration/{id}',[\App\Http\Controllers\AdministrationController::class,'update'])->name('administration.update');
    });
});







