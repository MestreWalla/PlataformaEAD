<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\UsersMiddleware;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\HomeController;

// Route::get('/', function () {return view('index');});
// Route::get('/', function () {return view('index');})->name('index');
Route::get('/', [HomeController::class, 'index'])->name('index');
// Rotas para Cadastro de Usuário
Route::get('/register', [UserController::class, 'showRegisterForm'])->name('users.register');
Route::post('/register', [UserController::class, 'register'])->name('users.store');
// Rotas para Login de Usuário
Route::get('/login', [UserController::class, 'showLoginForm'])->name('users.login');
Route::post('/login', [UserController::class, 'login'])->name('authenticate');
// Rota para Logout de Usuário
Route::post('/logout', [UserController::class, 'logout'])->name('users.logout');
// Rota para Dashboard do Usuário logado
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(UsersMiddleware::class)->name('dashboard');
//  Rota para Registrar um novo curso
Route::get('/courses/create', [CoursesController::class, 'create'])->middleware(UsersMiddleware::class)->name('courses.create');
Route::get('/cursos', [CoursesController::class, 'index'])->name('cursos.index');
Route::post('/courses', [CoursesController::class, 'store'])->name('course.store');
// Rota para edição de curso
Route::get('courses/{course}/edit', [CoursesController::class, 'edit'])->middleware(UsersMiddleware::class)->name('course.edit');
// Rota para atualizar o curso
Route::put('courses/{course}', [CoursesController::class, 'update'])->middleware(UsersMiddleware::class)->name('courses.update');
// Rota para deletar um curso
Route::delete('curso/{curso}', [CoursesController::class, 'destroy'])->middleware(UsersMiddleware::class)->name('courses.destroy');
// Rota para visualização de um curso específico
Route::get('cursos/{id}', [CoursesController::class, 'show'])->middleware(UsersMiddleware::class)->name('cursos.show');
// Rota para visualizar os professores cadastrados
Route::get('/professores', [TeacherController::class, 'index'])->name('users.professores');
// Rota para visualizar os alunos cadastrados
Route::get('/alunos', [StudentsController::class, 'index'])->name('users.alunos');