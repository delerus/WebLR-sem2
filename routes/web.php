<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexPageController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\InterestsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\GuestbookController;
use App\Http\Controllers\GuestbookUploadController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\MyBlogController;
use App\Http\Controllers\CSVUploadController;
use App\Http\Controllers\VisitorsLogController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserRegController;
use App\Http\Controllers\UserLogController;
use App\Http\Controllers\CommentController;

Route::get('/', [IndexPageController::class, 'index']);

Route::get('/about', function () {
    return view('about');
});

Route::get('/interests', [InterestsController::class, 'interestsList']);

Route::get('/study', function () {
    return view('study');
});

Route::get('/album', [PhotoController::class, 'album']);

Route::get('/contacts', [ContactController::class, 'showForm'])->name('contacts.form');
Route::post('/contacts', [ContactController::class, 'handleForm'])->name('contacts.handle');

Route::get('/test', [TestController::class, 'showForm'])->name('test.form');
Route::post('/test', [TestController::class, 'handleForm'])->name('test.submit');

Route::get('/guestbook', [GuestbookController::class, 'showForm'])->name('guestbook.show');
Route::post('/guestbook', [GuestbookController::class, 'submitForm'])->name('guestbook.submit');

Route::post('/admin/guestbook/upload', [AdminController::class, 'uploadGuestbookFile'])->name('guestbook.upload');

Route::post('/admin/blog/store', [AdminController::class, 'storeBlogPost'])->name('blog.store');

Route::get('/blog', [MyBlogController::class, 'index'])->name('blog.index');

Route::post('/admin/csv/upload', [AdminController::class, 'handleCSVUpload'])->name('csv.upload');

Route::get('/admin', [VisitorsLogController::class, 'showVisits'])->name('admin_dashboard');
Route::get('/admin/visitors-log', [VisitorsLogController::class, 'index'])->name('admin.visitors-log');

Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login');

Route::get('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin');

Route::get('/registration', [UserRegController::class, 'index']);
Route::post('/registrtion', [UserRegController::class, 'registrate'])->name('user.registration');

Route::get('/login', [UserLogController::class, 'index']);
Route::post('/login', [UserLogController::class, 'login'])->name('user.login');

Route::get('/logout', [UserLogController::class, 'logout']);

Route::post('/check-login', [UserRegController::class, 'checkLogin'])->name('check.login');

Route::post('/comments', [CommentController::class, 'addComment'])->name('comments.store');
