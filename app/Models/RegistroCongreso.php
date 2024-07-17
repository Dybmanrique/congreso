<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RegistroCongreso extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'registro_congreso';

    protected $fillable = [
        'participante_id',
        'comprobante_id',
        'uuid'
    ];

    public function participante()
    {
        return $this->belongsTo(Participante::class);
    }

    public function comprobante()
    {
        return $this->hasOne(Comprobante::class);
    }
}
