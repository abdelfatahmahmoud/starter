<?php

namespace App\Http\Controllers;

use App\Events\VideoViewer;
use App\models\videoo;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function viewer(){

      $video =   videoo::first();

        event(new VideoViewer($video));

        return view('create.video') -> with ('video' , $video);

    }
}
