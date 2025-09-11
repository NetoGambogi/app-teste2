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
        'chamado_id', 'requerente_id', 'responsavel_id', 'titulo', 'descricao', 'status', 'data_conclusao' 
    ];

    protected static function booted()
    {
        static::created(function ($chamado) {
            $ano = date('y');
            $mes = date('n');
            $semestre = $mes <= 6 ? 'S1' : 'S2';

            $chamado->chamado_id = 'C' . $ano . $semestre . '-' . $chamado->id;
            $chamado->saveQuietly();
        });
    }

    public function retornarFila()
    {
        $this->responsavel_id = null;
        $this->status = 'aberta';
        $this->save();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function requerente(): BelongsTo {
        return $this->belongsTo(User::class, 'requerente_id');
    }

    public function responsavel(): BelongsTo {
        return $this->belongsTo(User::class, 'responsavel_id');
    }
}
