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
        Schema::create('factura_cms', function (Blueprint $table) {
            $table->id();
            $table->text('fcm_nombre');
            $table->text('fcm_extension');
            $table->string('fcm_xml_ruta');
            $table->string('fcm_dpf_ruta');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('factura_cms');
    }
};
