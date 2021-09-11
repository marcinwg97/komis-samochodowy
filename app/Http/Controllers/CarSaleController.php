<?php

namespace App\Http\Controllers;

use App\CarSale;
use Illuminate\Http\Request;
use App\Car;
use App\Client;
use Illuminate\Support\Str;

class CarSaleController extends Controller
{
    public function index() {
        $car_sales = CarSale::paginate(10);
        return view('sprzedaz.index')->with(['car_sales' => $car_sales]);
    }

    public function details() {
        $car_sale = CarSale::where('id', $id)->first();
        return view('sprzedaz.details')->with(['car_sale' => $car_sale]);
    }

    public function create()
    {
        $items = array();
        $car_sales = CarSale::all();
        foreach($car_sales as $car_sale) {
            $items[] = $car_sale->samochod_id;
        }
        $cars = Car::whereNotIn('id', $items)->get();
        $clients = Client::all();
        return view('sprzedaz.create')->with(['cars' => $cars, 'clients' => $clients]);
    }

    public function store(Request $request) {

        $car_sale = new CarSale;
        $car_sale->klient_id = $request->klient;
        $car_sale->samochod_id = $request->samochod;
        $car_sale->data_sprzedazy = $request->data_sprzedazy;
        $car_sale->cena = $request->cena;
        $car_sale->nr_sprzedazy = rand(100000,999999);
        $car_sale->save();

        return redirect()->route('sprzedaz.index');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
