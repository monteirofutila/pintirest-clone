<?php

use App\Livewire\Home;
use App\Livewire\LandingPage;
use App\Livewire\Posts\Create;
use App\Livewire\Users\Profile;
use App\Livewire\Users\Settings;
use Illuminate\Support\Facades\Route;

Route::get('/', LandingPage::class);
Route::get('/home', Home::class)->name('home');
Route::get('/profile', Profile::class)->name('profile');
Route::get('/posts/create', Create::class)->name('posts.create');
Route::get('/settings', Settings::class)->name('settings');

