<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\WelcomeController;
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
    Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
    Route::livewire('/animals', 'pages::animals-list')->name('pages.animals-list');

});

Route::post('/', [MessageController::class, 'submit'])->name('contact.submit');

// Admin
Route::middleware('auth')->group(function () {
    Route::livewire('/admin/dashboard', 'pages::admin/dashboard.index')->name('admin.dashboard');
    Route::livewire('/admin/messages', 'pages::admin/message.index')->name('admin.messages');
    Route::livewire('/admin/animals', 'pages::admin/animal.index')->name('admin.animals');
    Route::livewire('/admin/adoptions', 'pages::admin/adoption.index')->name('admin.adoptions');
    Route::livewire('/admin/volunteers', 'pages::admin/volunteer.index')->name('admin.volunteers');
    Route::get('/dashboard/pdf', [AnimalController::class, 'download'])->name('pdf');

});


Route::get('/admin/login', function () {
    return view('pages.admin.login');
})->name('admin.login');
