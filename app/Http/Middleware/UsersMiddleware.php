<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;


class UsersMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verifica se o usuário está autenticado
        if (Auth::check()) {
            // Verifica se o usuário é administrador
            if (Auth::user()->user_type === 'professor') {
                return $next($request);
            }
            // Se o usuário for cliente, redireciona para a home com uma mensagem de erro
            else if (Auth::user()->user_type === 'aluno') {
                return redirect('/login')->with('error', 'Acesso negado - a página que tentou acessar é restrita para administradores.');
            }
        } else {
            // Se o usuário não estiver logado, redireciona para a tela de login com uma mensagem de erro
            return redirect('/login')->with('error', 'Você precisa estar logado para acessar essa área.');
        }
    }
}
