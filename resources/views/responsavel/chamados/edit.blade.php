@extends('layouts.admin')

@section('content')


<form action="{{route('responsavel.chamados.updateStatus', $chamado->id )}}" method="POST">
        @csrf 
        @method('PATCH')

    <label for="status">Status:</label>
    <ul>
        
        <li><input type="radio" name="status" id="concluida" value="concluida"
        {{ old('status', $chamado->status ?? '') === 'concluida' ? 'checked' : '' }}>
            <label for="concluida">Concluída</label></li>
            <li><input type="radio" name="status" id="cancelada" value="cancelada"
        {{ old('status', $chamado->status ?? '') === 'concluida' ? 'checked' : '' }}>
            <label for="cancelada">Cancelada</label></li>

        <span class="text-danger">{{ $errors->first('status') }}</span>
    </ul>

    <button type=submit class="btn btn-success btn-primary me-2">Salvar</button>
</form>
@endsection