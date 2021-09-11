<?php

namespace App\Http\Controllers;

use App\Reservation;
use Illuminate\Http\Request;
use App\Client;
use App\Car;

class ReservationController extends Controller
{
    public function index() {
        $reservations = Reservation::paginate(10);
        return view('rezerwacje.index')->with(['reservations' => $reservations]);
    }

    public function destroy($id)
    {
        $reservation = Reservation::where('id', $id);
        $reservation->delete();
        return redirect()->back();
    }

    public function create()
    {
        $items = array();
        $reservations = Reservation::all();
        foreach($reservations as $reservation) {
            $items[] = $reservation->samochod_id;
        }
        $cars = Car::whereNotIn('id', $items)->get();
        $clients = Client::all();
        return view('rezerwacje.create')->with(['clients' => $clients, 'cars' => $cars]);
    }

    public function store(Request $request) {

        $client = new Reservation;
        $client->klient_id = $request->klient;
        $client->samochod_id = $request->samochod;
        $client->save();

        return redirect()->route('rezerwacje.index');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
