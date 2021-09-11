@extends('layouts.app')

@section('content')
<h1 class="text-center">Samochody</h1>
<a class="btn btn-success m-2" href="{{ route('samochody.create') }}">Dodaj</a>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>ID pojazdu</th>
                <th>Marka</th>
                <th>Model</th>
                <th>Rok produkcji</th>
                <th>Przebieg</th>
                <th>Kolor</th>
                <th>Zdjęcie</th>
                <th>Data pierwszej rejestracji</th>
                <th>Skrzynia biegów</th>
                <th>Rodzaj paliwa</th>
                <th>Nowy</th>
                <th>Cena</th>
                <th>Edytuj</th>
                <th style="text-align:center">Usuń</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cars as $car)
            <tr>
                <td>
                    <p>{{$car->numer_VIN}}</p>
                </td>
                <td>
                    <p>{{$car->marka}}</p>
                </td>
                <td>
                    <p>{{$car->model}}</p>
                </td>
                <td>
                    <p>{{$car->rok_produkcji}}</p>
                </td>
                <td>
                    <p>{{$car->przebieg}}</p>
                </td>
                <td>
                    <p>{{$car->kolor}}</p>
                </td>
                <td>
                    <img src="/cars/{{$car->zdjecie}}" style="width:100px; height:100px;">
                </td>
                <td>
                    <p>{{$car->data_pierwszej_rejestracji}}</p>
                </td>
                <td>
                    <p>{{$car->skrzynia_biegow}}</p>
                </td>
                <td>
                    <p>{{$car->rodzaj_paliwa}}</p>
                </td>
                <td>
                    <p>{!! $car->czy_nowy ? 'TAK' : 'NIE' !!}</p>
                </td>
                <td>
                    <p>{{$car->cena . ' ' . 'zł'}}</p>
                </td>
                <td><button class="btn btn-warning"><a
                            href="{{ route('samochody.edit', [$car->id]) }}" style="color: black !important;">Edytuj</a></button></td>
                <td>
                    <form action="{{ route('samochody.destroy', [$car->id]) }}" method="post"
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
    {{ $cars->links() }}
</div>
@endsection