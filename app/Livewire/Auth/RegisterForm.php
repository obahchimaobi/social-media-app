<?php

namespace App\Livewire\Auth;

use App\Mail\RegisterMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Livewire\Component;

class RegisterForm extends Component
{
    public $name;

    public $email;

    public $password;

    public $checkbox;

    public $message;

    public function submit()
    {
        $validatedData = $this->validate([
            'name' => 'required|string',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8',
            'checkbox' => 'accepted',
        ]);

        $user = new User([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'],
        ]);

        $user->save();

        $email = $user->email;
        $hash = sha1($email);

        $verificationUrl = URL::temporarySignedRoute(
            'verify.email',
            now()->addMinutes(10),
            ['email' => $user->email, 'hash' => $hash]
        );

        Mail::to($email)->send(new RegisterMail($user, $email, $hash, $verificationUrl));
        $this->reset();

        $this->message = 'A confirmation email has been sent to '.$validatedData['email'].'. Click the verification link sent to your email to complete the verification process';
    }

    public function render()
    {
        return view('livewire.auth.register-form')->extends('layouts.app');
    }
}
