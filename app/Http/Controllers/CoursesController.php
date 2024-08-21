<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;
use App\Models\User;

class CoursesController extends Controller
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

        return view('cursos.index', compact('cursos'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obtém apenas os usuários que são professores
        $teachers = User::where('user_type', 'professor')->get();

        return view('cursos.register', compact('teachers'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar os dados
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'teacher_id' => 'required|exists:users,id',
            'img_path' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        Courses::create($request->all());

        return redirect()->route('cursos.index')->with('success', 'Curso cadastrado com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Courses $course)
    {
        $teachers = User::where('user_type', 'professor')->get();
        return view('cursos.edit', compact('course', 'teachers'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Courses $course)
    {
        // Validar os dados
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'teacher_id' => 'required|exists:users,id',
            'img_path' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $course->update($request->all());

        return redirect()->route('cursos.index')->with('success', 'Curso atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Courses $curso)
    {
        $curso->delete();
        return redirect()->route('cursos.index')->with('success', 'Curso excluído com sucesso!');
    }

    public function messages(): array
    {
        return [
            'title.required' => 'O campo Título é obrigatório',
            'description.required' => 'O campo Descrição é obrigatório',
            'price.required' => 'O campo Preço é obrigatório',
            'price.numeric' => 'O campo Preço deve ser um valor numérico',
            'teacher_id.required' => 'O campo Professor é obrigatório',
            'teacher_id.exists' => 'O Professor selecionado não existe',
            'img_path.max' => 'A imagem deve ter no máximo 2MB',
            'img_path.mimes' => 'A imagem deve ser um arquivo do tipo: jpeg, png, jpg, gif, svg',
        ];
    }

    public function show(Courses $course)
    {
        return view('cursos.show', compact('course'));
    }
}
