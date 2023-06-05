@extends('layouts.app')
@section('content')
    <h1 class="mb-5">Connexion</h1>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $err)
                <li class="text-danger">{{ $err }}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{ route('connexion.login') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">email</label>
            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">password</label>
            <input type="password" class="form-control" name="password" value="{{ old('password') }}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
