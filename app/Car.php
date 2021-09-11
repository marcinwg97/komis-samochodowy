<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    public $timestamps = false;
    protected $table = 'samochody';

    public function car_reservation() {
        return $this->belongsTo('App\Reservation', 'klient_id');
    }

    public function car_car_sale() {
        return $this->belongsTo('App\CarSale', 'klient_id');
    }
}
