<?php
// Essa tabela vai armazenar as atividades ou avaliações relacionadas a um curso.
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignments extends Model
{
    use HasFactory;

    protected $fillable = [
        'lesson_id',
        'title',
        'description',
        'due_date',
    ];
}
