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

    public function todos_los_documentos()
    {
        return $this->belongsToMany(TipoDocumento::class, 'documentos', 'persona_id', 'tipo_documento_id')->withPivot('numero');
    }
}
