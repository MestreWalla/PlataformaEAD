@extends('layouts.app')

@section('title', 'Editar Curso')

@section('content')
    <div class="container-fluid">
        <div class="row">

            <!-- Menu de Navegação Lateral -->
            @include('parts.sidebar')

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <span>{{ __('Editar Curso') }}</span>
                            </div>

                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form action="{{ route('courses.update', $course->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-3">
                                        <label for="title" class="form-label">Título</label>
                                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $course->title) }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="description" class="form-label">Descrição</label>
                                        <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description', $course->description) }}</textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="price" class="form-label">Preço</label>
                                        <input type="text" class="form-control" id="price" name="price" value="{{ old('price', $course->price) }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="teacher_id" class="form-label">Professor</label>
                                        <select class="form-select" id="teacher_id" name="teacher_id" required>
                                            <option value="">Selecione o Professor</option>
                                            @foreach ($teachers as $teacher)
                                                <option value="{{ $teacher->id }}" {{ $teacher->id == old('teacher_id', $course->teacher_id) ? 'selected' : '' }}>
                                                    {{ $teacher->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="img_path" class="form-label">Imagem</label>
                                        <input type="file" class="form-control" id="img_path" name="img_path">
                                        @if ($course->img_path)
                                            <img src="{{ asset('storage/' . $course->img_path) }}" alt="Imagem do Curso" style="width: 100px; height: auto;">
                                        @endif
                                    </div>

                                    <button type="submit" class="btn btn-primary">Atualizar Curso</button>
                                    <a href="{{ route('cursos.index') }}" class="btn btn-secondary">Cancelar</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
