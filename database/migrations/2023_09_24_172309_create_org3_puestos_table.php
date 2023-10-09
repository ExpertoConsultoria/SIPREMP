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
        Schema::create('org3_puestos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('Puesto', 128);
            $table->integer('NUP')->nullable()->unique();
            $table->string('ClavePuesto', 6)->nullable();
            $table->string('TipoPlaza', 32); //MMyS, Confianza, Base, Contrato, Honorarios
            $table->string('CorreoInstitucional', 64)->nullable();
            $table->string('Telefono', 32)->nullable();
            $table->smallInteger('Subordinados')->unsigned()->unsigned()->default(0); //min valor -32768
            $table->smallInteger('SuborAsignados')->nullable()->unsigned()->default(0); //max valor 32767
            $table->boolean('Vacante')->nullable()->default(1);
            $table->boolean('Activo')->nullable()->default(1);

            $table->foreignId('parent_id')->nullable()->constrained('org3_puestos')->restrictOnDelete(); //id MISMA tabla para indicar el jefe superior
            $table->foreignId('org2_area_id')->nullable()->constrained()->nullOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('org3_puestos');
    }
};
