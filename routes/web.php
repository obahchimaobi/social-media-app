<?php

use App\Livewire\ForgotPasswordForm;
use App\Livewire\Home\HomePage;
use App\Livewire\LoginForm;
use App\Livewire\RegisterForm;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->middleware('auth')->name('home');

Route::get('/dashboard', HomePage::class)->name('dashboard');

Route::get('/login', LoginForm::class)->name('login');
Route::get('/register', RegisterForm::class)->name('register');
Route::get('/forgot-password', ForgotPasswordForm::class)->name('forgot.password');

Route::get('/email/verify/{email}/{hash}', function ($email, $hash, Request $request) {
    $user = User::where('email', $email)->firstOrFail();

    if (! hash_equals(sha1($user->email), $hash)) {
        abort(403, 'Invalid verification link.');
    }

    if ($user->email_verified_at) {
        return redirect()->route('login')->with('error', 'Your email is already verified.');
    }

    if (! $request->hasValidSignature()) {
        abort(403, 'Url has expired');
    }

    // $user->update(['email_verified_at' => now()]);
    $user->email_verified_at = now();
    $user->save();

    return redirect()->route('login')->with('success', 'Your email has been successfully verified.');
})->middleware('signed')->name('verify.email');
