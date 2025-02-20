<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function postRegister(RegisterRequest $request)
    {
        try {
            User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),'is_first_login' => true,
            ]);
            return redirect('login');
        } catch (\Throwable $th) {
            return redirect('register');
        }
    }

    public function getLogin()
    {
        return view('login');
    }

    public function postLogin(LoginRequest $request)
    {
        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            return redirect('/');
        } else {
            return redirect('login');
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect("login");
    }
}
