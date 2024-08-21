<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return View('auth.register');
    }

    public function store()
    {
        $attributes = request()->validate([
            'first_name' => ['required', 'string', 'min:3'],
            'second_name' => ['required', 'string', 'min_:3'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', Password::min(6)],
        ]);

        $user = User::create($attributes);

        Auth::login($user);

        return redirect('jobs');
    }
}
