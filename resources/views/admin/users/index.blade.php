@extends('layouts.admin')

@section('content')

<h1>Lista de usuários</h1>

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

@endsection