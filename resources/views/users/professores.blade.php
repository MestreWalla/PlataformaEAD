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
                                    <img src="{{ 'https://via.placeholder.com/150' }}" class="card-img-top"
                                        alt="{{ $teacher->name }}">
                                    <h5 class="card-title">{{ $teacher->name }}</h5>
                                    <p class="card-text"><strong>Email:</strong> {{ $teacher->email }}</p>
                                    <p class="card-text"><strong>Telefone:</strong> {{ $teacher->phone }}</p>
                                    <p class="card-text"><strong>address:</strong> {{ $teacher->address }}

                                    <div class="d-flex justify-content-between mt-3">
                                        <a href="{{ route('users.edit', $teacher->id) }}"
                                            class="btn btn-warning btn-sm">Editar</a>

                                        <form action="{{ route('users.destroy', $teacher->id) }}" method="POST"
                                            onsubmit="return confirm('Tem certeza que deseja apagar este professor?');">
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
            </main>
        </div>
    </div>
@endsection
