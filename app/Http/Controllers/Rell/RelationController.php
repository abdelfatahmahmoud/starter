<?php

namespace App\Http\Controllers\Rell;

use App\Http\Controllers\Controller;
use App\models\Countrie;
use App\models\Doctor;
use App\models\Hospital;
use App\models\Pationt;
use App\models\Service;
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

    ## check in hospital your have doctors !! ######
    public function hospitalhasdoctor(){

  $hospitals =   Hospital::whereHas('doctors')->get();
  return $hospitals;


    }

    ##### get hospital is have doctor male #########

    public function hospitalhasdoctormale(){

    return    $hospitals =   Hospital::whereHas('doctors', function ($s){

            $s->where('gendar' , 1);
        })->get() ;

    }
#### get hospital is not have a doctors ############

    public function  hospitalnothasdoctor(){

    return $hospitalls = Hospital::whereDoesntHave('doctors')->get();

    }

    public function deleted($hospital_id){

    $hospitals = Hospital::find($hospital_id);

    if(!$hospitals)
        return abort('404');

    //deletd all doctors in hospitals

        $hospitals->doctors()->delete();
        $hospitals->delete();

        return redirect()->route('hospital.all');

    }

    public function doctortoservices(){

     $doctorss = Doctor::with('services')->find(6);
      return $doctorss ->name;


    }

    public function getdepartmengt(){

   return $doctorr = Service::with(['doctor' => function($f){

        $f-> select('doctor.id','name','type');
        }]) ->find(2);

    }

    public function servicesdoctor($doc_id){

    $doctor = Doctor::find($doc_id);

    $services = $doctor -> services ;

    $doctors = Doctor::select('id','name')->get();
        $servicess = Service::select('id','name')->get();

    return view('relation.services',compact('services','doctors','servicess'));

    }

    public function showservicess(Request $request){

    $doctor = Doctor::find($request -> doctor_id);

   if(!$doctor)

  return abort('404');

        //this method sync is checked all  services
  //$doctor -> services () -> attach($request -> services_id);


  //this method sync is update services and checked to servic
    //    $doctor -> services () -> sync($request -> services_id);

        //this method sync is Add services and checked to servic
        $doctor -> services () -> syncWithoutDetaching($request -> services_id);
        return redirect() ->back() -> with(['success' => 'تم الاضافه بنجاح']);  //  return $request;

    }

    public function getpationt(){


  $paption = Pationt::find(2);

  dd($paption -> doctor);

    }


    public function getcountry(){




        $country = Countrie::find(1);
        dd($country -> doctorss);

    }

    public function getCountryWithDoctors
    (){
     dd($country = Countrie::with('doctors')->find(1));
    }


    public function getdata(){

    $doctors = Doctor::select('id','name','gendar')->get();
/*
    if (isset($doctors) && $doctors-> count() > 0) {

        foreach ($doctors as $doctor){

            $doctor -> gendar =  $doctor -> gendar == 1 ? 'male' : 'female';

             }
        }
*/
        return $doctors;

    }

}
