@extends('layouts.admin')

@section('content')

<h1 class="text-center mt-4">Novo usuário</h1>

<form method="POST" action="{{ route('register') }}">
    @csrf

<div class="d-flex justify-content-center align-items-center vh-50 mt-5">
    <div class="card p-4" style="width: 400px;">

    <!-- Name -->

<div class="row mb-4">
    <div class="col-12">
        <label for="name">Nome: </label>
        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
        @if ($errors->has('name'))
            <div>{{ $errors->first('name') }}</div>
        @endif
    </div>
</div>
    <!-- Email Address -->
<div class="row mb-4">
    <div class="col-12">
        <label for="email">Email: </label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
        @if ($errors->has('email'))
            <div>{{ $errors->first('email') }}</div>
        @endif
    </div>
</div>
    <!-- Password -->
<div class="row mb-4">
    <div class="col-12">
        <label for="password">Senha: </label>
        <input id="password" type="password" name="password" required autocomplete="new-password">
        @if ($errors->has('password'))
            <div>{{ $errors->first('password') }}</div>
        @endif
    </div>
</div>
    <!-- Confirm Password -->
<div class="row mb-4">
    <div class="col-12">
        <label for="password_confirmation">Confirme a senha: </label>
        <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
        @if ($errors->has('password_confirmation'))
            <div>{{ $errors->first('password_confirmation') }}</div>
        @endif
    </div>
</div>
    <!-- Link para Login + Botão -->
<div class="d-flex justify-content-center mt-1">
    <div>
        <a href="{{ route('login') }}">Já tem uma conta?</a>

        <button type="submit" class="btn btn-success"style="margin-left: 10px;">
            Registrar
        </button>
    </div>
</div>
</div>
</div>
</form>

@endsection
