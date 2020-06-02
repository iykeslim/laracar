<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTurnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turnos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('vehicle_types_id');
            $table->unsignedBigInteger('marcas_id');
            $table->unsignedBigInteger('model_types_id');
            $table->unsignedBigInteger('wash_types_id');
            $table->string('identificador')->unique();
            $table->date('fecha_turno')->unique();
            $table->string('precio');
            $table->string('color');
            $table->string('matricula');
            $table->boolean('recepcionado');
            $table->softDeletes();
            $table->timestamps();

            $table->index('client_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('turnos');
    }
}
