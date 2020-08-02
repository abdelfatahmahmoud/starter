<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    protected $table = "hospital";

    protected $fillable =['name', 'address','country_id','created_at', 'updated_at'];

    protected $hidden =['created_at', 'updated_at', ];

     public $timestamps = true;


     public function doctors(){

         return $this -> hasMany('App\models\Doctor','hospital_id','id');
     }
}
