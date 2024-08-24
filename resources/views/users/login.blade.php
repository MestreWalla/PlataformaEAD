@extends('layouts.app')

@section('content')
    <div class="container-sm my-4">
        <h1 class="mb-4">Login</h1>

        @include('components.avisos')

        <form method="POST" action="{{ route('users.login') }}">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mt-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" required autofocus>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mt-3">
                        <label for="password">Senha</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary mt-3">Login</button>
                    <a href="{{ route('users.register') }}" class="btn btn-success mt-3">Registrar</a>
                </div>
            </div>
        </form>
    </div>
@endsection
