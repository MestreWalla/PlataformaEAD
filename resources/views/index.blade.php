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
    <div class="container my-5">
        <!-- Seção de Boas-vindas -->
        <section class="text-center mb-5">
            <h1 class="display-4">Bem-vindo à Escola ABC</h1>
            <p class="lead">Uma instituição dedicada a oferecer a melhor educação para você!</p>
            <a href="{{ route('index') }}" class="btn btn-primary btn-lg">Ver Cursos</a>
        </section>

        <!-- Seção Sobre a Escola -->
        <section class="my-5">
            <div class="row">
                <div class="col-md-6">
                    <img src="https://via.placeholder.com/500" class="img-fluid rounded" alt="Escola ABC">
                </div>
                <div class="col-md-6">
                    <h2>Sobre Nós</h2>
                    <p>A Escola ABC foi fundada com a missão de proporcionar uma educação de qualidade e acessível. Nossos
                        professores são experientes e dedicados ao desenvolvimento acadêmico e pessoal dos alunos.
                        Oferecemos uma variedade de cursos que atendem às necessidades de todos, desde iniciantes até
                        profissionais avançados.</p>
                    <p>Venha fazer parte de nossa comunidade e construa um futuro brilhante conosco!</p>
                </div>
            </div>
        </section>

        <!-- Seção de Cursos Oferecidos -->
        <section class="my-5">
            <h2 class="text-center">Cursos Oferecidos</h2>
            <div class="row mt-4">
                @foreach ($cursos as $curso)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <img src="{{ $course->img_path ? asset('storage/' . $curso->img_path) : 'https://via.placeholder.com/150' }}"
                                class="card-img-top" alt="{{ $curso->title }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $curso->title }}</h5>
                                <p class="card-text">{{ Str::limit($curso->description, 100) }}</p>
                                <p class="card-text"><strong>Preço:</strong> R$
                                    {{ number_format($curso->price, 2, ',', '.') }}</p>
                                <a href="{{ route('cursos.show', $curso->id) }}" class="btn btn-primary">Saiba Mais</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Seção de Professores -->
        <section class="my-5">
            <h2 class="text-center">Conheça Nossos Professores</h2>
            <div class="row mt-4">
                @foreach ($teachers as $teacher)
                    <div class="col-md-3 mb-4">
                        <div class="card h-100 text-center">
                            <img src="{{ $teacher->img_path ? asset('storage/' . $teacher->img_path) : 'https://via.placeholder.com/150' }}"
                                class="card-img-top rounded-circle mx-auto mt-3" style="width: 150px; height: 150px;"
                                alt="{{ $teacher->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $teacher->name }}</h5>
                                <p class="card-text">{{ $teacher->bio }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Seção de Contato -->
        <section class="my-5">
            <h2 class="text-center">Entre em Contato</h2>
            <p class="text-center">Tem alguma dúvida? Entre em contato conosco!</p>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form method="POST" action="{{ route('contact.send') }}">
                        @csrf
                        <div class="form-group mt-3">
                            <label for="name">Nome</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        <div class="form-group mt-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <div class="form-group mt-3">
                            <label for="message">Mensagem</label>
                            <textarea name="message" class="form-control" rows="5" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Enviar Mensagem</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
