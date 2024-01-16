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
        Schema::create('articulos', function (Blueprint $table) {
            // Completar con los campos que queremos que contenta la tabla 'articulos':
            $table->id(); # Columna de tipo integer autoincremental (equivalente a UNSIGNED INTEGER)
            $table->string('titulo'); # Columna de tipo string (equivalente a VARCHAR)
            $table->text('contenido'); # Columna de tipo text (equivalente a TEXT)
            $table->timestamps(); # Crea las columnas created_at y updated_at de tipo TIMESTAMP.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articulos');
    }
};
