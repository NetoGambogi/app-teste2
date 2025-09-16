<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImagemChamado;
use App\Models\Chamado;
use Illuminate\Support\Facades\Storage;

class ImagemChamadoController extends Controller
{
    public function destroy(ImagemChamado $imagem)
    {
        if ($imagem->chamado->requerente_id !== auth()->id()) {
            abort(403);
        }

        Storage::disk('public')->delete('img/ocorridos/requerente/' . $imagem->nome_img);
        $imagem->delete();

        return back()->with('message', 'Imagem removida com sucesso!');
    }

    public function replace(Request $request, ImagemChamado $imagem)
    {
        if ($imagem->chamado->requerente_id !== auth()->id()) {
            abort(403);
        }

        $request->validate([
            'image' => 'required|image|max:2048'
        ]);

        Storage::disk('public')->delete('img/ocorridos/requerente/' . $imagem->nome_img);

        $arquivo = $request->file('image');
        $nome = md5($arquivo->getClientOriginalName().time()) . '.' . $arquivo->extension();
        $arquivo->storeAs('img/ocorridos/requerente', $nome, 'public');

        $imagem->update([
            'nome_img' => $nome,
            'uploaded_by' => auth()->id(),
        ]);

        return back()->with('message', 'Imagem substituida com sucesso!');
    }

    public function store(Request $request, Chamado $chamado)
    {
        if ($chamado->requerente_id !== auth()->id()) {
            abort(403);
        }

        $request->validate([
            'image' => 'required|image|max:2048'
        ]);

        $arquivo = $request->file('image');
        $nome = md5($arquivo->getClientOriginalName().time()) . '.' . $arquivo->extension();
        $arquivo->storeAs('img/ocorridos/requerente', $nome, 'public');

        ImagemChamado::create([
            'chamado_id' => $chamado->id,
            'nome_img' => $nome,
            'uploaded_by' => auth()->id(),
            'tipo' => 'abertura'
        ]);

        return back()->with('message', 'Imagem adicionada com sucesso!');
    }
}
