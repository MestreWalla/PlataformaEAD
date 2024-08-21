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
                <div class="row mt-3 mb-3">
                    <h1>Lista de Alunos</h1>
                    @foreach ($alunos as $aluno)
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <div class="card-body">
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
