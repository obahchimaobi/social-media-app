<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class LoginForm extends Component
{
    public $email;

    public $password;

    public $errorMessage;

    public function login()
    {
        $validatedData = $this->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('email', $validatedData['email'])->first();

        if (! $user || ! Hash::check($validatedData['password'], $user->password)) {
            $this->reset();
            $this->errorMessage = 'Incorrect email or password';
            return; // Stop execution here to prevent login
        }

        // if (is_null($user->email_verified_at)) {
        //     $this->reset();
        //     $this->errorMessage = 'Your email is not verified';
        // }

        Auth::login($user);

        $this->redirectRoute('home', navigate:true);
    }

    public function render()
    {
        return view('livewire.auth.login-form')->extends('layouts.app');
    }
}
