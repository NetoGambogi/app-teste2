<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chamado extends Model
{
    use HasFactory;

    protected $table = 'chamado';

    protected $fillable = [
        'requerente_id', 'responsavel_id', 'titulo', 'descricao', 'status', 'data_conclusao' 
    ];

    public function user() {
        return $this->belongsTo(User::class, 'requerente_id', 'responsavel_id')
    }
}
