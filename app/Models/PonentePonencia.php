<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PonentePonencia extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'ponentes_ponencia';

    protected $fillable = [
        'estado',
        'es_valido',
        'uuid',
        'ponente_id',
        'ponencia_id',
        'eje_tematico_id',
    ];

    public function eje_tematico()
    {
        return $this->belongsTo(EjeTematico::class);
    }
}
