@props(['chamado'])

<div class="d-flex justify-content-center mt-2">
    <div class="images text-center">
        @if($chamado->imagens->count())
            <h4>Anexos do requerente:</h4>
            <div class="d-flex flex-wrap justify-content-center gap-2">
                @foreach($chamado->imagens as $imagem)
                    <img src="{{ asset('storage/img/ocorridos/requerente/' . $imagem->nome_img) }}" 
                         alt="imagem"
                         class="img-thumbnail"
                         style="width: 150px; height: auto; cursor: pointer;"
                         data-bs-toggle="modal"
                         data-bs-target="#imagemModal{{ $imagem->id }}">

                    {{-- Modal para imagem ampliada --}}
                    <div class="modal fade" id="imagemModal{{ $imagem->id }}" tabindex="-1" aria-hidden="true">
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
            <p>Esse chamado não tem anexos.</p>
        @endif
    </div>
</div>