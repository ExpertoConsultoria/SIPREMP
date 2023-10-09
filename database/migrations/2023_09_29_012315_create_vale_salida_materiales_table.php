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

            $table->unsignedBigInteger('id_encargado_entrega');
            // $table->foreign('id_encargado_entrega') -> references('id') -> on ('users') -> nullable()->constrained()->nullOnDelete();

            $table->unsignedBigInteger('id_solicitante');
            // $table->foreign('id_solicitante') -> references('id') -> on ('users') -> nullable()->constrained()->nullOnDelete();

            $table->text('token_entrega');
            $table->text('estatus_SG');
            $table->string('info_extra') -> nullable();
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
