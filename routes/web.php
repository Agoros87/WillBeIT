<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\CenterController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CommentReactionController;
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
Route::get('/register-invited/{token}', [RegisterInvitedController::class, 'showForm'])->name('invitation.register-invited.');
Route::post('/register-invited/{token}', [RegisterInvitedController::class, 'register']);
Route::view('invitation/pending', 'invitation.pending')->name('invitation.pending');
Route::view('invitation/rejected', 'invitation.rejected')->name('invitation.rejected');

//Ruta dashboard Superadmin
Route::middleware(['auth', RoleMiddleware::using('superadmin')])->group(function () {
    Route::get('users/export', [UserController::class, 'exportUsers'])->name('users.export');
    Route::post('users/import', [UserController::class, 'importUsers'])->name('users.import');
    Route::get('centers/export', [CenterController::class, 'exportCenters'])->name('centers.export');
    Route::post('centers/import', [CenterController::class, 'importCenters'])->name('centers.import');
    Route::get('superadmin/dashboard', [SuperAdminController::class, 'index'])->name('superadmin.dashboard');
    Route::resource('centers', CenterController::class);
    Route::get('/tags', [TagsController::class, 'index'])->name('tags.index');
    Route::get('/tags/create', [TagsController::class, 'create'])->name('tags.create');
    Route::post('/tags', [TagsController::class, 'store'])->name('tags.store');
    Route::get('/tags/{tag}/edit', [TagsController::class, 'edit'])->name('tags.edit');
    Route::put('/tags/{tag}', [TagsController::class, 'update'])->name('tags.update');
    Route::delete('/tags/{tag}', [TagsController::class, 'destroy'])->name('tags.destroy');
});
//Ruta dashboard  admin
Route::middleware(['auth', RoleMiddleware::using('admin')])->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('admin/my-center', [AdminController::class, 'myCenter'])->name('admin.my-center');
    Route::get('admin/posts-users-centers', [AdminController::class, 'postsUsersCenters'])->name('admin.posts-users-centers');
    Route::get('admin/podcasts-users-centers', [AdminController::class, 'podcastsUsersCenters'])->name('admin.podcasts-users-centers');
    Route::get('admin/videos-users-centers', [AdminController::class, 'videosUsersCenters'])->name('admin.videos-users-centers');
    Route::get('admin/users-centers', [AdminController::class, 'usersCenters'])->name('admin.users-centers');
});

//Rutas teacher (dashboard )
Route::middleware(['auth', RoleMiddleware::using('teacher')])->group(function () {
    Route::get('teacher/dashboard', [TeacherController::class, 'index'])->name('teacher.dashboard');
    Route::get('invitation/create', [InvitationController::class, 'show'])->name('invitation.create');
    Route::post('invitation', [InvitationController::class, 'invite'])->name('invitations.send');
    Route::post('/students/{student}/accept', [TeacherController::class, 'acceptStudent'])->name('students.accept');
    Route::post('/students/{student}/reject', [TeacherController::class, 'rejectStudent'])->name('students.reject');
    Route::post('/post/{post}/accept', [TeacherController::class, 'acceptPost'])->name('post.accept');
    Route::post('/post/{post}/reject', [TeacherController::class, 'rejectPost'])->name('post.reject');
    Route::post('/podcast/{podcast}/accept', [TeacherController::class, 'acceptPodcast'])->name('podcast.accept');
    Route::post('/podcast/{podcast}/reject', [TeacherController::class, 'rejectPodcast'])->name('podcast.reject');
    Route::post('/video/{id}/accept', [TeacherController::class, 'acceptVideo'])->name('video.accept');
    Route::post('/video/{id}/reject', [TeacherController::class, 'rejectVideo'])->name('video.reject');

});

//Rutas Student (dashboard)
Route::middleware(['auth', 'verified', RoleMiddleware::using('student')])->group(function () {
    Route::get('student/dashboard', [StudentController::class, 'index'])->name('student.dashboard');
    Route::get('student/favorites', [StudentController::class, 'favorites'])->name('student.favorites');
    Route::get('student/comments', [StudentController::class, 'comments'])->name('student.comments');
    Route::get('student/my-posts', [StudentController::class, 'myPosts'])->name('student.my-posts');
    Route::get('student/my-podcasts', [StudentController::class, 'myPodcasts'])->name('student.my-podcasts');
    Route::get('student/my-videos', [StudentController::class, 'myVideos'])->name('student.my-videos');
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
    Route::put('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::get('/comments/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
    Route::post('/comments/reactions', [CommentReactionController::class, 'store'])->name('comments.reactions.store');
});

Route::middleware(['auth', RoleMiddleware::using(['superadmin', 'admin'])])->group(function () {
    Route::resource('users', UserController::class);
});

// Rutas publicas
Route::resource('posts', PostController::class)->only(['index', 'show']);
Route::resource('podcasts', PodcastController::class)->only(['index', 'show']);
Route::resource('video', VideoController::class)->only(['index', 'show']);
Route::get('/languages/{lang}', LanguageController::class)->name('languages');


require __DIR__ . '/auth.php';
