<?php

namespace App\Http\Controllers\Convocatoria;

use App\Http\Controllers\Controller;
use App\Models\PonentePonencia;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ValidarPonenciaController extends Controller
{
    public function index($uuid){
        $ponente_ponencia = PonentePonencia::where('uuid', $uuid)->first();

        if (!$ponente_ponencia) {
            throw new HttpException(404, 'Forbidden');
        }

        return view('convocatoria.validar-ponencia', compact('ponente_ponencia'));
    }
}
