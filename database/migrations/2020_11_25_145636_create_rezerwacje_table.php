<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRezerwacjeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rezerwacje', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('samochod_id')->unsigned()->nullable();
            $table->integer('klient_id')->unsigned()->nullable();
            $table->timestamps();

          
            $table->foreign('samochod_id')->references('id')->on('samochody')->onDelete('cascade');
            $table->foreign('klient_id')->references('id')->on('klienci')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rezerwacje');
    }
}
