@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $err)
                <li class="text-danger">{{ $err }}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{ route('client.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">cin</label>
            <input type="text" class="form-control" name="cin" value="{{ old('cin') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">firstname</label>
            <input type="text" class="form-control" name="firstname" value="{{ old('firstname') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">lastname</label>
            <input type="text" class="form-control" name="lastname" value="{{ old('lastname') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password" value="{{ old('password') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Confirm password</label>
            <input type="password" class="form-control" name="password_confirmation"
                value="{{ old('password_confirmation') }}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
