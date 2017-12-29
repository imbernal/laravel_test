<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id');

            $table->string('firstname');
            $table->string('secondname');
            $table->string('email');
            $table->decimal('amount', 8, 2);
            $table->decimal('fees', 8, 2);
            $table->decimal('taxes', 8, 2);
            $table->string('creditnumber');
            $table->string('expirationDate');
            $table->string('cvCode');

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
        Schema::dropIfExists('reservations');
    }
}
