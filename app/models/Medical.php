<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Medical extends Model
{
    protected $table = "medicals";
    protected $fillable =['pdf', 'pationt_id'];

    public $timestamps = false;
}
