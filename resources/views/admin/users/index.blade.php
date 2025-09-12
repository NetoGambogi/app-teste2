@extends('layouts.admin')

@section('content')

<h1 class="text-center">Lista de usuários</h1>

<div class="container mt-4">

    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card ">
                <div class="card-body">
                    <h5 class="card-title text-primary">Usuários cadastrados</h5>
                    <p class="card-text display-6">{{ $usersCadastrados }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card ">
                <div class="card-body">
                    <h5 class="card-title text-success">Usuários requerentes</h5>
                    <p class="card-text display-6">{{ $usersRequerentes }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card ">
                <div class="card-body">
                    <h5 class="card-title text-warning">Usuários responsáveis</h5>
                    <p class="card-text display-6">{{ $usersResponsaveis }}</p>
                </div>
            </div>
        </div>
</div>



 <div class="d-flex justify-content-center">
    <form action="{{ route('admin.usuarios.index') }}">
        <label for="">Busque um usuário por nome:</label>
        <input type="text" name="name" value="{{ request('name') }}">

    <select name="role" id="role">
        <option value="">Tipo de usuário</option>
        <option value="requerente" {{request('status') == 'requerente' ? 'selected' : ''}}>Requerente</option>
        <option value="responsavel" {{request('status') == 'responsavel' ? 'selected' : ''}}>Responsavel</option>
    </select>

        <button type="submit" class="btn btn-info">Filtrar</button>
    </form>
</div>   

<x-alertas />

<div class="d-flex justify-content-center mt-2">
    <ul class="list-group w-50">
        @foreach ($users as $user)
            <li class="list-group-item d-flex justify-content-between">
                {{$user->name}} - {{$user->email}} - {{$user->role}}
                <a href="{{ route('admin.usuarios.show', $user->id) }}" class="btn btn-primary">Ver</a>
        </li>
    @endforeach
    </ul>
</div>

    <div class="d-flex justify-content-center mt-3">
        {{ $users->links('pagination::bootstrap-5') }}
    </div>

    <div class="d-flex justify-content-center mt-3">
        <a href="{{ url('admin/dashboard') }}" class="btn btn-secondary ms-2">Voltar</a>
    </div>
@endsection