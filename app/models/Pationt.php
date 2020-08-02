<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Pationt extends Model
{
    protected $table = "pationts";
    protected $fillable =['name', 'age'];

   public $timestamps = false;


   public function doctor(){

       return $this-> hasOneThrough('App\models\Doctor','App\models\Medical','pationt_id','medical_id','id','id');
   }
}
