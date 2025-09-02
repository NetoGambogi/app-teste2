<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model

{
    use HasFactory;

    protected $table = 'clientes'; 

    protected $fillable = [
        'nome', 'email', 'telefone'
    ];

    public function ordens()
    {
        return $this->hasMany(Order::class, 'cliente_id');
    }
}