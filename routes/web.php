<?php

use App\Http\Controllers\PodcastController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

// Rutas públicas
Route::resource('podcasts', PodcastController::class)->only(['index', 'show']);

// Rutas protegidas por auth y verified
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('podcasts', PodcastController::class)->except(['index', 'show']);
});

require __DIR__.'/auth.php';
