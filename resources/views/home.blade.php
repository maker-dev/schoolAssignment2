@extends('layouts.app')
@section('content')
    <h1>Welcome <span class="text-success">{{ auth()->user()->firstname }}</span></h1>
    @if (!auth()->user()->admin)
        <table class="table hover shadow mt-3">
            <thead>
                <tr class="table-primary">
                    <th scope="col">titre</th>
                    <th scope="col">adress</th>
                    <th scope="col">prixlocation</th>
                    <th scope="col">typebimmo</th>
                    <th scope="col">disponible</th>
                    <th scope="col">date debut</th>
                    <th scope="col">date fin</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($userlocations as $userlocation)
                    <tr>
                        <th scope="row">{{ $userlocation->titre }}</th>
                        <td>{{ $userlocation->adress }}</td>
                        <td>{{ $userlocation->prixlocation }}</td>
                        <td>{{ $userlocation->typeb_immo->libelle }}</td>
                        <td>{{ $userlocation->disponible ? 'oui' : 'non' }}</td>
                        <td>{{ $userlocation->pivot->date_debut }}</td>
                        <td>{{ $userlocation->pivot->date_fin }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
