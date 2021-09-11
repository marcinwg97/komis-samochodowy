@extends('layouts.app')

@section('content')
<h1 class="text-center">Rezerwacje</h1>
<a class="btn btn-success m-2" href="{{ route('rezerwacje.create') }}">Dodaj</a>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Identyfikator pojazdu</th>
                <th>Imię i nazwisko klienta</th>
                <th style="text-align:center">Usuń</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservations as $reservation)
            <tr>
                <td>
                    <p>{{$reservation->car_reservation->numer_VIN}}</p>
                </td>
                <td>
                    <p>{{$reservation->client_reservation->imie . ' ' . $reservation->client_reservation->nazwisko}}</p>
                </td>
                <td>
                    <form action="{{ route('rezerwacje.destroy', [$reservation->id]) }}" method="post"
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
    {{ $reservations->links() }}
</div>
@endsection