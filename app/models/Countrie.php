<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Countrie extends Model
{
    protected $table = "countries";
    protected $fillable =['name'];

    public $timestamps = false;


    public function doctorss(){

        return $this -> hasManyThrough('App\models\Doctor','App\models\Hospital','country_id','hospital_id','id','id');
    }
}
