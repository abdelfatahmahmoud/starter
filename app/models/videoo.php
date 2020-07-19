<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class videoo extends Model
{
    protected $table = "videes";
    protected $fillable =['name','viewer'];
   public $timestamps = false;
}
