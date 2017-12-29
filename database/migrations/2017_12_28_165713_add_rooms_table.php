<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->decimal('price');
            $table->integer('num_persons');
            $table->string('status');
            $table->boolean('full');
            $table->boolean('king');
            $table->boolean('twin');
            $table->boolean('daybed');
            $table->string('promo' , 200);
            $table->string('condition_offer' , 300);
            $table->string('policy' , 300);

            $table->integer('hotel_id')->unsigned();

            $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete("cascade");


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
