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
        Schema::create('cita', function (Blueprint $table) {
            $table->id('id_cita')->autoIncrement()->nullable(false);
            $table->char('dni', 8)->nullable(false);
            $table->unsignedBigInteger('id_doctor')->nullable(false);
            $table->date('fecha_cita')->nullable(false);
            $table->time('hora_cita')->nullable(false);
            $table->timestamps();

            $table->foreign('dni')
                ->references('dni')
                ->on('paciente')
                ->onDelete('cascade');

            $table->foreign('id_doctor')
                ->references('id_doctor')
                ->on('doctor')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cita');
    }
};
