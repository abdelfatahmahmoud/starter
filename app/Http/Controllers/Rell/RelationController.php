<?php

namespace App\Http\Controllers\Rell;

use App\Http\Controllers\Controller;
use App\models\Doctor;
use App\models\Hospital;
use Illuminate\Http\Request;

class RelationController extends Controller
{

public function rell(){

$user =\App\User::with('phone')->find(4);

return response()-> json($user);

}

 public function hospitalanddoctor(){

     $hospital = Hospital::find(1) ;

    $doc  =$hospital -> doctors ;

    foreach ($doc as $docs){

        echo $docs -> name . "<br>";
    }

    $doc = Doctor::find(1);

    return $doc -> hospital ->name;

 }

 public function hospitalss(){

   $hospitall  = Hospital::select('id','name','address')->get();

    return view('relation.hospital', compact('hospitall'));

 }
    public function doctorss($hos_id){

    $hospital = Hospital::find($hos_id);

    $doctors = $hospital  -> doctors ;


        return view('relation.doctors', compact('doctors'));

    }

}
