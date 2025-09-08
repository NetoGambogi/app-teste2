<!-- Mensagem de sucesso -->

    <div class="text-center">
        <h2 class="text-success">
        @if (session()->has('message'))
            {{ session()->get('message') }}
        @endif
        </h2>
    </div>

    <div class="text-center">
        <h2 class="text-danger">
        @if (session()->has('error'))
            {{ session()->get('error') }}
        @endif
        </h2>
    </div>
