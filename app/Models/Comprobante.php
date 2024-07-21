<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comprobante extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "comprobantes";

    protected $fillable = [
        'fecha_pago',
        'monto',
        'imagen_comprobante',
        'metodo_pago_id',
        'uuid'
    ];

    public function registro_congreso()
    {
        return $this->belongsTo(RegistroCongreso::class);
    }
    public function metodo_pago()
    {
        return $this->belongsTo(MetodoPago::class);
    }
}
