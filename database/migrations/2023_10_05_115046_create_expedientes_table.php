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

            $table->unsignedBigInteger('memoranda_id')->unique()->nullable();//folio_memorandum
            $table->unsignedBigInteger("vales_compra_id")->unique()->nullable();//folio vale compra

            $table->foreign('memoranda_id')->references('id')->on('memoranda')->onDelete('set null');
            $table->foreign('vales_compra_id')->references('id')->on('vales_compra')->onDelete('set null');

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
