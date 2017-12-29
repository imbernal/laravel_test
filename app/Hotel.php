<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $table = "hotels";
    protected $fillable = ['name' ,'category' , 'image' , 'address'];


    public function reservations(){
        return $this->hasMany('App\Reservation');
    }

    public function rooms(){
        return $this->hasMany('App\Room')->orderBy('price');
    }



    public function searches(){
        return $this->hasMany('App\Search');
    }
}
