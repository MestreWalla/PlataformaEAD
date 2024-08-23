@extends('layouts.app')

@section('content')
    @include('components.avisos')
    <div class="container my-5">
        <!-- Seção de Cursos Oferecidos -->
        <section class="my-5">
            <h2 class="text-center mb-5">Nossos Cursos Oferecidos</h2>
            <!-- Lista de Cursos -->
            <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
                @foreach ($cursos as $curso)
                    <div class="col">
                        <div class="card h-100 shadow-sm border-0">
                            <img src="{{ 'https://via.placeholder.com/150' }}" class="card-img-top img-fluid"
                                alt="{{ $curso->title }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $curso->title }}</h5>
                                <p class="card-text text-muted">{{ $curso->description }}</p>
                                <p class="card-text fw-bold">Preço: R$ {{ number_format($curso->price, 2, ',', '.') }}</p>
                            </div>
                            <a href="{{ route('cursos.show', $curso->id) }}"
                                class="btn btn-light btn-block card-footer text-center">
                                Ver Curso <i class="bi bi-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
@endsection
