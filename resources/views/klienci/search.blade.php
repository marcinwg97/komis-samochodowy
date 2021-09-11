@extends('layouts.app')


@section('content')
<h1 class="text-center">Klienci</h1>
    <form enctype="multipart/form-data" action="{{ route('klienci.search') }}" method="post" accept-charset="utf-8">
    @csrf
    <div class="row col-6 offset-2 mx-0 my-2 d-flex flex-nowrap">
            <input name="surname" autocomplete="off" type="text" placeholder="Szukaj po nazwisku"
                class="form-control sqinput" aria-label="Pole wyszukiwarki">
    <div class="text-right mb-2">
        <button type="submit" class="btn btn-success" aria-label="Przycisk szukania"><i
                class="fa fa-search"></i></button>
    </div>
    <div class="col-3">
    <a class="btn btn-success mb-2 offset-12 text-right" href="{{ route('klienci.create') }}">Dodaj</a>
    </div>
    </div>
</form>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Imię</th>
                <th>Nazwisko</th>
                <th>Ulica</th>
                <th>Miasto</th>
                <th>Kod pocztowy</th>
                <th>Telefon</th>
                <th>Email</th>
                <th>Edytuj</th>
                <th style="text-align:center">Usuń</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clients as $client)
            <tr>
                <td>
                    <p>{{$client->imie}}</p>
                </td>
                <td>
                    <p>{{$client->nazwisko}}</p>
                </td>
                <td>
                    <p>{{$client->ulica}}</p>
                </td>
                <td>
                    <p>{{$client->miasto}}</p>
                </td>
                <td>
                    <p>{{$client->kod_pocztowy}}</p>
                </td>
                <td>
                    <p>{{$client->telefon}}</p>
                </td>
                <td>
                    <p>{{$client->email}}</p>
                </td>
                <td><button class="btn btn-warning"><a
                            href="{{ route('klienci.edit', [$client->id]) }}" style="color: black !important;">Edytuj</a></button></td>
                <td>
                    <form action="{{ route('klienci.destroy', [$client->id]) }}" method="post"
                        accept-charset="utf-8">
                        @csrf
                        @method("DELETE")
                        <div class="form-group col-12">
                            <div class="d-flex justify-content-center">
                                <button type="submit" onclick="return confirm('Czy napewno usunąć?')"
                                    class="btn btn-danger">Usuń</button>
                            </div>
                        </div>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection