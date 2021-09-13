<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendamentos', function (Blueprint $table) {
            $table->id('cd_agendamento');
            $table->date('dt_agendamento_inicio')->nullable(false);
            $table->char('hora_inicio', 5)->nullable(false);
            $table->date('dt_agendamento_final')->nullable(false);
            $table->char('hora_final', 5)->nullable(false);
            $table->string('ds_agendamento', 255)->nullable(false);
            $table->string('observacao', 255)->nullable();
            $table->integer('cd_medico')->nullable(false);
            $table->integer('cd_paciente')->nullable(false);    
            $table->timestamps();            
        });

        Schema::table('agendamentos', function (Blueprint $table){
            $table->foreign('cd_medico')->references('cd_medico')->on('medicos')->onDelete('cascade');
            $table->foreign('cd_paciente')->references('cd_paciente')->on('pacientes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agendamentos');
    }
}
