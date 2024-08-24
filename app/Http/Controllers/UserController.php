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
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'img_path' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'user_type' => 'required|in:aluno,professor',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'address' => $request->address,
            'img_path' => $request->img_path ? $request->img_path->store('public/images') : null,
            'user_type' => $request->user_type,
        ]);

        Auth::login($user);
        return redirect('/login');
    }

    public function edit($id)
    {
        // Busca o usuário pelo ID
        $user = User::findOrFail($id);

        // Verifica se o usuário autenticado é o dono do perfil ou um administrador, caso necessário
        if (Auth::id() === $user->id && Auth::user()->user_type === 'administrador') {
            return redirect('/dashboard')->with('error', 'Você não tem permissão para editar este perfil.');
        }

        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // Busca o usuário pelo ID
        $user = User::findOrFail($id);

        // Verifica se o usuário autenticado é o dono do perfil ou um administrador
        if (Auth::id() === $user->id && Auth::user()->user_type === 'administrador') {
            return redirect('/dashboard')->with('error', 'Você não tem permissão para editar este perfil.');
        }

        // Valida os dados fornecidos
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'img_path' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password' => 'nullable|string|min:8|confirmed',
            'user_type' => 'required|in:aluno,professor',
        ]);

        // Atualiza os dados do usuário
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->user_type = $request->user_type;

        // Se uma nova senha for fornecida, atualize-a
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Se uma nova imagem for enviada, salve-a e atualize o caminho
        if ($request->hasFile('img_path')) {
            $user->img_path = $request->img_path->store('public/images');
        }

        // Salva as alterações no banco de dados
        $user->save();

        return redirect('/dashboard')->with('success', 'Perfil atualizado com sucesso.');
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
