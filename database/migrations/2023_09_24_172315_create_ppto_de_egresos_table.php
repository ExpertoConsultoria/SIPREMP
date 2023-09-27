<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ppto_de_egresos', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->id();
            $table->smallInteger('Ejercicio');
            $table->string('CvePptal', 20); //Capi-Conc-Gen-Esp
            $table->mediumText('PartidaEspecifica');
            $table->integer('Movimiento'); //0:aprobado/1:modificado
            $table->decimal('Presupuesto', 13, 4); // Aprobado //modificado
            $table->tinyInteger('Mes')->nullable()->default(0);
            $table->decimal('Saldo', 13, 4)->nullable()->default(0.00);

            //$table->dateTime('FechaMov')->nullable();

            $table->decimal('Enero', 13, 4)->nullable()->default(0.00);
            $table->decimal('Febrero', 13, 4)->nullable()->default(0.00);
            $table->decimal('Marzo', 13, 4)->nullable()->default(0.00);
            $table->decimal('Abril', 13, 4)->nullable()->default(0.00);
            $table->decimal('Mayo', 13, 4)->nullable()->default(0.00);
            $table->decimal('Junio', 13, 4)->nullable()->default(0.00);
            $table->decimal('Julio', 13, 4)->nullable()->default(0.00);
            $table->decimal('Agosto', 13, 4)->nullable()->default(0.00);
            $table->decimal('Septiembre', 13, 4)->nullable()->default(0.00);
            $table->decimal('Octubre', 13, 4)->nullable()->default(0.00);
            $table->decimal('Noviembre', 13, 4)->nullable()->default(0.00);
            $table->decimal('Diciembre', 13, 4)->nullable()->default(0.00);

            $table->string('Nota', 196)->nullable();

            //La sede funge como UE;
            $table->foreignId('org1_sede_id')->nullable()->constrained()->nullOnDelete();

            $table->foreignId('ppto1_capitulo_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('ppto2_concepto_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('ppto3_part_generica_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('ppto4_part_especifica_id')->nullable()->constrained()->nullOnDelete();

            //usuario con permisos de edicion de presupuesto
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ppto_de_egresos');
    }
};
