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
        Schema::create('plan3_componentes', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('NoComponente');
            $table->string('DescComponente', 255);
            $table->foreignId('plan2_proposito_id')->constrained()->restrictOnDelete();
            $table->foreignId('plan1_fin_id')->constrained()->restrictOnDelete();
            $table->foreignId('user_id')->constrained()->restrictOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plan3_componentes');
    }
};
