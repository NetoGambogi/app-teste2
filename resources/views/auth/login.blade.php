@extends('layouts.admin')

@section('content')

@if (session('status'))
    <div>
        {{ session('status') }}
    </div>
@endif

<h1 class="text-center mt-4">Bem vindo ao sistema!</h1>

<form method="POST" action="{{ route('login') }}">
    @csrf

<div class="d-flex justify-content-center align-items-center vh-50 mt-5">
    <div class="card p-4" style="width: 300px;">
    <!-- Email -->

<div class="row mb-4">
    <div class="col-12">
        <label for="email">Email:</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
        @if ($errors->has('email'))
            <div>{{ $errors->first('email') }}</div>
        @endif
    </div>
</div>

    <!-- Password -->
<div class="row mb-2">
    <div class="col-12">
        <label for="password">Senha:</label>
        <input id="password" type="password" name="password" required>
        @if ($errors->has('password'))
            <div>{{ $errors->first('password') }}</div>
        @endif
    </div>
</div>

    <!-- Remember Me -->
    <div style="margin-top: 20px;">
        <label for="remember_me">
            <input id="remember_me" type="checkbox" name="remember">
            Lembrar-me
        </label>
    </div>

    <!-- Forgot Password + Submit -->
    <div style="margin-top: 15px;">
        @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}">Esqueceu sua senha?</a>
        @endif

        <button type="submit" class="btn btn-success" style="margin-left: 10px;">
            Entrar
        </button>
        
    <a href="{{ route('register') }}">Cadastre-se</a>
    </div>
</div>


</form>

@endsection
