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
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id();
            $table->string('nombres', 100);
            $table->string('apellidos', 100);
            $table->integer('CI');
            $table->integer('edad');
            $table->date('fecha_nacimiento')->nullable();
            $table->boolean('estado');
            $table->string('email', 255)->unique();
            $table->timestamp('fecha_creacion')->useCurrent();
            $table->softDeletes(); // Para eliminación suave
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudiantes');
    }
};
