<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ordem extends Model

{
    use HasFactory;

    protected $table = 'ordems'; 

    protected $fillable = [
        'titulo', 'descricao', 'status', 'cliente_id'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
