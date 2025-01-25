<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rules\Password;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        $attributes = request()->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email', 'max:254'],
            'password' => ['required', Password::min(5)->letters()->numbers(), 'confirmed'] //password_confirmation
        ]);
        $user = User::create($attributes);
        Auth::login($user);
        return redirect('/jobs');
    }
}
