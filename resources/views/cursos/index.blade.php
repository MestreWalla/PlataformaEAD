<!-- resources/views/course/index.blade.php -->

@extends('layouts.app')

@section('title', 'Cursos Cadastrados')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>{{ __('Cursos Cadastrados') }}</span>
                    <a href="{{ route('course.create') }}" class="btn btn-primary">Adicionar Novo Curso</a>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Título</th>
                                <th>Descrição</th>
                                <th>Preço</th>
                                <th>Professor</th>
                                <th>Imagem</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courses as $course)
                                <tr>
                                    <td>{{ $course->id }}</td>
                                    <td>{{ $course->title }}</td>
                                    <td>{{ $course->description }}</td>
                                    <td>{{ number_format($course->price, 2, ',', '.') }}</td>
                                    <td>{{ $course->teacher->name ?? 'N/A' }}</td>
                                    <td>
                                        @if ($course->img_path)
                                            <img src="{{ asset('storage/' . $course->img_path) }}" alt="Imagem do Curso" style="width: 100px; height: auto;">
                                        @else
                                            Sem imagem
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('course.edit', $course->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                        <form action="{{ route('course.destroy', $course->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este curso?')">Excluir</button>
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
</div>
@endsection
