<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ponencia extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'ponencias';
    protected $fillable = [
        'titulo',
        'resumen'
    ];
    public function ponentes()
    {
        return $this->belongsToMany(Ponente::class, 'ponentes_ponencia');
    }

    public function autores()
    {
        return $this->belongsToMany(Autor::class, 'autores_ponencia');
    }
}
