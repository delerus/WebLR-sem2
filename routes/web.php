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

Route::get('/album', function () {
    return view('album');
});

Route::get('/contacts', function () {
    return view('contacts');
});

Route::get('/test', function () {
    return view('test');
});


