<?php

namespace App\Http\Controllers;


use App\Http\Requests\OfferRequset;
use App\models\Offer;
use App\triats\Offers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NameController extends Controller
{

    use Offers;

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
    public function store(OfferRequset $request)
    {
        //validation rule to form

        // $error = $this->geterror();

        //$msg = $this->getmsg();

        // $validator = Validator::make($request->all(), $error, $msg);

        //  if ($validator->fails()) {

        //  return redirect()->back()->withErrors($validator)->withInputs($request->all());

    //}
        //saved images

        $file_name = $this->saveimg($request -> photo , 'images/offers');





        //insert to data
        Offer::create([
            'photo' => $file_name ,
            'name' => $request->name,
            'price' => $request->price,
            'detials' => $request->detials,
        ]);
        return redirect()->back()->with(['success' => 'تم الاضافه بنجاح']);

    }
//this massege errors
/*
    protected function getmsg()
    {

        return $msg = [
            'name.required'     =>       __('ar.Offer name is required'),
            'name.max:100'      =>        __('ar.Offer max lenght 100 charcter'),
            'name.unique'       =>         __('ar.Offer your name must be unique'),
            'price.numeric'     =>       __('ar.Offer the price must be number'),
            'price.required'    =>      __('ar.Offer the field is empty'),
            'detials.required'  =>    __('ar.Offer detials is required'),

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

    public function edit(){

        $offers = Offer::select('id','name','price','detials')->get();

        return view('create.edit');
    }
*/

    // all products
    public function getall(){

      $offers =   Offer::select('id','name','price','detials') ->get();

      return view('create.all', compact('offers'));
    }

    //edite

    public function editOffer($offer_id){


          $offer =   Offer:: select('name', 'photo','price', 'detials','id')->find($offer_id);
      //    dd($offer);

          return view('create.edit', compact('offer'));


        return $offer_id;
    }

    //update
    public function updateOffer(OfferRequset $request , $offer_id){

        //validation request

        $offer = Offer::find($offer_id);
        if (! $offer){
            return redirect() -> back();
        }


        //update date

        $offer -> update($request -> all());

    return redirect() ->back() -> with(['success' => 'تم التحديث بنجاح']);

    }

    public function saveimg($photo , $folder){

        $file_extension = $photo->  getClientOriginalExtension();

        $file_name = time(). ".".$file_extension;
        $path = $folder;

        $photo ->  move($path,$file_name);

        return $file_name;
    }

    public function delete($offer_id)
    {

        // check if offer id exist

        $offers = Offer::find($offer_id); //this condition

        if (!$offers)

            return redirect()->back()->with(['error' => __('ar.Offer not exist')]);


            $offers -> delete();


        return redirect()
            ->route('offers.all')
            ->with(['success' => __('ar.Offer deleted success')]);


    }

}
