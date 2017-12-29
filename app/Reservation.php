<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = "reservations";
    protected $fillable = ['firstname' ,'secondname' , 'email' , 'amount' , 'fees' , 'taxes' , 'creditnumber' ,'expirationDate' , 'cvCode' , 'hotel_id'];


    public function hotel(){
        return $this->belongsTo('App\Hotel');
    }

}
