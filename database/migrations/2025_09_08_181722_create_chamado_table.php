<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('chamado', function (Blueprint $table) {
            $table->id();
            $table->foreignId('requerente_id')->nullable()->references('id')->on('users')->onDelete('set null');
            $table->foreignId('responsavel_id')->nullable()->references('id')->on('users')->onDelete('set null');
            $table->string('titulo');
            $table->text('descricao');
            $table->enum('status', ['aberta', 'em_andamento', 'concluida', 'cancelada'])->default('aberta');
            $table->timestamp('data_conclusao')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chamado');
    }
};
