<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSamochodyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('samochody', function (Blueprint $table) {
            $table->increments('id');
            $table->text('marka');
            $table->text('model');
            $table->integer('rok_produkcji');
            $table->text('przebieg');
            $table->text('kolor');
            $table->text('zdjecie')->nullable();
            $table->date('data_pierwszej_rejestracji');
            $table->text('skrzynia_biegow');
            $table->text('rodzaj_paliwa');
            $table->text('czy_nowy');
            $table->text('cena');
            $table->text('numer_VIN');

         

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('samochody');
    }
}
