<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::get('/animals', function () {
    return view('pages.animal-list');
})->name('pages.animals-list');

Route::get('/login', function () {
    return view('pages.admin.login');
})->name('admin.login');
