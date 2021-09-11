@extends('layouts.app')

@section('content')
<div class="container">
<h1 class="text-center offset-1">Dodawanie klienta</h1>
<form class="col-12 col-lg-12" enctype="multipart/form-data"
    action="{{ route('klienci.update', [$client->id]) }}" method="post" accept-charset="utf-8">
    @csrf
    @method('PATCH')
    <div class="form-group col-12">
        <label for="imie" class="col-form-label">Imię:</label>
        <div>
            <input id="imie" type="text" class="form-control sqinput" name="imie" value="{{ $client->imie }}" required
                autofocus>
            @if ($errors->has('imie'))
            <span class="help-block">
                <strong>{{ $errors->first('imie') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="form-group col-12">
        <label for="nazwisko" class="col-form-label">Nazwisko:</label>
        <div>
            <input id="nazwisko" type="text" class="form-control sqinput" name="nazwisko" value="{{ $client->nazwisko }}" required
                autofocus>
            @if ($errors->has('nazwisko'))
            <span class="help-block">
                <strong>{{ $errors->first('nazwisko') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="form-group col-12">
        <label for="ulica" class="col-form-label">Ulica:</label>
        <div>
            <input id="ulica" type="text" class="form-control sqinput" name="ulica" value="{{ $client->ulica }}" required
                autofocus>
            @if ($errors->has('ulica'))
            <span class="help-block">
                <strong>{{ $errors->first('ulica') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="form-group col-12">
        <label for="miasto" class="col-form-label">Miasto:</label>
        <div>
            <input id="miasto" type="text" class="form-control sqinput" name="miasto" value="{{ $client->miasto }}" required
                autofocus>
            @if ($errors->has('miasto'))
            <span class="help-block">
                <strong>{{ $errors->first('miasto') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="form-group col-12">
        <label for="kod_pocztowy" class="col-form-label">Kod pocztowy:</label>
        <div>
            <input id="kod_pocztowy" type="text" class="form-control sqinput" name="kod_pocztowy" value="{{ $client->kod_pocztowy }}" required
                autofocus>
            @if ($errors->has('kod_pocztowy'))
            <span class="help-block">
                <strong>{{ $errors->first('kod_pocztowy') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="form-group col-12">
        <label for="telefon" class="col-form-label">Telefon:</label>
        <div>
            <input id="telefon" type="text" class="form-control sqinput" name="telefon" value="{{ $client->telefon }}" required
                autofocus>
            @if ($errors->has('telefon'))
            <span class="help-block">
                <strong>{{ $errors->first('telefon') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="form-group col-12">
        <label for="email" class="col-form-label">Email:</label>
        <div>
            <input id="email" type="text" class="form-control sqinput" name="email" value="{{ $client->email }}" required
                autofocus>
            @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="form-group col-12">
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">Zapisz</button>
        </div>
    </div>
</form>
@endsection
