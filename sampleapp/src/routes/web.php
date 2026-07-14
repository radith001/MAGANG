<?php

declare(strict_types=1);

use App\Http\Controllers\ComplaintController;
use App\Livewire\Home;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;

/* NOTE: Do Not Remove
/ Livewire asset handling if using sub folder in domain
*/
Livewire::setUpdateRoute(function ($handle) {
    return Route::post(config('app.asset_prefix') . '/livewire/update', $handle);
});

Livewire::setScriptRoute(function ($handle) {
    return Route::get(config('app.asset_prefix') . '/livewire/livewire.js', $handle);
});
/*
/ END
*/

Route::get('/', Home::class)->name('home');

Route::post('/complaint', [ComplaintController::class, 'store'])->name('complaint.store');
