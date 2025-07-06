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
        Schema::create('programas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_programa');
            $table->text('descripcion_programa')->nullable();
            $table->string('imagen')->nullable();

            $table->boolean('requiere_titulo_bachiller')->default(false);
            $table->boolean('requiere_icfes')->default(false);
            $table->boolean('requiere_certificado_medico')->default(false);
            $table->boolean('requiere_prueba_ingreso')->default(false);

            $table->string('instructor_lider')->nullable();
            $table->text('implementos_requeridos')->nullable();
            $table->integer('cantidad_instructores')->default(0);
            $table->text('detalle_instructores')->nullable();

            $table->foreignId('area_id')
                ->constrained('areas')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programas');
    }
};
