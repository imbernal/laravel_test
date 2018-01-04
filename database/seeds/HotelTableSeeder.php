<?php

use Illuminate\Database\Seeder;

class HotelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Hotel::class, 10)->create()->each(function ($hotel){
        	$rooms = factory(App\Room::class, 5)->make();
        	foreach ($rooms as $room) {
        		$hotel->rooms()->save($room);
        	}

        	$rooms->each(function ($room){

        	    $rates = factory(App\Rate::class , 3)->make();

        	    foreach ($rates as $rate){
        	        $room->rates()->save($rate);
                }

            });
        });
    }
}
