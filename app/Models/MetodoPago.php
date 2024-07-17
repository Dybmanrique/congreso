<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MetodoPago extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'metodo'
    ];

    protected $table = "metodos_pago";
}
