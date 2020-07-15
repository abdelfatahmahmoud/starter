<?php

namespace App\Http\Controllers;

use App\models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NameController extends Controller
{


    /*
        public function setstamp(){

            return Offer::get();
        }

        public function row(){

            Offer::create([

                'name' => 'labtop',
                'price' => '2000',
                'detials' => 'new offer',

            ]);
        }

    */
    public function open()
    {

        return view('create.open');
    }

    public function store(request $request)
    {


        //validation rule to form

        $error = $this->geterror();

        $msg = $this->getmsg();

        $validator = Validator::make($request->all(), $error, $msg);

        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInputs($request->all());
        }


        //insert to data
        Offer::create([

            'name' => $request->name,
            'price' => $request->price,
            'detials' => $request->detials,
        ]);

        return redirect()->back()->with(['success' => 'تم الاضافه بنجاح']);

    }


//this massege errors

    protected function getmsg()
    {

        return $msg = [
            'name.required' =>       __('ar.Offer name is required'),
            'name.max:100' =>        __('ar.Offer max lenght 100 charcter'),
            'name.unique' =>         __('ar.Offer your name must be unique'),
            'price.numeric' =>       __('ar.Offer the price must be number'),
            'price.required' =>      __('ar.Offer the field is empty'),
            'detials.required' =>    __('ar.Offer detials is required'),

        ];
    }

    protected function geterror()
    {

        return $error = [

            'name' => 'required|max:100|unique:Offers,name',
            'price' => 'required|numeric',
            'detials' => 'required',
        ];

    }

}
