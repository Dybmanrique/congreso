<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PonentesController extends Controller
{
    function index()
    {
        return view('admin.ponentes.index');
    }
    function data() {
        $ponentes = DB::select("SELECT ponentes_ponencia.id, ponentes_ponencia.estado, ponentes_ponencia.uuid, titulo, resumen, enlace as paper, eje_tematicos.nombre as eje_tematico, cv_resumen, foto, 
            orcid_id, ap_paterno, ap_materno, nombres, correo, celular, instituciones.nombre as institucion, grupos_investigacion.nombre as grupo_investigacion, persona_id, comprobantes.fecha_pago, comprobantes.monto, comprobantes.imagen_comprobante
            from ponentes_ponencia
            join ponencias on ponencias.id = ponentes_ponencia.ponencia_id
            left join papers on papers.ponencia_id = ponencias.id
            join eje_tematicos on eje_tematicos.id = ponentes_ponencia.eje_tematico_id
            join ponentes on ponentes.id = ponentes_ponencia.ponente_id
            join autores on autores.id = ponentes.autor_id
            join personas on personas.id = autores.persona_id
            join instituciones on instituciones.id = autores.institucion_id
            join grupos_investigacion on grupos_investigacion.id = autores.grupo_investigacion_id   
            left join pagos_ponencia on pagos_ponencia.ponente_ponencia_id = ponentes_ponencia.id
            left join comprobantes on comprobantes.id = pagos_ponencia.comprobante_id order by ponentes_ponencia.id desc");

        foreach ($ponentes as $ponente) {
            $ponente->identificaciones = Persona::find($ponente->persona_id)->todos_los_documentos()->get();
        }
        return $ponentes;
    }
}
