<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicos extends Model
{
    use HasFactory;

    protected  $table = 'medicos';

    protected $primaryKey = 'cd_medico';

    protected $fillable = [
        'cd_medico',
        'nm_medico',
        'created_at',
        'updated_at'
    ];
}
