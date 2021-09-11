<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarSale extends Model
{
    protected $table = 'sprzedaz';

    public function client_car_sale() {
        return $this->hasOne('App\Client', 'id', 'klient_id');
    }

    public function car_car_sale() {
        return $this->hasOne('App\Car', 'id', 'samochod_id');
    }
}
