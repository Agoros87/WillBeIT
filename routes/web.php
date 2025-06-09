<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\CenterController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CommentReactionController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PodcastController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterInvitedController;
use App\Http\Controllers\SuperAdmin\SuperAdminController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\Teacher\TeacherController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use Spatie\Permission\Middleware\RoleMiddleware;

Route::get('/', HomeController::class)->name('home');

Route::get('invitation/create', [InvitationController::class, 'show'])->name('invitation.create');
Route::post('invitation', [InvitationController::class, 'invite'])->name('invitations.send');


Route::get('/register-invited/{token}', [RegisterInvitedController::class, 'showForm'])->name('invitation.register-invited.');
Route::post('/register-invited/{token}', [RegisterInvitedController::class, 'register']);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('superadmin/dashboard', [SuperAdminController::class, 'index'])->name('superadmin.dashboard');
    Route::get('student/dashboard', [StudentController::class, 'index'])->name('student.dashboard');
    Route::get('student/favorites', [StudentController::class, 'favorites'])->name('student.favorites');
    Route::get('student/comments', [StudentController::class, 'comments'])->name('student.comments');
    Route::get('student/my-posts', [StudentController::class, 'myPosts'])->name('student.my-posts');
    Route::get('student/my-podcasts', [StudentController::class, 'myPodcasts'])->name('student.my-podcasts');
    Route::get('student/my-videos', [StudentController::class, 'myVideos'])->name('student.my-videos');
    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('teacher/dashboard', [TeacherController::class, 'index'])->name('teacher.dashboard');
    Route::view('dashboard', 'dashboard')->name('dashboard');//QUITAR CUANDO ESTEN HECHAS CADA UNA Y DESCOMENTA ARRIBA
});

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
    Route::post('/posts/{post}/like', [App\Http\Controllers\LikeController::class, 'toggle'])->name('posts.like');
    Route::post('/upload-trix-image', [PostController::class, 'uploadTrixImage'])->name('upload.trix.image');
});


// Rutas protegidas por auth y verified
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('podcasts', PodcastController::class)->except(['index', 'show']);
    Route::resource('posts', PostController::class)->except(['index', 'show']);
    Route::resource('video', VideoController::class)->except(['index', 'show']);
});


// Rutas publicas
Route::resource('posts', PostController::class)->only(['index', 'show']);
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::post('/comments/reactions', [CommentReactionController::class, 'store'])->name('comments.reactions.store');
Route::resource('podcasts', PodcastController::class)->only(['index', 'show']);
Route::resource('video', VideoController::class)->only(['index', 'show']);

Route::get('/languages/{lang}', LanguageController::class)->name('languages');

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
Route::middleware(['auth', 'role:admin,superadmin'])->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('centers', CenterController::class);
});


require __DIR__ . '/auth.php';
