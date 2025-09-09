@extends('layouts.admin')

@section('content')

<div class="container mt-5 pt-md-5">
    <div class="row justify-content-center">
        <div class="col-lg-7 col-md-9">

            <div class="text-center mb-5">
                <h1 class="display-5 fw-light">Página Inicial</h1>
                <p class="lead text-muted">Bem-vindo ao sistema. Selecione uma opção para continuar.</p>
            </div>

            <div class="d-grid gap-3">
                <a href="{{ route('responsavel.dashboard') }}" class="btn btn-outline-secondary btn-lg py-3">
                    Você responsável
                </a>
                
                <a href="{{ route('requerente.dashboard') }}" class="btn btn-outline-secondary btn-lg py-3">
                    Veja seus chamados
                </a>

                <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary btn-lg py-3">
                    Administrador
                </a>

                </div>

        </div>
    </div>
</div>

@endsection