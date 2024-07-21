<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PagoPonencia extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = "pagos_ponencia";

    protected $fillable = [
        'fecha_registro',
        'comprobante_id',
        'ponente_ponencia_id'
    ];

}
