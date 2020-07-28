<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table = "doctor";
    protected $fillable =['name', 'type','created_at', 'updated_at','hospital_id'];

    protected $hidden =['created_at', 'updated_at' ];

    public $timestamps = true;

    public function hospital(){

        return $this -> belongsTo('App\models\Hospital','hospital_id','id');
    }
}
