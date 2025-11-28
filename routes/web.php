<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::get('/animals', function () {
    return view('pages.animal-list');
})->name('pages.animals-list');
