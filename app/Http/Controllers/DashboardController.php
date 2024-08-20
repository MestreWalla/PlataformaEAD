<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $search = $request->input('search');
    $cursos = Courses::when($search, function ($query, $search) {
        return $query->where('title', 'like', "%{$search}%")
            ->orWhere('description', 'like', "%{$search}%");
    })->get();

    return view('users.dashboard', compact('cursos'));
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Lógica para exibir o formulário de criação, se necessário
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Lógica para armazenar um novo recurso, se necessário
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Lógica para exibir um recurso específico, se necessário
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Lógica para exibir o formulário de edição, se necessário
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Lógica para atualizar um recurso específico, se necessário
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Lógica para remover um recurso específico, se necessário
    }
}
