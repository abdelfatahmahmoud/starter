<?php

namespace App\Http\Controllers\Fronts;

use App\models\Offer;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserControllerTest extends Controller
{
    public function sayhello(){

        $data = ['abdelftah','mahmoud','mohamed'];

        return view('welcome',compact('data')) ;
    }



}

