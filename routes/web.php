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

Route::get('/admin', [GuestbookUploadController::class, 'showForm'])->name('guestbook.upload.form');
Route::post('/admin/guestbook/upload', [GuestbookUploadController::class, 'uploadFile'])->name('guestbook.upload.file');

Route::get('/admin', [BlogController::class, 'index'])->name('admin_blog.index');
Route::post('/admin/blog/store', [BlogController::class, 'store'])->name('admin_blog.store');;

Route::get('/blog', [MyBlogController::class, 'index'])->name('blog.index');

Route::get('/admin', [CSVUploadController::class, 'showUploadForm'])->name('upload-blog.form');
Route::post('/admin/blog/upload', [CSVUploadController::class, 'handleUpload'])->name('upload-blog.handle');

Route::get('/admin', [VisitorsLogController::class, 'showVisits'])->name('admin_dashboard');
Route::get('/admin/visitors-log', [VisitorsLogController::class, 'index'])->name('admin.visitors-log');

