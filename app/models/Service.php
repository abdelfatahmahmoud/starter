<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';
    protected $fillable =['name', 'create_at', 'update_at'];

    protected $hidden =['create_at', 'update_at','pivot' ];

    public $timestamps = true;



    public function doctor(){

        return $this ->belongsToMany('App\models\Doctor','doctor_services','services_id','doctor_id','id','id');
    }

}
