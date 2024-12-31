<?php

use App\Livewire\Auth\LoginForm;
use App\Livewire\Auth\RegisterForm;
use Illuminate\Support\Facades\Route;
use App\Livewire\Auth\ForgotPasswordForm;

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::get('/login', LoginForm::class)->name('login');
Route::get('/register', RegisterForm::class)->name('register');
Route::get('/forgot-password', ForgotPasswordForm::class)->name('forgot.password');