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
        Schema::create('proveedores_temporales', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('RFC', 13)->unique();
            $table->string('RazonSocial', 128);
            $table->char('Persona', 1)->default('M'); //(F)Fisica o (M)Moral
            $table->string('Nombre', 128)->nullable();
            $table->string('Telefono', 64)->nullable();
            $table->integer('Regimen')->nullable();
            $table->string('Direccion', 128)->nullable();
            $table->integer('CodigoPostal');
            $table->string('DatosContacto', 192)->nullable();
            $table->string('DatosBanco', 128)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proveedores_temporales');
    }
};
