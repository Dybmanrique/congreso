<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Autor extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'autores';

    protected $fillable = [
        'persona_id',
        'orcid_id',
        'uuid'
    ];

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }

    // public function ponencias()
    // {
    //     return $this->belongsToMany(Ponencia::class, 'autores_ponencia');
    // }

    // public function institucion()
    // {
    //     return $this->belongsTo(Institucion::class);
    // }

    // public function grupoInvestigacion()
    // {
    //     return $this->belongsTo(GrupoInvestigacion::class);
    // }
}
