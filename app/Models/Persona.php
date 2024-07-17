<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Persona extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'personas';

    protected $fillable = [
        'uuid'
    ];

    public function documentos()
    {
        return $this->hasMany(Documento::class);
    }

    // public function participante()
    // {
    //     return $this->hasOne(Participante::class);
    // }

    // public function organizador()
    // {
    //     return $this->hasOne(Organizador::class);
    // }
    // public function autor()
    // {
    //     return $this->hasOne(Autor::class);
    // }
}
