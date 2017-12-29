<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel;
use App\Room;
use App\Reservation;

class MainController extends Controller
{
    public function index(){

        $hotels = Hotel::all();
       
        return view('hotels.index' , ['hotels'=>$hotels]);
    }

    public function search(Request $request){
 		
 		$name = $request->query('name');

 		$hotels = Hotel::where('name','like','%'. $name .'%')->get();
       
        return view('hotels.index' , ['hotels'=>$hotels]);    
    }

    public function payment(Request $request){

    	$reservation = new Reservation;

    	$reservation->firstname = $request->get('firstName');
    	$reservation->secondname = $request->get('secondName');
    	$reservation->email = $request->get('email');
    	$reservation->amount = $request->get('price');
    	$reservation->fees = $request->get('fees');
    	$reservation->taxes = $request->get('taxes');
    	$reservation->creditnumber = $request->get('cardNumber');
    	$reservation->expirationDate = $request->get('cardExpiry');
    	$reservation->cvCode = $request->get('cardCVC');
    	$reservation->hotel_id = $request->get('hotel');

    	$reservation->save();
 		
       
       
       	return view('hotels.confirmation');
    }


}
