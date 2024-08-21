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
                    <h1>Lista de Professores</h1>
                    @foreach ($teachers as $teacher)
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $teacher->name }}</h5>
                                    <p class="card-text"><strong>Email:</strong> {{ $teacher->email }}</p>
                                    <p class="card-text"><strong>Telefone:</strong> {{ $teacher->phone }}</p>
                                    <p class="card-text"><strong>address:</strong> {{ $teacher->address }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </main>
        </div>
    </div>
@endsection
