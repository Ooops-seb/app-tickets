<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');

    // Rutas de tickets
    Route::get('tickets', \App\Livewire\Tickets\Index::class)->name('tickets.index');
    Route::get('tickets/create', \App\Livewire\Tickets\Create::class)->name('tickets.create');
    Route::get('tickets/{ticket}/edit', \App\Livewire\Tickets\Edit::class)->name('tickets.edit');
});

require __DIR__ . '/auth.php';
