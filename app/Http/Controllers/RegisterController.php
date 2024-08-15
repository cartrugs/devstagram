<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function index() 
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // dd($request);

        // Validación
        $this->validate($request, [
            'name' => 'required|string|min:2|max:30',
            'username' => 'required|unique:users|string|min:3|max:20',
            'email' => 'required|email|unique:users|max:60',
            'password' => 'required|string|min:8',
        ]);
    }

}
