<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Participante;
use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ParticipantesController extends Controller
{
    function index()
    {
        return view('admin.participantes.index');
    }
    function data()
    {
        $participantes = DB::select("SELECT registro_congreso.id, persona_id, date_format(fecha_registro, '%d-%m-%Y') as fecha_registro , es_valido, concat_ws( ' ', ap_paterno, ap_materno, nombres) as participante, correo, celular, 
            date_format(fecha_pago, '%d-%m-%Y') as fecha_pago, monto, descuento, imagen_comprobante, tipos_participantes.tipo, metodos_pago.metodo
            FROM registro_congreso
            join participantes on registro_congreso.participante_id = participantes.id
            join tipos_participantes on tipos_participantes.id = participantes.tipo_participante_id
            join personas on participantes.persona_id = personas.id
            join comprobantes on registro_congreso.comprobante_id = comprobantes.id
            join metodos_pago on metodos_pago.id = comprobantes.metodo_pago_id");

        foreach ($participantes as $participante) {
            // $participante->identificaciones = Persona::find($participante->persona_id)->documentos()->select(['individuals.id', 'last_name', 'second_last_name', 'name', 'identity_number', 'identity_document_id'])->with('identity_document:id,name')->get();
            $participante->identificaciones = Persona::find($participante->persona_id)->todos_los_documentos()->get();
        }
        return $participantes;
    }
}
