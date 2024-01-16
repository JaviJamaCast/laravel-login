<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pokemon', function (Blueprint $table) {
            $table->id(); # Columna de tipo integer autoincremental (equivalente a UNSIGNED INTEGER)
            $table->string('nombre'); # Columna de tipo string (equivalente a VARCHAR)
            $table->text('tipo'); # Columna de tipo text (equivalente a TEXT)
            $table->integer('ataque');
            $table->integer('defensa');
            $table->date('adquisicion');
            $table->timestamps(); # Crea las columnas created_at y updated_at de tipo TIMESTAMP.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pokemon');
    }
};
