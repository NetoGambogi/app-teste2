@extends('layouts.admin')

@section('content')

<h1 class="text-center mt-4">Recuperar senha</h1>

<div class="d-flex justify-content-center align-items-center vh-50 mt-5">
    <div class="card p-4" style="width: 400px;">
<div>
    <p>
        Esqueceu sua senha? Sem problema. Basta informar seu endereço de e-mail e enviaremos um link de redefinição de senha para você escolher uma nova.
    </p>
</div>

@if (session('status'))
    <div>
        {{ session('status') }}
    </div>
@endif

<form method="POST" action="{{ route('password.email') }}">
    @csrf

    <!-- Email Address -->
<div class="row mb-4">
    <div class="col-12">
        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
        @if ($errors->has('email'))
            <div>{{ $errors->first('email') }}</div>
        @endif
    </div>
</div>

    <div class="d-flex justify-content-center mt-3">
        <a href="{{ route('login') }}" class="btn btn-secondary me-2">Voltar</a>
        <button type="submit" class="btn btn-success">
            Enviar link de redefinição
        </button>
    </div>
</form>
    </div>
</div>

@endsection
