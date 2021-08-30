<?php

use Illuminate\Support\Facades\Route;
use Matteomeloni\Swapi\Controllers\PeopleController;

Route::prefix('api')
    ->middleware('api')
    ->group(function() {
        Route::get('people', [PeopleController::class, 'index'])->name('people.index');
        Route::get('people/{people}', [PeopleController::class, 'show'])->name('people.show');
    });

