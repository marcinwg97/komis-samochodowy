<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'klienci';

    public function client_reservation() {
        return $this->belongsTo('App\Reservation', 'klient_id');
    }

    public function client_car_sale() {
        return $this->belongsTo('App\CarSale', 'klient_id');
    }
}
