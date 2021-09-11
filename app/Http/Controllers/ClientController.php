<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index() {
        $clients = Client::paginate(10);
        return view('klienci.index')->with(['clients' => $clients]);
    }

    public function showSearch(Request $request)
    {
        $surname = $request->surname;
        $clients = Client::where('nazwisko', 'LIKE', "%$surname%")->orderBy('id', 'desc')->get();

        return view('klienci.search')->with(['clients' => $clients]);
    }


    public function details() {
        $client = Client::where('id', $id)->first();
        return view('klienci.details')->with(['client' => $client]);
    }

    public function edit($id)
    {
        $client = Client::where('id', $id)->first();
        return view('klienci.edit')->with(['client' => $client]);
    }

    public function update(Request $request, $id) {
        $client = Client::where('id', $id)->first();
        $client->imie = $request->imie;
        $client->nazwisko = $request->nazwisko;
        $client->ulica = $request->ulica;
        $client->miasto = $request->miasto;
        $client->kod_pocztowy = $request->kod_pocztowy;
        $client->telefon = $request->telefon;
        $client->email = $request->email;
        $client->save();
        return redirect()->route('klienci.index');
    }

    public function destroy($id)
    {
        $client = Client::where('id', $id);
        $client->delete();
        return redirect()->back();
    }

    public function create()
    {
        return view('klienci.create');
    }

    public function store(Request $request) {

        $client = new Client;
        $client->imie = $request->imie;
        $client->nazwisko = $request->nazwisko;
        $client->ulica = $request->ulica;
        $client->miasto = $request->miasto;
        $client->kod_pocztowy = $request->kod_pocztowy;
        $client->telefon = $request->telefon;
        $client->email = $request->email;
        $client->save();

        return redirect()->route('klienci.index');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
