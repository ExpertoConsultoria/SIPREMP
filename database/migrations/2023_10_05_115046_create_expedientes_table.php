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
        Schema::create('expedientes', function (Blueprint $table) {
            $table->id();
            $table->string("folio");
            $table->integer("id_cotizacion");
            $table->integer("id_factura");
            $table->integer("id_evd_foto");
            $table->string("info_extra")->nullable();

            $table->unsignedBigInteger('memoranda_id')->unique();//folio_memorandum
            $table->unsignedBigInteger("vales_compra_id")->unique();//folio vale compra
            $table->unsignedBigInteger("vales_entrada_materials_id")->unique();//folio_vale_entrada

            $table->foreign('memoranda_id')->references('id')->on('memoranda')->onDelete('cascade');
            $table->foreign('vales_compra_id')->references('id')->on('vales_compra')->onDelete('cascade');
            $table->foreign('vales_entrada_materials_id')->references('id')->on('vales_entrada_materials')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expedientes');
    }
};
