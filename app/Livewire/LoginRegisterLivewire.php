<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use App\Models\User;


class LoginRegisterLivewire extends Component
{
    public $name, $email, $password, $password_confirmation;
    public $loginEmail, $loginPassword;
    public $tabName = 'login';

    public function login()
    {
        $this->validate([
            'loginEmail' => 'required|email',
            'loginPassword' => 'required|min:6',
        ],[
            'loginEmail.required' => 'The email field is required.',
            'loginEmail.email' => 'The email must be a valid email address.',
            'loginPassword.required' => 'The password field is required.',
            'loginPassword.min' => 'The password must be at least 6 characters.'
        ]);

        if (Auth::attempt(['email' => $this->loginEmail, 'password' => $this->loginPassword])) {
            $this->dispatch('notify', type: 'success', message: 'Loged in successfully');
            $this->redirect('quiz-menu');
        }else{
            $this->dispatch('notify', type: 'error', message: 'Invalid email or password');
        }

    }

    public function register()
    {
        $this->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ],[
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'The email has already been taken.',
            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least 6 characters.',
            'password.confirmed' => 'The password confirmation does not match.'
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        Auth::login($user);
        return redirect()->to('/quiz-menu');
    }

    public function tabClick($tab){
        $this->tabName = $tab;
    }

    public function render()
    {
        return view('livewire.login-register-livewire');
    }
}
