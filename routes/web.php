<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::get('/animals', function () {
    return view('pages.animal-list');
})->name('pages.animals-list');

Route::get('/admin/login', function () {
    return view('pages.admin.login');
})->name('admin.login');

Route::get('/admin/dashboard', function () {
    return view('pages.admin.dashboard');
})->name('admin.dashboard');

Route::get('/admin/animals', function () {
    return view('pages.admin.animals');
})->name('admin.animals');

Route::get('/admin/adoptions', function () {
    return view('pages.admin.adoptions');
})->name('admin.adoptions');
