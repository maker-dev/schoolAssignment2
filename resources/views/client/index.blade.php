@extends('layouts.app')

@section('content')
    <div class="text-end mb-3 d-flex justify-content-between">
        <a href="{{ route('location.index') }}" class="btn btn-info">Locations</a>
        <a href="{{ route('client.create') }}" class="btn btn-primary">Create</a>
    </div>
    <table class="table hover shadow">
        <thead>
            <tr class="table-primary">
                <th scope="col">cin</th>
                <th scope="col">FirstName</th>
                <th scope="col">LastName</th>
                <th scope="col">email</th>
                <th scope="col">actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clients as $client)
                <tr>
                    <th scope="row">{{ $client->cin }}</th>
                    <td>{{ $client->firstname }}</td>
                    <td>{{ $client->lastname }}</td>
                    <td>{{ $client->email }}</td>
                    <td>
                        <form action="{{ route('client.destroy', $client->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger">delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-5">
        {{ $clients->links() }}
    </div>
@endsection
