<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table = "doctor";
    protected $fillable =['name', 'type','gendar','created_at', 'updated_at','hospital_id','medical_id'];

    protected $hidden =['created_at', 'updated_at' ];

    public $timestamps = true;

    public function hospital(){

        return $this -> belongsTo('App\models\Hospital','hospital_id','id');
    }

    public function services(){

        return $this ->belongsToMany('App\models\Service','doctor_services','doctor_id','services_id','id','id');
    }
}
