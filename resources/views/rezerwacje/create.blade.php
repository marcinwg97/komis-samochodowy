@extends('layouts.app')

@section('content')
<div class="container">
<h1 class="text-center">Dodawanie rezerwacji</h1>
<form class="col-12 col-lg-12" enctype="multipart/form-data" action="{{ route('rezerwacje.store') }}"
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
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Dodaj</button>
            </div>
        </div>
    </div>
</form>
</div>
@endsection
