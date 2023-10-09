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
        Schema::create('org4_empleados', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('RFC', 13)->unique()->nullable();
            $table->string('CURP', 18)->unique()->nullable();
            $table->integer('NUE')->nullable();
            $table->string('Titulo', 9)->nullable(); // C. | Lic. | Ing. | C.P. | ...
            $table->string('Nombre', 32);
            $table->string('ApellidoPaterno', 32);
            $table->string('ApellidoMaterno', 32)->nullable();
            $table->string('Correo', 64)->nullable(); //solicitar 1 correo valido para ligarlo a la tabla user
            $table->string('Celular', 64)->nullable();
            $table->string('Telefono', 64)->nullable();
            $table->string('Direccion1', 64)->nullable();
            $table->string('Direccion2', 64)->nullable();
            $table->string('Direccion3', 64)->nullable();
            $table->string('NoIMSS', 13)->nullable();
            $table->string('DatoEmergencia', 196)->nullable();
            $table->string('Foto', 128)->nullable();
            $table->boolean('Activo')->nullable()->default(1);
            $table->date('fechaAlta')->nullable();
            $table->date('fechaBaja')->nullable();
            $table->string('MotivoBaja')->nullable();

            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('org3_puesto_id')->nullable()->constrained()->nullOnDelete();

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('org4_empleados');
    }
};
