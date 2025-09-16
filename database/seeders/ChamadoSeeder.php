<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Chamado;
use App\Models\User;    


class ChamadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // pega todos os IDs de requerentes e responsáveis
        $requerentes = User::where('role', 'requerente')->pluck('id')->toArray();
        $responsaveis = User::where('role', 'responsavel')->pluck('id')->toArray();

        // cria 20 chamados
        for ($i = 1; $i <= 20; $i++) {
            $status = collect(['aberta', 'em_andamento', 'concluida', 'cancelada'])->random();
            
            Chamado::create([
                'requerente_id' => $requerentes ? $requerentes[array_rand($requerentes)] : null,
                'responsavel_id' => $status === 'aberta' ? null : ($responsaveis ? $responsaveis[array_rand($responsaveis)] : null),
                'titulo' => "Chamado $i",
                'descricao' => "Descrição do chamado $i",
                'status' => $status,
                'data_conclusao' => null,
            ]);
        }
    }
}
