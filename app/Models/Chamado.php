<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Chamado extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $table = 'chamado';

    protected $fillable = [
        'requerente_id', 'responsavel_id', 'titulo', 'descricao', 'status', 'data_conclusao' 
    ];

    public function requerente(): BelongsTo {
        return $this->belongsTo(User::class, 'requerente_id');
    }

    public function responsavel(): BelongsTo {
        return $this->belongsTo(User::class, 'responsavel_id');
    }
}
