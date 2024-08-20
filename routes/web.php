<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

// Rotas para Cadastro de Usuário
Route::get('/register', [UserController::class, 'showRegisterForm'])->name('users.register');
Route::post('/register', [UserController::class, 'register'])->name('users.store');

// Rotas para Login de Usuário
Route::get('/login', [UserController::class, 'showLoginForm'])->name('users.login');
Route::post('/login', [UserController::class, 'login'])->name('users.authenticate');

// Rota para Logout de Usuário
Route::post('/logout', [UserController::class, 'logout'])->name('users.logout');

// Rota para Dashboard do Usuário logado
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

//  Rota para Registrar um novo curso
Route::get('/courses/create', [CoursesController::class, 'create'])->middleware('auth')->name('courses.create');
Route::get('/courses', [CoursesController::class, 'index'])->name('courses.index');
Route::post('/courses', [CoursesController::class, 'store'])->name('course.store');

// Rota para edição de curso
Route::get('courses/{course}/edit', [CoursesController::class, 'edit'])->middleware('auth')->name('courses.edit');

// Rota para atualizar o curso
Route::put('courses/{course}', [CoursesController::class, 'update'])->middleware('auth')->name('courses.update');
// Rota para deletar um curso
Route::delete('courses/{course}', [CoursesController::class, 'destroy'])->middleware('auth')->name('courses.destroy');
// Rota para visualização de um curso específico
// Route::get('courses/{course}', [CoursesController::class, 'show'])->middleware('auth')->name('courses.show');