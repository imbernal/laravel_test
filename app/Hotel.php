<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Hotel extends Model
{
    protected $table = "hotels";
    protected $fillable = ['name' ,'category' , 'image' , 'address'];


    public function reservations(){
        return $this->hasMany('App\Reservation');
    }

    public function rooms(){
        return $this->hasMany('App\Room');
    }

    public function room_by_id($hotel_id){
        $rooms = Room::where('hotel_id' , $hotel_id)->get();
        
        $min = 99999999;

        foreach ($rooms as  $room) {

            $rates = Rate::where('room_id' , $room->id)->get();

            foreach ($rates as  $rate) {


                    $rate_price = Rate::where('room_id' , $room->id)->min('regular_price');
                    if($min > $rate_price){
                        $min = $rate_price;
                    }  
        }

                
        }


        return $min;

    }


    public function searches(){
        return $this->hasMany('App\Search');
    }
}
