<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class phone extends Model
{
    protected $table = "phones";
    protected $fillable =['code','phone','user_id'];

    protected $hidden =['user_id' ];

 public $timestamps = false;


    ##################start relation #################

    public function phone(){

        return $this -> belongsTo('App\User', 'user_id');

    }

    ##################End relation #################


}
