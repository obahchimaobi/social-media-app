<?php

use App\Livewire\LoginForm;
use App\Livewire\RegisterForm;
use App\Livewire\ForgotPasswordForm;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::get('/login', LoginForm::class)->name('login');
Route::get('/register', RegisterForm::class)->name('register');
Route::get('/forgot-password', ForgotPasswordForm::class)->name('forgot.password');