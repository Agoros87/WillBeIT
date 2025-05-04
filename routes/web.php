<?php

use App\Http\Controllers\CenterController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CommentReactionController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\PodcastController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SuperAdmin\SuperAdminController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use Spatie\Permission\Middleware\RoleMiddleware;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('superadmin/dashboard', [SuperAdminController::class, 'index'])->name('superadmin.dashboard');
    //Route::get('admin/dashboard', 'admin.dashboard')->name('admin.dashboard');
    //Route::get('teacher/dashboard', 'teacher.dashboard')->name('teacher.dashboard');
    //Route::get('student/dashboard', 'student.dashboard')->name('student.dashboard');
    Route::view('dashboard', 'dashboard')->name('dashboard');//QUITAR CUANDO ESTEN HECHAS CADA UNA Y DESCOMENTA ARRIBA
});

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

// Rutas protegidas por auth y verified
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('podcasts', PodcastController::class)->except(['index', 'show']);
    Route::resource('posts', PostController::class)->except(['index', 'show']);
    Route::resource('video', VideoController::class);
});
// Rutas publicas
Route::resource('posts', PostController::class)->only(['index', 'show']);
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::post('/comments/reactions', [CommentReactionController::class, 'store'])->name('comments.reactions.store');

// Rutas públicas
Route::resource('podcasts', PodcastController::class)->only(['index', 'show']);


Route::get('/tags', [TagsController::class, 'index'])->name('tags.index');
Route::get('/tags/create', [TagsController::class, 'create'])->name('tags.create');
Route::post('/tags', [TagsController::class, 'store'])->name('tags.store');
Route::get('/tags/{tag}/edit', [TagsController::class, 'edit'])->name('tags.edit');
Route::put('/tags/{tag}', [TagsController::class, 'update'])->name('tags.update');
Route::delete('/tags/{tag}', [TagsController::class, 'destroy'])->name('tags.destroy');

    Route::get('users/export', [UserController::class, 'exportUsers'])->name('users.export');
    Route::post('users/import', [UserController::class, 'importUsers'])->name('users.import');
    Route::get('centers/export', [CenterController::class, 'exportCenters'])->name('centers.export');
    Route::post('centers/import', [CenterController::class, 'importCenters'])->name('centers.import');

//RUTAS SOLO PARA SUPERADMIN
Route::middleware(['auth', 'superadmin'])->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('centers', CenterController::class);
});


//DEJARLAS DE MOMENTO SIN QUITAR
//Route::get('/video', [VideoController::class, 'index'])->name('video.index');
//Route::get('video/create', [VideoController::class, 'create'])->name('video.create');
//Route::post('video', [VideoController::class, 'store'])->name('video.store');
//Route::get('/video/{id}', [VideoController::class, 'show'])->name('video.show');
//Route::get('/video/{id}/edit', [VideoController::class, 'edit'])->name('video.edit');
//Route::put('/video/{id}', [VideoController::class, 'update'])->name('video.update');
//Route::delete('/video/{id}', [VideoController::class, 'destroy'])->name('video.destroy');

require __DIR__ . '/auth.php';
