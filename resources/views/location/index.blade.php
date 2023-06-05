@extends('layouts.app')
@section('content')
    <form action="{{ route('location.index') }}" method="GET" class="border border-2 p-4">
        <div class="mb-3">
            <label class="form-label">date</label>
            <input type="date" class="form-control" name="date">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <table class="table hover shadow mt-3">
        <thead>
            <tr class="table-primary">
                <th scope="col">titre</th>
                <th scope="col">adress</th>
                <th scope="col">prixlocation</th>
                <th scope="col">typebimmo</th>
                <th scope="col">disponible</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($locations as $location)
                <tr>
                    <th scope="row">{{ $location->titre }}</th>
                    <td>{{ $location->adress }}</td>
                    <td>{{ $location->prixlocation }}</td>
                    <td>{{ $location->typeb_immo->libelle }}</td>
                    <td>{{ $location->disponible ? 'oui' : 'non' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
