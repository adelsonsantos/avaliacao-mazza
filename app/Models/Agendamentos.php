<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamentos extends Model
{
    use HasFactory;
    
    protected  $table = 'agendamentos';

    protected $primaryKey = 'cd_agendamento';

    protected $fillable = [
        'cd_agendamento',
        'dt_agendamento_inicio',
        'hora_inicio',
        'dt_agendamento_final',
        'hora_final',
        'ds_agendamento',
        'observacao',
        'cd_medico',
        'cd_paciente'
    ];
}
