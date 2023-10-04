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
        Schema::create('memoranda', function (Blueprint $table) {
            $table->id();

            $table->date('memo_fecha');
            $table->text('memo_folio')->unique();

            $table->unsignedBigInteger('solicitante_id');
            $table->foreign('solicitante_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->string('memo_sucursal');

            $table->string('destinatario');

            $table->string('memo_asunto');

            $table->text('mir_id_fin');
            $table->text('mir_id_proposito');
            $table->text('mir_id_componente');
            $table->text('mir_id_actividad');

            $table->text('memo_id_cotizacion');

            $table->string('memo_creation_status');

            // $table->text('token_solicitud')->nullable();
            $table->text('token_aceptacion')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('memoranda');
    }
};
