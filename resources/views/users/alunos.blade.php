@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Avisos de sucesso ou erro -->
            @include('components.avisos')
            <!-- Menu de Navegação Lateral -->
            @include('parts.sidebar')

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="mt-4 mb-4 card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>{{ __('Cursos Cadastrados') }}</span>
                        <a class="btn btn-primary" href="/register">Adicionar novo Aluno</a>
                    </div>
                    <div class="mt-1 row row-cols-1 row-cols-md-3 g-4">
                        @foreach ($alunos as $aluno)
                            <div class="col-md-4 m-2">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <img src="{{ 'https://via.placeholder.com/150' }}" class="card-img-top"
                                            alt="{{ $aluno->name }}">
                                        <h5 class="card-title">{{ $aluno->name }}</h5>
                                        <p class="card-text"><strong>Email:</strong> {{ $aluno->email }}</p>
                                        <p class="card-text"><strong>Telefone:</strong> {{ $aluno->phone }}</p>
                                        <p class="card-text"><strong>address:</strong> {{ $aluno->address }}

                                        <div class="d-flex justify-content-between mt-3">
                                            <a href="{{ route('users.edit', $aluno->id) }}"
                                                class="btn btn-warning btn-sm">Editar</a>

                                            <form action="{{ route('users.destroy', $aluno->id) }}" method="POST"
                                                onsubmit="return confirm('Tem certeza que deseja apagar este aluno?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Apagar</button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
