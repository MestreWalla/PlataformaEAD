@extends('layouts.app')

@section('content')
    <!-- Avisos de sucesso ou erro -->
    @include('components.avisos')

    <div class="container mt-4">
        <!-- Botões de navegação -->
        <div class="mb-4">
            @if (Auth::check())
                @if (Auth::user()->user_type === 'professor')
                    <a href="{{ route('cursos.index') }}" class="btn btn-primary">
                        <i class="bi bi-arrow-left-circle"></i> Voltar para Cursos
                    </a>
                @else
                    <a href="{{ route('cursos.cursos') }}" class="btn btn-primary">
                        <i class="bi bi-arrow-left-circle"></i> Voltar para Cursos
                    </a>
                @endif
            @else
                <a href="{{ route('cursos.cursos') }}" class="btn btn-primary">
                    <i class="bi bi-arrow-left-circle"></i> Voltar para Cursos
                </a>
            @endif
        </div>

        <!-- Detalhes do Curso -->
        <div class="card mb-3">
            <div class="card-header">
                <h2>{{ $course->title }}</h2>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <strong>Descrição:</strong>
                    <p>{{ $course->description }}</p>
                </div>

                @if ($course->user)
                    <div class="mb-3">
                        <strong>Professor:</strong>
                        <p>{{ $course->user->name }}</p>
                    </div>
                @endif

                @if ($course->start_date && $course->end_date)
                    <div class="mb-3">
                        <strong>Data de Início:</strong>
                        <p>{{ $course->start_date->format('d/m/Y') }}</p>
                    </div>
                    <div class="mb-3">
                        <strong>Data de Término:</strong>
                        <p>{{ $course->end_date->format('d/m/Y') }}</p>
                    </div>
                @endif

                <div class="mb-3">
                    <strong>Preço:</strong>
                    <p class="h4">R$ {{ number_format($course->price, 2, ',', '.') }}</p>
                </div>

                @if ($course->img_path)
                    <div class="mb-3">
                        <strong>Imagem do Curso:</strong>
                        <img src="{{ asset('storage/' . $course->img_path) }}" alt="Imagem do Curso" class="img-fluid">
                    </div>
                @endif

                @if (Auth::check())
                    @if (Auth::user()->user_type === 'professor')
                        <a href="{{ route('cursos.index') }}" class="btn btn-primary">
                            <i class="bi bi-pencil-fill"></i> Editar Curso
                        </a>
                    @else
                        <a href="{{ route('cursos.cursos') }}" class="btn btn-primary">
                            <i class="bi bi-ui-radios"></i> Fazer Inscrição
                        </a>
                    @endif
                @else
                    <a href="{{ route('users.login') }}" class="btn btn-primary">
                        <i class="bi bi-ui-radios"></i> Fazer Inscrição
                    </a>
                @endif
            </div>
            <div class="card-footer text-muted"> Curso criado em: 
                {{ $course->created_at->format('d/m/Y H:i') }}
            </div>
        </div>
    </div>
@endsection
