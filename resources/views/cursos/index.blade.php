<!-- resources/views/course/index.blade.php -->

@extends('layouts.app')

@section('title', 'Cursos Cadastrados')

@section('content')
    <div class="container-fluid">
        <div class="row">

            <!-- Menu de Navegação Lateral -->
            @include('parts.sidebar')

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="mt-4 mb-4 card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <span>{{ __('Cursos Cadastrados') }}</span>
                                <form method="GET" action="{{ route('cursos.index') }}">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="search"
                                            placeholder="Pesquisar cursos..." value="{{ request('search') }}">
                                        <button class="btn btn-outline-secondary" type="submit">Pesquisar</button>
                                    </div>
                                </form>

                                <a class="btn btn-primary" href="/courses/create">Adicionar novo Curso</a>
                            </div>

                            <div class="card-body">
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

                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Título</th>
                                            <th>Descrição</th>
                                            <th>Preço</th>
                                            <th>Imagem</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cursos as $curso)
                                            <tr>
                                                <td>{{ $curso->title }}</td>
                                                <td>{{ $curso->description }}</td>
                                                <td>{{ number_format($curso->price, 2, ',', '.') }}</td>
                                                {{-- <td>{{ $curso->teacher->name ?? 'N/A' }}</td> --}}
                                                <td>
                                                    @if ($curso->img_path)
                                                        <img src="{{ asset('storage/' . $curso->img_path) }}"
                                                            alt="Imagem do Curso" style="width: 100px; height: auto;">
                                                    @else
                                                        Sem imagem
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('course.edit', $curso->id) }}"
                                                        class="btn btn-warning btn-sm">Editar</a>
                                                    <form action="{{ route('courses.destroy', $curso->id) }}"
                                                        method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Tem certeza que deseja excluir este curso?')">Excluir</button>
                                                        {{-- <a href="courses/{course}/edit" class="btn btn-warning btn-sm">Editar</a> --}}
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
