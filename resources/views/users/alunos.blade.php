@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            @if ($message = Session::get('error'))
                <div class="alert alert-warning">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <!-- Menu de Navegação Lateral -->
            @include('parts.sidebar')

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="mt-4 mb-4 card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>{{ __('Cursos Cadastrados') }}</span>
                        <a class="btn btn-primary" href="/register">Adicionar novo Aluno</a>
                    </div>
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
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </main>
        </div>
    </div>
@endsection
