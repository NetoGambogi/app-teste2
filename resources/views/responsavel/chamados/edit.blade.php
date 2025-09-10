@extends('layouts.admin')

@section('content')

<div class="d-flex justify-content-center mt-3">
    <form action="{{route('responsavel.chamados.updateStatus', $chamado->id )}}" method="POST">
        @csrf 
        @method('PATCH')

    <label for="status">Status:</label>
  
        
    <input type="radio" name="status" id="concluida" value="concluida"
        {{ old('status', $chamado->status ?? '') === 'concluida' ? 'checked' : '' }}>
            <label for="concluida">Concluída</label>

    <input type="radio" name="status" id="cancelada" value="cancelada"
        {{ old('status', $chamado->status ?? '') === 'cancelada' ? 'checked' : '' }}>
            <label for="cancelada">Cancelada</label>

        <span class="text-danger">{{ $errors->first('status') }}</span>


    <button type=submit class="btn btn-success btn-primary me-2">Salvar</button>
    </form>
</div>
@endsection