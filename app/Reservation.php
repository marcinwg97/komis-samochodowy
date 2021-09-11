<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'rezerwacje';

    public function client_reservation() {
        return $this->hasOne('App\Client', 'id', 'klient_id');
    }
    public function car_reservation() {
        return $this->hasOne('App\Car', 'id', 'samochod_id');
    }
}
