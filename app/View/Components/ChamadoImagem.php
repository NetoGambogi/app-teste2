<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ChamadoImagem extends Component
{
    public $chamado;

    public function __construct($chamado)
    {
        $this->chamado = $chamado;
    }

    public function render()
    {
        return view('components.chamado-imagem');
    }
}