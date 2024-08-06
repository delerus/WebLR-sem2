<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\InterestsController;

Route::get('/', function () {
    return view('index');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/interests', [InterestsController::class, 'interestsList']);

Route::get('/study', function () {
    return view('study');
});

Route::get('/album', [PhotoController::class, 'album']);

Route::get('/contacts', function () {
    return view('contacts');
});

Route::get('/test', function () {
    return view('test');
});


