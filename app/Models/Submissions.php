<?php

namespace App\Models;
// Essa tabela vai armazenar as submissões dos alunos para as atividades.
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submissions extends Model
{
    use HasFactory;

    protected $fillable = [
        'assignment_id',
        'student_id',
        'submission',
        'submitted_at',
    ];
}
