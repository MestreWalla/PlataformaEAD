<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class StudentsController extends Controller
{
    public function index()
    {
        // Obtém todos os usuários que são alunos
        $alunos = User::where('user_type', 'aluno')->get();

        // Retorna a view com a lista de alunos
        return view('users.alunos', compact('alunos'));
    }
}
