<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequset;
use App\models\Offer;
use App\triats\Offers;
use Illuminate\Http\Request;

class Ajaxcontroller extends Controller
{
    use Offers;

    public function some(){

        return view('ajaxviewer.ajaxcreate');

    }

    public function stores(OfferRequset $request){

     $file_name = $this->saveimg($request -> photo , 'images/offers');

        //insert offer in  database
            $offers   =    Offer::create([
            'photo' => $file_name ,
            'name' => $request->name,
            'price' => $request->price,
            'detials' => $request->detials,
        ]);

        if($offers)

            return response() -> json([

                'status' => true,
                'msg' => 'تم الحفظ بنجاح',


            ]);
        else
            return response() -> json([

                'status' => false,
                'msg' => 'فشل الحفظ',


            ]);

    }

    public function all(){

         $offers =   Offer::select('id','photo','name','price','detials') ->get();

        return view('create.allajax', compact('offers'));
    }

    public function deletes(Request $request){

        $offers = Offer::find($request -> id); //this condition
        if (!$offers)

            return redirect()->back()->with(['error' => __('ar.Offer not exist')]);


        $offers -> delete();



            return response() -> json([

                'status' => true,
                'msg' => 'تم الحذف بنجاح',
                'id' => $request -> id


            ]);
    }

    //edite

    public function edited(Request $request){


        $offer =   Offer::find($request -> offer_id);

        if(!$offer)
        return response() -> json([

            'status' => false,
            'msg' => 'هذا العرض غير موجود  ',


        ]);

        $offer = Offer:: select('name' ,'photo','price', 'detials','id')->find($request -> offer_id);

        return view('create.edit', compact('offer'));



    }

    public function updates(Request $request){


        $offer = Offer::find($request -> offer_id);
        if (! $offer)

            return response() -> json([

                'status' => false,
                'msg' => 'هذا العرض غير موجود  ',

            ]);

        //update date

        $offer -> update($request -> all());

        return response() -> json([

            'status' => true,
            'msg' => 'تم التحديث بنجاح',

        ]);

    }

    public function login(){

        return view('auth.login');
    }

}
