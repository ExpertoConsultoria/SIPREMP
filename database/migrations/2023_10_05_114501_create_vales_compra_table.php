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
        Schema::create('vales_compra', function (Blueprint $table) {
            $table->id();

            $table->text("folio");
            $table->text("fecha");
            $table->integer("id_usuario");
            $table->text("lugar");
            $table->integer("NoFin");
            $table->integer("NoProposito");
            $table->integer("NoComponente");
            $table->integer("NoActividad");
            $table->integer("id_proveedor");
            $table->text("justificacion");
            $table->text("lugar_entrega");
            $table->text("fecha_entrega");
            $table->text("lista_compra");
            $table->float("subtotal");
            $table->float("iva");
            $table->float("total_compra");
            $table->text("token_solicitante");
            $table->text("token_rev_val");
            $table->text("token_disp_ppta");
            $table->text("token_autorizacion");

            $table->unsignedBigInteger('archivos_id')->unique();//id_arch_cotizacion

            $table->foreign('archivos_id')->references('id')->on('archivos')->onDelete('cascade');


            $table->text("info_extra")->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vales_compra');
    }
};
