<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKlienciTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('klienci', function (Blueprint $table) {
            $table->increments('id');
            $table->text('imie');
            $table->text('nazwisko');
            $table->text('ulica');
            $table->text('miasto');
            $table->text('kod_pocztowy');
            $table->text('telefon');
            $table->text('email');
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
        Schema::dropIfExists('klienci');
    }
}
