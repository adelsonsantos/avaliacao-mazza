<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pacientes extends Model
{
    use HasFactory;

    
    protected  $table = 'pacientes';

    protected $primaryKey = 'cd_paciente';

    protected $fillable = [
        'cd_paciente',
        'nm_paciente',
        'created_at',
        'updated_at'
    ];
}
