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
        Schema::create('vale_salida_materiales', function (Blueprint $table) {
            $table->id();
            $table->text('folio', 120);
            $table->string('fecha', 10);
            $table->string('lugar');

            $table->unsignedBigInteger('id_encargado_entrega') -> nullable();
            // $table->foreign('id_encargado_entrega') -> references('id') -> on ('users') -> nullable()->constrained()->nullOnDelete();

            $table->unsignedBigInteger('id_solicitante');
            // $table->foreign('id_solicitante')->references('id')->on ('users')->nullable()->constrained()->nullOnDelete();

            $table->text('token_entrega') -> nullable();
            $table->text('token_solicitante') -> nullable();
            $table->text('estatus_SG') -> nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vale_salida_materiales');
    }
};
