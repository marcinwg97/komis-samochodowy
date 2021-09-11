@extends('layouts.app')

@section('content')
<div class="container">
<h1 class="text-center">Dodawanie sprzedaży</h1>
<form class="col-12 col-lg-12" enctype="multipart/form-data" action="{{ route('sprzedaz.store') }}"
    method="post" accept-charset="utf-8">
    @csrf
    <div class="form-group row">
    <div class="form-group col-12">
    <div>
    <label for="klient" class="col-form-label">Klient:</label>
                <select class="form-control sqinput" name="klient">
                    @foreach($clients as $client)
                    <option value="{{$client->id}}">{{$client->id . ' ' . $client->imie . ' ' . $client->nazwisko}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group col-12">
            <label for="samochod" class="col-form-label">Samochód:</label>
            <div>
                <select class="form-control sqinput" name="samochod">
                    @foreach($cars as $car)
                    <option value="{{$car->id}}">{{$car->id . ' ' . $car->marka . ' ' . $car->model}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group col-12">
            <label for="data_sprzedazy" class="col-form-label">Data sprzedaży:</label>
            <div>
                <input id="data_sprzedazy" type="date" class="form-control sqinput" name="data_sprzedazy" value="" required autofocus>
                @if ($errors->has('data_sprzedazy'))
                <span class="help-block">
                    <strong>{{ $errors->first('data_sprzedazy') }}</strong>
                </span>
                @endif
            </div>
        </div>
        <div class="form-group col-12">
            <label for="cena" class="col-form-label">Cena:</label>
            <div>
                <input id="cena" type="number" class="form-control sqinput" name="cena" value="" required autofocus>
                @if ($errors->has('cena'))
                <span class="help-block">
                    <strong>{{ $errors->first('cena') }}</strong>
                </span>
                @endif
            </div>
        </div>
        <div class="form-group col-12">
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Dodaj</button>
            </div>
        </div>
    </div>
</form>
</div>
@endsection
