<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $table = "Offers";
    protected $fillable =['id','photo','name', 'price', 'detials','created_at', 'updated_at'];

    protected $hidden =['created_at', 'updated_at', ];

   // public $timestamps = false;
}
