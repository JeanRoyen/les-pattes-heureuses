<?php

use App\Http\Controllers\AnimalController;
use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Route;

// Language

Route::get('/lang/{locale}', function (string $locale) {
    if (!in_array($locale, ['fr', 'nl', 'en'])) {
        abort(400);
    }
    \Illuminate\Support\Facades\Session::put('locale', $locale);
    return redirect()->back();
})->name('lang.switch');


// Client
Route::middleware([SetLocale::class])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');

    Route::get('/animals', [AnimalController::class, 'index'])->name('pages.animals-list');
});


// Admin
Route::middleware('auth')->group(function () {
    Route::livewire('/admin/dashboard', 'pages::admin/dashboard.index')->name('admin.dashboard');
    Route::livewire('/admin/messages', 'pages::admin/message.index')->name('admin.messages');
    Route::livewire('/admin/animals', 'pages::admin/animal.index')->name('admin.animals');
    Route::livewire('/admin/adoptions', 'pages::admin/adoption.index')->name('admin.adoptions');
    Route::livewire('/admin/volunteers', 'pages::admin/volunteer.index')->name('admin.volunteers');
});

Route::get('/admin/login', function () {
    return view('pages.admin.login');
})->name('admin.login');
