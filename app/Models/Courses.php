<?php
// Essa tabela vai armazenar as informações sobre os cursos criados pelos professores.
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'teacher_id',
        'img_path',
    ];

    /**
     * Define o relacionamento com o modelo User.
     */
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }
}

