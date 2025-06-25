<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::create('espacios', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('sede_id');
        $table->string('numero')->nullable(); // Número o nombre del espacio
        $table->boolean('disponible')->default(true);
        $table->timestamps();

        $table->foreign('sede_id')->references('id')->on('sedes')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('espacios');
    }
};

