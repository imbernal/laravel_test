<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $table = "rates";
    protected $fillable = [ 'regular_price', 'taxes' , 'fees' , 'promo' , 'condition_offer' ,'policy' ,'date_start' , 'date_end' , 'room_id'];


    public function room(){
        return $this->belongsTo('App\Room');
    }

}
