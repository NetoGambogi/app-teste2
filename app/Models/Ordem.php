<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ordem extends Model

{
    use HasFactory;

    protected $table = 'ordems'; 

    protected $fillable = [
        'titulo', 'descricao', 'status', 'user_id', 'cliente_id'
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
