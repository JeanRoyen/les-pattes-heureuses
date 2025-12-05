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

Route::livewire('/admin/dashboard', 'pages::dashboard')->name('admin.dashboard');
Route::livewire('/admin/messages', 'pages::message.index')->name('admin.messages');
Route::livewire('/admin/animals', 'pages::animal.index')->name('admin.animals');
Route::livewire('/admin/adoptions', 'pages::adoption.index')->name('admin.adoptions');
Route::livewire('/admin/volunteers', 'pages::volunteer.index')->name('admin.volunteers');
