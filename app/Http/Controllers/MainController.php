<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel;
use App\Room;
use App\Rate;
use App\Reservation;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;


class MainController extends Controller
{
    public function index(){

        $hotels = Hotel::all();

        return view('hotels.index' , ['hotels'=>$hotels]);
    }

    public function search(Request $request){
 		
 		$search = $request->query('search');

 		$hotels = Hotel::where('address','like','%'. $search.'%')->get();
       
        return view('hotels.index' , ['hotels'=>$hotels]);
    }

    public function search_by_date(Request $request){
        
        $dates = $request->query('daterange');
        $aux = explode(' ' , $dates);


        $aux = DB::table('hotels')
        ->Join("rooms" , 'hotels.id' , '=' , 'rooms.hotel_id')
        ->Join("rates" , 'rooms.id' , '=' , 'rates.room_id')
        ->where("rates.date_start" , '>=' , $aux[0])
        ->where("rates.date_end" , "<=" , $aux[2])
        ->select('hotels.id')
        ->get();

        

        $hotels = $aux->map(function($item){
            return Hotel::findOrFail($item->id);
        });


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
