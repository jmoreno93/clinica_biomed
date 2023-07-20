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
        Schema::create('paciente', function (Blueprint $table) {
            $table->char('dni', 8)->primary()->unique()->nullable(false);
            $table->string('nombre_pac', 60)->nullable(false);
            $table->string('apellido_pac', 70)->nullable(false);
            $table->date('fecha_nac')->nullable(false);
            $table->char('sexo', 1)->nullable(false);
            $table->string('direccion', 100)->nullable(false);
            $table->char('telefono', 9)->nullable(false);
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
        Schema::dropIfExists('paciente');
    }
};
