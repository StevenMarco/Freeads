<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Auth\Events\Registered;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function showRegister()
    {
        return view('register');
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);
        
        $user = User::create(request(['name', 'email', 'password']));
        event(new Registered($user));
        auth()->login($user);
        
        return redirect()->to('/login/');
    }
}
