<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned()->references('id')->on('users');
            $table->integer('phone_id')->unsigned()->references('phone')->on('users');
            $table->integer('hotel_id')->unsigned()->references('id')->on('hotel');
            $table->float('price')->unsigned()->references('price')->on('hotel')->nullable();
            $table->string('status')->default('pending');
            $table->integer('rooms');
            $table->integer('adults');
            $table->integer('children');
            $table->date('checkin');
            $table->date('checkout');
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
