<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class TeacherController extends Controller
{
    /**
     * Display a listing of the teachers.
     */
    public function index()
    {
        // Obtém todos os usuários que são professores
        $teachers = User::where('user_type', 'professor')->get();
        // Retorna a view com a lista de professores
        return view('users.professores', compact('teachers'));
    }
}