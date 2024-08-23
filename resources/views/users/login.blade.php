@extends('layouts.app')

@section('content')
    <div class="container m-4">
        <h1>Login</h1>

        @include('components.avisos')

        <form method="POST" action="{{ route('users.login') }}">
            @csrf

            <div class="form-group mt-3">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" required autofocus>
            </div>

            <div class="form-group mt-3">
                <label for="password">Senha</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Login</button>
            <a href="{{ route('users.register') }}" class="btn btn-success mt-3">Registrar</a>
        </form>
    </div>

@section('scripts')
    <script>
        // Define o tempo em milissegundos (ex: 3000 ms = 3 segundos)
        const timeoutDuration = 3000;
        // Função para esconder a mensagem após um determinado tempo
        function hideMessage(id) {
            const messageElement = document.getElementById(id);
            if (messageElement) {
                setTimeout(() => {
                    messageElement.style.display = 'none';
                }, timeoutDuration);
            }
        }

        // Esconde as mensagens de sucesso e erro
        hideMessage('success-message');
        hideMessage('error-message');
    </script>
@endsection
@endsection
