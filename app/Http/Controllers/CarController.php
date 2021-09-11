<?php

namespace App\Http\Controllers;

use App\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index() {
        $cars = Car::paginate(10);
        return view('samochody.index')->with(['cars' => $cars]);
    }

    public function showSearch(Request $request)
    {
        $marka = $request->marka;
        $model = $request->model;

        if ($marka != NULL) {
            $car = Car::where(function ($query) use ($marka) {
                $query
                    ->where('marka', 'LIKE', "%$marka%");
            })
                ->orderBy('id', 'desc')->get();
        } else if ($model != NULL) {
            $car = Car::where(function ($query) use ($model) {
                $query
                ->where('model', 'LIKE', "%$model%");
            })
                ->orderBy('id', 'desc')->get();
        } else if ($model != NULL && $marka != NULL) {
            $car = Car::where(function ($query) use ($model, $marka) {
                $query
                ->where('marka', 'LIKE', "%$marka%")
                ->where('model', 'LIKE', "%$model%");
            })
                ->orderBy('id', 'desc')->get();
        } else {
            $car = Car::orderBy('id', 'desc')->get();
        }

        return view('samochody.search')->with(['car' => $car]);
    }


    public function details() {
        $car = Car::where('id', $id)->first();
        return view('samochody.details')->with(['car' => $car]);
    }

    public function edit($id)
    {
        $car = Car::where('id', $id)->first();
        return view('samochody.edit')->with(['car' => $car]);
    }

    public function update(Request $request, $id) {
        $car = Car::where('id', $id)->first();
        $car->marka = $request->marka;
        $car->model = $request->model;
        $car->rok_produkcji = $request->rok_produkcji;
        $car->przebieg = $request->przebieg;
        $car->kolor = $request->kolor;
        $car->data_pierwszej_rejestracji = $request->data_pierwszej_rejestracji;
        $car->skrzynia_biegow = $request->skrzynia_biegow;
        $car->rodzaj_paliwa = $request->rodzaj_paliwa;
        $car->czy_nowy = $request->czy_nowy === "on" ? true : false;
        $car->cena = $request->cena;
        $car->numer_VIN = $request->numer_VIN;
        $car->save();
        return redirect()->route('samochody.index');
    }

    public function destroy($id)
    {
        $car = Car::where('id', $id);
        $car->delete();
        return redirect()->back();
    }

    public function create()
    {
        return view('samochody.create');
    }

    public function store(Request $request) {
        $car = new Car;
        $car->marka = $request->marka;
        $car->model = $request->model;
        $car->rok_produkcji = $request->rok_produkcji;
        $car->przebieg = $request->przebieg;
        if ($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename . '.' . $extension;
            $path = $request->file('image')->storeAs('cars', $fileNameToStore);
        } else {
            $fileNameToStore = '';
        }
        $car->zdjecie = $fileNameToStore;
        $car->kolor = $request->kolor;
        $car->data_pierwszej_rejestracji = $request->data_pierwszej_rejestracji;
        $car->skrzynia_biegow = $request->skrzynia_biegow;
        $car->rodzaj_paliwa = $request->rodzaj_paliwa;
        $car->czy_nowy = $request->czy_nowy === "on" ? true : false;
        $car->cena = $request->cena;
        $car->numer_VIN = $request->numer_VIN;
        $car->save();

        return redirect()->route('samochody.index');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
