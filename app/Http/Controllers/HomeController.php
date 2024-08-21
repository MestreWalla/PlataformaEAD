<?php
namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $cursos = Courses::all();
        $teachers = User::where('user_type', 'professor')->get();
        return view('index', compact('cursos', 'teachers'));
    }
}
