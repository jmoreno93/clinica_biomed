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
        Schema::create('diagnostico_detalle', function (Blueprint $table) {
            $table->id('id_diagnostico_detalle')->autoIncrement()->nullable(false);
            $table->unsignedBigInteger('id_diagnostico')->nullable(false);
            $table->unsignedBigInteger('id_medicamento')->nullable(false);
            $table->string('detalle', 400)->nullable(false);
            $table->timestamps();
            $table->foreign('id_diagnostico')
                ->references('id_diagnostico')
                ->on('diagnostico')
                ->onDelete('cascade');
            $table->foreign('id_medicamento')
                ->references('id_medicamento')
                ->on('medicamento')
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
        Schema::dropIfExists('diagnostico_detalle');
    }
};
