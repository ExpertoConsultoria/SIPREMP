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
        Schema::create('org5_mensajes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();

            $table->string('Mensaje', 160);
            $table->tinyInteger('Prioridad'); // 1:baja, 2:media, 3:alta
            $table->string('tipo', 20); // Comentario, Informacion, logro, Aviso, Advertencia, Riesgo/Peligro
            $table->string('status'); //Sin iniciar, En proceso, Finalizada
            $table->string('reglas')->nullable();
            $table->string('model');
            $table->integer('model_id');
            $table->dateTime('caducaXtiempo')->nullable();
            $table->string('caducaXtarea')->nullable();

            $table->foreignId('user_id');
            $table->json('Destinatarios_ids');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('org5_mensajes');
    }
};
