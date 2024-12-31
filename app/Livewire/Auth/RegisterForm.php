<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;

class RegisterForm extends Component
{
    public $name;

    public $email;

    public $password;

    public $checkbox;

    public function submit()
    {
        $validatedData = $this->validate([
            'name' => 'required|string',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8',
            'checkbox' => 'accepted',
        ]);

        // dd($validatedData);

        User::create($validatedData);

        session()->flash('success', 'Registeration successfull.');
        
        $this->redirectRoute('login', navigate:true);
    }

    public function render()
    {
        return view('livewire.auth.register-form')->extends('layouts.app');
    }
}
