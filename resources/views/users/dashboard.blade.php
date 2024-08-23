@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">

            <!-- Avisos de sucesso ou erro -->
            @include('components.avisos')

            <!-- Menu de Navegação Lateral -->
            @include('parts.sidebar')

            <!-- Conteúdo Principal -->
            <main class="col col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h2 class="">Dashboard</h2>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary">Compartilhar</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">Exportar</button>
                        </div>
                    </div>
                </div>

                <h2 class="">Cursos</h2>

                <form method="GET" action="{{ route('dashboard') }}">
                    <div class="input-group mb-3 ">
                        <input type="text" class="form-control" name="search" placeholder="Pesquisar cursos..."
                            value="{{ request('search') }}">
                        <button class="btn btn-outline-secondary" type="submit">Pesquisar</button>
                    </div>
                    <a class="btn btn-primary" href="/courses/create">Cadastrar novo Curso</a>
                </form>

                <!-- Lista de Cursos -->
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 mt-1 g-4 mb-3">
                    @foreach ($cursos as $curso)
                        <div class="col">
                            <div class="card h-100">
                                {{-- <img src="{{ asset('storage/' . $curso->imagem) }}" class="card-img-top" alt="{{ $curso->name }}"> --}}
                                <img src="{{ 'https://via.placeholder.com/150' }}" class="card-img-top"
                                    alt="{{ $curso->title }}">
                                {{-- <img src="assets/img/Curso.jpg" class="rounded card-img-top" alt="{{ $curso->title }}"> --}}
                                <div class="card-body">
                                    <h5 class="card-title">{{ $curso->title }}</h5>
                                    <p class="card-text">{{ $curso->description }}</p>
                                    <p class="card-text">Preço: R$ {{ $curso->price }}</p>
                                </div>
                                <a href="{{ route('cursos.show', $curso->id) }}"
                                    class="fw-medium fs-6 btn btn-light card-footer icon-link icon-link-hover"
                                    style="--bs-link-hover-color-rgb: 25, 135, 84;">
                                    Ver Curso
                                    <i class="bi bi-arrow-right "></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Estatísticas de Vendas -->
                <h4>Estatísticas de Vendas</h4>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card text-white bg-primary mb-3">
                            <div class="card-header">Vendas Hoje</div>
                            <div class="card-body">
                                <h5 class="card-title">R$ 2,000</h5>
                                <p class="card-text">Total de vendas realizadas hoje.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-white bg-success mb-3">
                            <div class="card-header">Vendas Esta Semana</div>
                            <div class="card-body">
                                <h5 class="card-title">R$ 15,000</h5>
                                <p class="card-text">Total de vendas realizadas nesta semana.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-white bg-danger mb-3">
                            <div class="card-header">Vendas Este Mês</div>
                            <div class="card-body">
                                <h5 class="card-title">R$ 60,000</h5>
                                <p class="card-text">Total de vendas realizadas neste mês.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
