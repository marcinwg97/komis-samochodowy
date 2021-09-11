<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSprzedazTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sprzedaz', function (Blueprint $table) {
            $table->increments('id');
            $table->text('nr_sprzedazy');
            $table->integer('samochod_id')->unsigned()->nullable();
            $table->integer('klient_id')->unsigned()->nullable();
            $table->date('data_sprzedazy');
            $table->text('cena');
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
        Schema::dropIfExists('sprzedaz');
    }
}
