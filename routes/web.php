<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/interests', function () {
    return view('interests');
});

Route::get('/study', function () {
    return view('study');
});

