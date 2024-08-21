@extends('layouts.app')

@section('content')
    <div class="container-sm my-4">
        <h1 class="mb-4">Registrar-se</h1>
        <form method="POST" action="{{ route('users.register') }}">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email"
                            class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password">Senha</label>
                        <input type="password" name="password" id="password"
                            class="form-control @error('password') is-invalid @enderror" required>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password_confirmation">Confirme a Senha</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="form-control @error('password_confirmation') is-invalid @enderror" required>
                        @error('password_confirmation')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group mt-3">
                <label for="phone">Telefone</label>
                <input type="tel" name="phone" id="phone"
                    class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" required>
                @error('phone')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label for="address">Endereço</label>
                <input type="text" name="address" id="address"
                    class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" required>
                @error('address')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- <div class="form-group mt-3">
                <label for="role">Função</label>
                <select class="form-control @error('role') is-invalid @enderror" id="role" name="role" required>
                    <option value="" disabled selected>Selecione a Função</option>
                    <option value="1">Aluno</option>
                    <option value="2">Professor</option>
                </select>
                @error('role')
                    <div class="alert alert-danger invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div> --}}

            <button type="submit" class="btn btn-primary mt-4">Registrar-se</button>
            @csrf
            <a href="/login" class="btn btn-success mt-4">Login</a>
        </form>
    </div>
@endsection
