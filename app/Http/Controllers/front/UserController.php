<?php

namespace App\Http\Controllers\front;


use Illuminate\Routing\Controller;

class UserController extends Controller
{
    public function sayhello(){
        return view('welcome');

    }
}
