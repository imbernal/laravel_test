<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
public function up()
    {
        Schema::create('rates', function (Blueprint $table) {
            $table->increments('id');

            $table->decimal("regular_price");
            $table->decimal("taxes");
            $table->decimal("fees");
            $table->text('promo');
            $table->text('condition_offer');
            $table->text('policy');
            $table->date('date_start');
            $table->date('date_end');
            $table->integer('room_id')->unsigned();

            $table->foreign('room_id')->references('id')->on('rooms')->onDelete("cascade");

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
        Schema::dropIfExists('rates');
    }
}
