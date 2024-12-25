<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function profile()
    {
        return view('profile');
    }

    public function edit_profile()
    {
        return view('edit_profile');
    }
    
    public function edit_address()
    {
        return view('edit_address');
    }

}
