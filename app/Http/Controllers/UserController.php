<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Exibir o formulário de login
    public function showLoginForm()
    {
        return view('users.login');
    }


    // Processar o login do usuário
    public function login(Request $request)
    {
        // Valida as credenciais fornecidas
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Tenta autenticar o usuário
        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();

            // Verifica o tipo de usuário
            if (Auth::user()->user_type === 'professor') {
                return redirect()->intended('/dashboard');
            } else {
                return redirect('/cursos');
            }
        }

        // Se as credenciais falharem
        // return back()->withErrors([
        //     'error' => 'As credenciais não correspondem aos nossos registros.',
        // ])->onlyInput('email');
        return back()->with('error', 'As credenciais não correspondem aos nossos registros.');
    }

    // Exibir o formulário de registro
    public function showRegisterForm()
    {
        return view('users.register');
    }


    // Processar o registro de um novo usuário
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        Auth::login($user);
        return redirect('/login');
    }


    // Realizar o logout do usuário
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
