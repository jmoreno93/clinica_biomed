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
        Schema::create('diagnostico', function (Blueprint $table) {
            $table->id('id_diagnostico')->autoIncrement()->nullable(false);
            $table->unsignedBigInteger('id_cita')->nullable(false);
            $table->string('descripcion', 100)->nullable(false);
            $table->timestamps();
            $table->foreign('id_cita')
                ->references('id_cita')
                ->on('cita')
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
        Schema::dropIfExists('diagnostico');
    }
};
