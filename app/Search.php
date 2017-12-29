<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    protected $table = "searches";
    protected $fillable = ['date' , 'hotel_id'];

    public function hotel(){
        return $this->belongsTo('App\Hotel');
    }
}
