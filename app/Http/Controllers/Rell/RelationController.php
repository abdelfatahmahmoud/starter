<?php

namespace App\Http\Controllers\Rell;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RelationController extends Controller
{

public function rell(){

$user =\App\User::with('phone')->find(4);

return response()-> json($user);

}

}
