<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaisonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maisons', function (Blueprint $table) {
            $table->id();
            $table->integer('ville_id')->unsigned()->references('id')->on('ville');
            $table->integer('user_id')->unsigned()->references('id')->on('users');
            $table->integer('nombre_de_chambre');
            $table->string('surface');
            $table->string('prix');
            $table->integer('chauffage');
            $table->integer('climatisation');
            $table->text('content');
            $table->string('image');
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
        Schema::dropIfExists('maisons');
    }
}
