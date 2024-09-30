<?php

use App\Livewire\Home;
use App\Livewire\LandingPage;
use App\Livewire\Posts\Create;
use App\Livewire\Users\Profile;
use App\Livewire\Users\Settings;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {

    Route::get('/posts/create', Create::class)->name('posts.create');
    Route::get('/settings', Settings::class)->name('settings');

});

Route::get('/', LandingPage::class);
Route::redirect('/', '/home');
Route::get('/home', Home::class)->name('home');
Route::get('/{username}', Profile::class)->name('profile');





