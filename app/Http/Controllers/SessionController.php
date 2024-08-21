<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return View('auth.login');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (!Auth::attempt($attributes)) {
            throw ValidationException::withMessages(['email' => 'Sorry, but the email does not match', 'password' => 'Incorrect password']);
        }

        request()->session()->regenerate();

        return redirect('/jobs');
    }

    public function destroy()
    {
        Auth::logout();

        return redirect('/');
    }
}
