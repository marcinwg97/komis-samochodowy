@extends('layouts.app')

@section('content')
<h1 class="text-center">Rezerwacje</h1>
<a class="btn btn-success m-2" href="{{ route('sprzedaz.create') }}">Dodaj</a>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Numer sprzedaży</th>
                <th>Identyfikator pojazdu</th>
                <th>Imię i nazwisko klienta</th>
                <th>Data</th>
                <th>Cena</th>
                <th>Pobierz fakturę</th>
            </tr>
        </thead>
        <tbody>
            @foreach($car_sales as $car_sale)
            <tr>
                <td>
                    <p>{{$car_sale->nr_sprzedazy}}</p>
                </td>
                <td>
                    <p>{{$car_sale->car_car_sale->numer_VIN}}</p>
                </td>
                <td>
                    <p>{{$car_sale->client_car_sale->imie . ' ' . $car_sale->client_car_sale->nazwisko}}</p>
                </td>
                <td>{{$car_sale->data_sprzedazy}}</td>
                <td>{{$car_sale->cena . ' ' . 'zł'}}</td>
                <td><button class="btn btn-primary"><a
                            href="{{ route('sprzedaz.faktura.pdf', [$car_sale->id]) }}" style="color: black !important;">Wygeneruj fakturę</a></button></td>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $car_sales->links() }}
</div>
@endsection