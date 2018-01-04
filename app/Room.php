<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Room extends Model
{
    protected $table = "rooms";
    protected $fillable = ['name' , 'num_persons' , 'full' , 'king' , 'twin' , 'daybed' ,'hotel_id'];


    public function hotel(){
        return $this->belongsTo('App\Hotel');
    }

    public function rates(){
        return $this->hasMany('App\Rate')->orderBy('regular_price');
    }


    public function min_price_room($room_id){
        
        $rates = Rate::where('room_id' , $room_id)->get();
        
        $rate_min_price = null;

        $min = 99999999;


        foreach ($rates as  $rate) {

	    	$rate_price_current = Rate::where('room_id' , $room_id)->orderBy('regular_price')->first();

	    	if( ($rate_price_current->date_start <= Carbon::now()) and ($rate_price_current->date_start >= Carbon::now()))
			{
	    		$rate_price_current->Where('date_start' , '<='  , Carbon::now())->Where('date_end' , '>=' , Carbon::now());
	    	}

	        if($min > $rate_price_current->regular_price){
	            $min = $rate_price_current->regular_price;
	            $rate_min_price = $rate_price_current;
	        }
        }

        return $rate_min_price;

    }

    public function results($rate , $taxes , $fees , $total){

    	if($taxes){
    		return $rate->regular_price * ($rate->taxes / 100) + $rate->regular_price;	
    	}elseif($fees){
    		return $rate->regular_price + $rate->regular_fees;	
    	}else{

    		$taxes = $rate->regular_price * ($rate->taxes / 100) + $rate->regular_price;

    		return $rate->regular_price + $rate->regular_fees + $taxes;	
    	}

    	

    }


}
