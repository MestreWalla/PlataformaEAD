@extends('layouts.app')

@section('title', 'Editar Perfil')

@section('content')
    <div class="container-fluid">
        <div class="row">

            <!-- Menu de Navegação Lateral -->
            @include('parts.sidebar')

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="row m-3 justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <span>{{ __('Editar Perfil') }}</span>
                            </div>

                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form action="{{ route('users.update', $user->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nome</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ old('name', $user->name) }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{ old('email', $user->email) }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Telefone</label>
                                        <input type="tel" class="form-control" id="phone" name="phone"
                                            value="{{ old('phone', $user->phone) }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="address" class="form-label">Endereço</label>
                                        <input type="text" class="form-control" id="address" name="address"
                                            value="{{ old('address', $user->address) }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="img_path" class="form-label">Imagem de Perfil</label>
                                        <input type="file" class="form-control" id="img_path" name="img_path">
                                        @if ($user->img_path)
                                            <img src="{{ asset('storage/' . $user->img_path) }}" alt="Imagem do Usuário"
                                                style="width: 100px; height: auto;">
                                        @endif
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Nova Senha (opcional)</label>
                                        <input type="password" class="form-control" id="password" name="password">
                                    </div>

                                    <div class="mb-3">
                                        <label for="password_confirmation" class="form-label">Confirme a Nova Senha</label>
                                        <input type="password" class="form-control" id="password_confirmation"
                                            name="password_confirmation">
                                    </div>

                                    <div class="mb-3">
                                        <label for="user_type" class="form-label">Tipo de Usuário</label>
                                        <select class="form-select" id="user_type" name="user_type" required>
                                            <option value="aluno"
                                                {{ old('user_type', $user->user_type) == 'aluno' ? 'selected' : '' }}>Aluno
                                            </option>
                                            <option value="professor"
                                                {{ old('user_type', $user->user_type) == 'professor' ? 'selected' : '' }}>
                                                Professor</option>
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Atualizar Perfil</button>
                                    <a href="{{ route('dashboard') }}" class="btn btn-secondary">Cancelar</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
