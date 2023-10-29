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
        Schema::create('materiales_oficina', function (Blueprint $table) {
            $table->id();

            $table->text("folio_vale");
            $table->text("unidad_medida");
            $table->integer("cantidad");
            $table->text("concepto");
            // $table->text("info_extra")->nullable();

            $table->unsignedBigInteger('memoranda_id')->unique();//folio_memorandum
            $table->unsignedBigInteger('partidas_presupuestales_id')->unique();//id_par_ppta

            $table->foreign('memoranda_id')->references('id')->on('memoranda')->onDelete('cascade');
            // $table->foreign('partidas_presupuestales_id')->references('id')->on('partidas_presupuestales')->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materiales_oficina');
    }
};
