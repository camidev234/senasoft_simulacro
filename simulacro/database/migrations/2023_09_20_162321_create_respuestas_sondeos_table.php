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
        Schema::create('respuestas_sondeos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_usuario");
            $table->unsignedBigInteger("id_sondeo");
            $table->string("respuesta", 900);
            $table->foreign("id_usuario")->references('id')->on('users')->onDelete('cascade');
            $table->foreign("id_sondeo")->references('id')->on('sondeos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('respuestas_sondeos');
    }
};
