<?php

use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(App\Hotel::class, function (Faker $faker) {
    return [
    	'name' => $faker->name(),
    	'category' => $faker->numberBetween(1, 5), 
    	'image' => $faker->imageUrl(), 
    	'address' => $faker->address()
    ];
});

$factory->define(App\Room::class, function (Faker $faker) {
	return [
		'name' => $faker->name(),
		'status' => $faker->realText(10),
		'num_persons' => $faker->numberBetween(1,6), 
		'full' => $faker->boolean(), 
		'king' => $faker->boolean(), 
		'twin' => $faker->boolean(), 
		'daybed' => $faker->boolean()
	];
});


$factory->define(App\Rate::class, function (Faker $faker) {

    $year = rand(2009, 2018);
    $month = rand(1, 12);
    $day = rand(1, 28);

    $date = Carbon::create($year,$month ,$day , 0, 0, 0);

    return [
        'regular_price' => $faker->numberBetween(50, 400),
        'taxes' => $faker->numberBetween(1, 30),
        'fees' => $faker->numberBetween(0, 30),
        'promo' => $faker->realText(30),
        'condition_offer' => $faker->realText(30),
        'policy' => $faker->realText(30),
        'date_start'  => $date->format('Y-m-d'),
        'date_end'  => $date->addWeeks(rand(1, 52))->format('Y-m-d'),
    ];
});

