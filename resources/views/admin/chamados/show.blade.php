@extends('layouts.admin')

@section('content')

    <h1 class="text-center mt-3">Chamado detalhado: </h1>

<x-alertas />    

    <div class="d-flex justify-content-center">
        <ul class="list-group">
        <li class="list-group-item"><b>Id: </b> {{$chamado->chamado_id}}</li>
        <li class="list-group-item"><b>Requerente: </b> {{$chamado->requerente?->name ?? 'Requerente apagado'}}</li>
        <li class="list-group-item"><b>Título: </b> {{$chamado->titulo}}</li>
        <li class="list-group-item"><b>Descrição: </b> {{$chamado->descricao}}</li>
        <li class="list-group-item"><b>Status: </b> {{$chamado->status}}</li>
        <li class="list-group-item"><b>Responsável: </b>  {{ $chamado->responsavel ? $chamado->responsavel->name : 'Não definido' }} </li>
        <li class="list-group-item"><b>Criado em: </b> {{ $chamado->created_at->format('d/m/Y H:i') }}</li>
        <li class="list-group-item"><b>Atualizado em: </b> {{ $chamado->updated_at->format('d/m/Y H:i') }}</li>
        </ul>
    </div>

<div class="d-flex justify-content-center mt-2">
    <div class="images text-center">
        <p>Anexos do requerente:</p>
        @if($chamado->imagens->where('tipo', 'abertura')->count())
            <div class="d-flex flex-wrap justify-content-center gap-2">
                @foreach($chamado->imagens->where('tipo', 'abertura') as $imagem)
                    <img src="{{ asset('storage/img/ocorridos/requerente/' . $imagem->nome_img) }}" 
                         alt="imagem"
                         class="img-thumbnail"
                         style="width: 150px; height: auto; cursor: pointer;"
                         data-bs-toggle="modal"
                         data-bs-target="#modalRequerente{{ $imagem->id }}">

                    {{-- Modal --}}
                    <div class="modal fade" id="modalRequerente{{ $imagem->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-body p-0">
                                    <img src="{{ asset('storage/img/ocorridos/requerente/' . $imagem->nome_img) }}" 
                                         class="img-fluid" alt="Imagem ampliada">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>Esse chamado não tem anexos do requerente.</p>
        @endif
    </div>
</div>

<div class="d-flex justify-content-center mt-3">
    <div class="images text-center">
        <p>Anexos do responsável:</p>
        @if($chamado->imagens->where('tipo', 'conclusao')->count())
            <div class="d-flex flex-wrap justify-content-center gap-2">
                @foreach($chamado->imagens->where('tipo', 'conclusao') as $imagem)
                    <img src="{{ asset('storage/img/ocorridos/responsavel/' . $imagem->nome_img) }}" 
                         alt="imagem"
                         class="img-thumbnail"
                         style="width: 150px; height: auto; cursor: pointer;"
                         data-bs-toggle="modal"
                         data-bs-target="#modalResponsavel{{ $imagem->id }}">

                    {{-- Modal --}}
                    <div class="modal fade" id="modalResponsavel{{ $imagem->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-body p-0">
                                    <img src="{{ asset('storage/img/ocorridos/responsavel/' . $imagem->nome_img) }}" 
                                         class="img-fluid" alt="Imagem ampliada">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>Esse chamado não tem anexos do responsável.</p>
        @endif
    </div>
</div>

    <div class="d-flex justify-content-center mt-3">    
        <a href="{{ route('admin.chamados.index') }}" class="btn btn-secondary me-2">Voltar</a>

    @if ($chamado->status !== 'concluida')
        <a href="{{ route('admin.chamados.edit', $chamado->id) }}" class="btn btn-info me-2">Atualizar Status</a>
    @endif
    
    @if ($chamado->status !== 'aberta' && $chamado->status !== 'concluida')
        <form action="{{ route('admin.chamados.retornar', $chamado->id) }}" method='POST'>
        @csrf 
        <button type="submit" class="btn btn-success me-2">Retornar a fila</button>
        </form>
    @endif
            
        <form action="{{ route('admin.chamados.destroy', $chamado->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('tem certeza que deseja apagar este chamado?')">Deletar</button>
    </div>

    </form>
    </div>


@endsection