<?php
// Essa tabela vai armazenar as informações sobre as aulas dentro dos cursos.
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lessons extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'title',
        'content',
        'img_url',
    ];
}
