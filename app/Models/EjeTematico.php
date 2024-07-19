<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EjeTematico extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'eje_tematicos';

    protected $fillable = [
        'nombre',
    ];

    public function ponente_ponencias()
    {
        return $this->hasMany(PonentePonencia::class);
    }
}
