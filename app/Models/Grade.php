<?php
// Essa tabela vai armazenar as notas dadas pelos professores nas atividades submetidas pelos alunos.
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = [
        'submission_id',
        'grade',
        'graded_at',
    ];
}
