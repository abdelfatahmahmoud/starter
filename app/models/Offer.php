<?php

namespace App\models;

use App\Scopes\GlobalScope;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $table = "Offers";
    protected $fillable =['id','photo','name', 'price', 'detials','created_at', 'updated_at','status'];

    protected $hidden =['created_at', 'updated_at', ];

   // public $timestamps = false;


    protected static function boot()
    {

        parent::boot();

        static::addGlobalScope(new GlobalScope);
    }



/*
    // this is scope function  local models

    public function scopeinactive($act){

        return $act->where('status',0);

    }
*/

    public function setNameAttribute($value){

    $this -> attributes['name'] = strtoupper($value);


    }
/*
    public function setStatusAttribute($vall){

        return  $vall == 1 ? '0' : '1';

    }
*/
}


