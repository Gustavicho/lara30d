<?php

namespace App\Http\Controllers;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return View('auth.register');
    }

    public function store()
    {
        dd(request()->all());
    }
}
