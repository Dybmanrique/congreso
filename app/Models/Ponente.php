<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ponente extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'ponentes';

    protected $fillable = [
        'autor_id',
        'cv_resumen',
        'foto',
        'uuid'
    ];

    public function autor()
    {
        return $this->belongsTo(Autor::class);
    }
    
    public function ponencias()
    {   
        return $this->belongsToMany(Ponencia::class, 'ponentes_ponencia');
    }
}
