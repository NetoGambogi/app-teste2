@extends('layouts.admin')

@section('content')

<div class="container mt-5 pt-md-5">
    <div class="row justify-content-center">
        <div class="col-lg-7 col-md-9">

            <div class="text-center mb-5">
                <h1>Menu administrativo</h1>
                <p>Bem-vindo ao sistema. Selecione uma opção para continuar.<p>
            </div>

            <div class="d-grid gap-3">
                <a href="{{ route('admin.usuarios.index') }}" class="btn btn-primary py-3">
                    Gerenciar usuários
                </a>
                
                <a href="{{ route('admin.chamados.index') }}" class="btn btn-primary py-3">
                    Gerenciar chamados
                </a>

            </div>

        </div>
    </div>
</div>

@endsection