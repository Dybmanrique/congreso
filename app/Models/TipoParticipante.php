<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoParticipante extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "tipos_participantes";
    
    protected $fillable = [
        'tipo'
    ];

    public function participantes()
    {
        return $this->hasMany(Participante::class);
    }
}
