<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustamControllers extends Controller
{
    public function allow(){

        return view('custam.localss');
    }

    public function site(){

        return view('site');
    }

    public function admin(){

        return view('admin');
    }
}
