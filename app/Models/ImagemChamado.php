<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ImagemChamado extends Model
{
    use SoftDeletes;

    protected $table = 'imagens_chamado';

    protected $fillable = [
        'chamado_id',
        'nome_img',
        'uploaded_by',
        'tipo',
    ];

    public function chamado()
    {
        return $this->belongsTo(Chamado::class, 'chamado_id');
    }

    public function uploader()
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }
}
