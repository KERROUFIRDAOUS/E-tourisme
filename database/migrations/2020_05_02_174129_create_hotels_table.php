<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
            {
                Schema::create('hotels', function (Blueprint $table) {
                    $table->id();
                    $table->string('name', 80);
                    $table->integer('ville_id')->unsigned()->references('id')->on('ville')->onDelete("cascade");
                    $table->float('price');
                    $table->text('content');
                    $table->integer('room');
                    $table->integer('stars');
                    $table->integer('created_by')->unsigned()->references('id')->on('users')->onDelete("cascade");                    $table->string('image');
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
        Schema::dropIfExists('hotels');
    }
}
