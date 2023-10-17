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

            $table->string("fecha");
            $table->string("folio");
            $table->integer("id_solicitante");
            $table->string("lugar");
            $table->integer("id_destinatario");
            $table->string("asunto");
            $table->integer("lista_compra");
            $table->integer("cotizacion");
            $table->string("token_solicitante");
            $table->string("token_recepcion");
            $table->string("info_extra")->nullable();

            $table->unsignedBigInteger('plan1_fins_id')->unique();//NoFin
            $table->unsignedBigInteger('plan2_propositos_id')->unique();//NoProposito
            $table->unsignedBigInteger('plan3_componentes_id')->unique();//NoComponente
            $table->unsignedBigInteger('plan4_actividad_id')->unique();//NoActividad

            $table->foreign('plan1_fins_id')->references('id')->on('plan1_fins')->onDelete('cascade');
            $table->foreign('plan2_propositos_id')->references('id')->on('plan2_propositos')->onDelete('cascade');
            $table->foreign('plan3_componentes_id')->references('id')->on('plan3_componentes')->onDelete('cascade');
            $table->foreign('plan4_actividad_id')->references('id')->on('plan4_actividad')->onDelete('cascade');

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
