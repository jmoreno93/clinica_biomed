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
        Schema::create('medicamento', function (Blueprint $table) {
            $table->id('id_medicamento')->autoIncrement()->nullable(false);
            $table->string('nombre_medicamento')->nullable(false);
            $table->string('presentacion', 20)->nullable(false);
            $table->enum('tipo', ['pastilla', 'capsula', 'jarabe', 'inyectable'])->nullable(false);
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
        Schema::dropIfExists('medicamento');
    }
};
