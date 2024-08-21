@extends('layouts.app')

@section('content')
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

    <div class="container">
        <h1>Titulo: {{ $course->title }}</h1>
        <p><strong>Descrição:</strong> {{ $course->description }}</p>
        {{-- <p><strong>Professor:</strong> {{ $course->user->name }}</p> --}}
        {{-- <p><strong>Data de Início:</strong> {{ $course->start_date->format('d/m/Y') }}</p> --}}
        {{-- <p><strong>Data de Término:</strong> {{ $course->end_date->format('d/m/Y') }}</p> --}}
        <p><strong>Preço:</strong> R$ {{ number_format($course->price, 2, ',', '.') }}</p>
        <a href="{{ route('dashboard') }}" class="btn btn-primary">Voltar para Cursos</a>
        @if (Auth::check())
            @if (Auth::user()->user_type === 'professor')
                <a href="/dashboard" class="btn btn-warning">
                    Editar Curso
                </a>
                <a href="/dashboard" class="btn btn-danger">
                    Apagar Curso
                </a>
            @endif
        @endif
    </div>
@endsection
