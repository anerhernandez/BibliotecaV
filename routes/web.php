<?php

use App\Http\Controllers\DashboardController;
use App\Livewire\Comments;
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'dashboard');

Route::get('dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('comments', Comments::class)
    ->middleware(['auth', 'verified'])
    ->name('comments');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
