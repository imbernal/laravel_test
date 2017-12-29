<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = "rooms";
    protected $fillable = ['name' , 'price' , 'num_persons' , 'full' , 'king' , 'twin' , 'daybed' , 'promo' , 'condition_offer' ,'policy' , 'hotel_id'];


    public function hotel(){
        return $this->belongsTo('App\Hotel');
    }

   public function lowPrice(){
   		 return $this->orderBy('price')->first();
   }

}
