<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::livewire('/profiles/{profile}', 'pages::profile.show')->name('profile.show');
});

Route::livewire('/rides', 'pages::ride.discover')->name('discover');

Route::livewire('/sandbox', 'pages::sandbox')->name('sandbox');

require __DIR__.'/settings.php';
