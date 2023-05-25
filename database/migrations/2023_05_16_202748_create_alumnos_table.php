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
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->string("matricula");
            $table->string("nombre");
            $table->date("fecha_nacimiento");
            $table->string("telefono");
            $table->string("email") -> nullable();
            $table->unsignedBigInteger('nivel_id');
            $table->timestamps();
            $table->foreign("nivel_id")->references("id")-> on("nivels");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnos');
    }
};
