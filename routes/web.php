<?php

use App\Http\Controllers\PodcastController;
use App\Http\Controllers\CenterController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use Spatie\Permission\Middleware\RoleMiddleware;

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

// Rutas protegidas por auth y verified
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('podcasts', PodcastController::class)->except(['index', 'show']);
});

// Rutas públicas
Route::resource('podcasts', PodcastController::class)->only(['index', 'show']);

Route::get('/video', [VideoController::class, 'index'])->name('video.index');
Route::get('video/create', [VideoController::class, 'create'])->name('video.create');
Route::post('video', [VideoController::class, 'store'])->name('video.store');
Route::get('/video/{id}', [VideoController::class, 'show'])->name('video.show');
Route::get('/video/{id}/edit', [VideoController::class, 'edit'])->name('video.edit');
Route::put('/video/{id}', [VideoController::class, 'update'])->name('video.update');
Route::delete('/video/{id}', [VideoController::class, 'destroy'])->name('video.destroy');

Route::get('/tags', [TagsController::class, 'index'])->name('tags.index');
Route::get('/tags/create', [TagsController::class, 'create'])->name('tags.create');
Route::post('/tags', [TagsController::class, 'store'])->name('tags.store');
Route::get('/tags/{tag}/edit', [TagsController::class, 'edit'])->name('tags.edit');
Route::put('/tags/{tag}', [TagsController::class, 'update'])->name('tags.update');
Route::delete('/tags/{tag}', [TagsController::class, 'destroy'])->name('tags.destroy');

Route::middleware(RoleMiddleware::using('super-admin'))->group(function () {
    Route::resource('centers', CenterController::class);
});

require __DIR__ . '/auth.php';
