<?php

namespace App\Http\Controllers\front;


use App\models\Offer;
use Illuminate\Routing\Controller;

class UserController extends Controller
{
    public function sayhello()
    {
        return view('welcome');


    }


}
