<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function sell(){
        return view('sell');
    }

    public function item(){
        return view('item');
    }

    public function purchase(){
        return view('purchase');
    }
}
