<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Participante extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'participantes';

    protected $fillable = [
        'persona_id',
        'tipo_participante_id',
        'uuid'
    ];

    public function tipo_participante()
    {
        return $this->belongsTo(TipoParticipante::class);
    }
}
