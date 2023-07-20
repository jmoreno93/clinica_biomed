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
        Schema::create('doctor', function (Blueprint $table) {
            $table->id('id_doctor')->autoIncrement()->nullable(false);
            $table->unsignedBigInteger('id_especialidad')->nullable(false);
            $table->string('nombre_doc', 60)->nullable(false);
            $table->string('apellido_doc', 70)->nullable(false);
            $table->timestamps();
            $table->foreign('id_especialidad')
                ->references('id')
                ->on('especialidad')
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
        Schema::dropIfExists('doctor');
    }
};
