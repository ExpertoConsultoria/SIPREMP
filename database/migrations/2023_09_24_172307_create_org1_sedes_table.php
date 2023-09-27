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
        Schema::create('org1_sedes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();

            //Posiblemente se agrege un concecutivo

            $table->string('Clave', 3);
            $table->string('SedeNombre', 64);
            $table->char('Serie', 1);
            $table->string('Region', 32);
            $table->string('Direccion', 160)->nullable();
            $table->string('Telefono', 64)->nullable();
            $table->string('Horario', 64)->nullable();
            $table->boolean('Activa')->nullable()->default(1);

            //Se anota el org3_puesto_id de Gerente del lugar en turno
            $table->integer('id_gerencia')->unsigned()->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('org1_sedes');
    }
};
