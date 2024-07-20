<?php

namespace App\Livewire\Convocatoria;

use App\Models\Comprobante;
use App\Models\Documento;
use App\Models\MetodoPago;
use App\Models\Participante;
use App\Models\Persona;
use App\Models\RegistroCongreso;
use App\Models\TipoDocumento;
use App\Models\TipoParticipante;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class RegistroParticipantes extends Component
{
    use WithFileUploads;
    // use LivewireAlert;

    public $tiposDocumento, $tiposParticipante, $nombres,  $ap_paterno, $ap_materno, $correo, $celular, $tipo_documento_id, $numero_documento,
        $documento, $persona_id;
    public $metodoPago, $tipo_participante_id, $metodo_pago_id, $fecha_pago, $monto, $imagen_comprobante, $fecha_registro;

    public $participantes;

    public function mount()
    {
        $this->tiposDocumento = TipoDocumento::all();
        $this->tiposParticipante = TipoParticipante::all();
        $this->metodoPago = MetodoPago::all();
        $this->participantes = Participante::all();
    }

    public function validateForm()
    {
        $this->validate([
            'nombres' => 'required|max:255',
            'ap_paterno' => 'required|max:255',
            'ap_materno' => 'required|max:255',
            'correo' => 'required|email|unique:personas',
            'celular' => 'required|numeric',
            'tipo_documento_id' => 'required|integer',
            'numero_documento' => 'required|unique:documentos,numero',
            'tipo_participante_id' => 'required|integer',
            'metodo_pago_id' => 'required|integer',
            'fecha_pago' => 'required|date',
            'monto' => 'required|numeric',
            'imagen_comprobante' => 'image|max  :4098',
        ], [
            'nombres.required' => 'Ingrese sus nombres',
            'ap_paterno.required' => 'Ingrese su apellido paterno',
            'ap_materno.required' => 'Ingrese su apellido materno',
            'correo.required' => 'Ingrese un correo o este correo ya ha sido registrado',
            'celular.required' => 'Ingrese su numero de celular',
            'tipo_documento_id.required' => 'Seleccione el tipo de documento',
            'numero_documento.required' => 'Ingrese su numero de documento',
            'tipo_participante_id' => 'Seleccione tipo de participante',
            'metodo_pago_id' => 'Seleccione metodo de pago',
            'fecha_pago' => 'Ingrese Fecha de pago',
            'monto' => 'Ingrese monto',
            'imagen_comprobante' => 'Suba su comprobante',

        ]);
    }

    public function submitForm()
    {
        $this->registrarParticipante();
        $this->dispatch('closeParticipanteModal');
        $this->dispatch('showParticipanteSuccessAlert');
    }

    public function registrarParticipante()
    {
        try {
            //validamos los datos del formulario
            $this->validateForm();
    
            // Luego de validar, puedes continuar con la creación de tus modelos...
    
            // Luego, crea una nueva persona con los datos del formulario
            $persona = new Persona();
            $persona->nombres = $this->nombres;
            $persona->ap_paterno = $this->ap_paterno;
            $persona->ap_materno = $this->ap_materno;
            $persona->correo = $this->correo;
            $persona->celular = $this->celular;
            $persona->save();
    
            // Después de guardar la persona, crea un nuevo documento con los datos del formulario
            $documento = new Documento();
            $documento->tipo_documento_id = $this->tipo_documento_id;
            $documento->persona_id = $persona->id;
            $documento->numero = $this->numero_documento;
            $documento->save();
    
            $participante = new Participante();
            $participante->persona_id = $persona->id;
            $participante->tipo_participante_id = $this->tipo_participante_id;
            $participante->save();
    
            $nombreFoto = $this->imagen_comprobante->store('comprobantes', 'public');

            $comprobante = new Comprobante();
            $comprobante->metodo_pago_id = $this->metodo_pago_id;
            $comprobante->fecha_pago = $this->fecha_pago;
            $comprobante->monto = $this->monto;
            $comprobante->imagen_comprobante = $nombreFoto;
            $comprobante->save();
    
            $registro_congreso = new RegistroCongreso();
            $registro_congreso->participante_id = $participante->id;
            $registro_congreso->fecha_registro  = date('Y-m-d');
            $registro_congreso->comprobante_id = $comprobante->id;
            $registro_congreso->save();
    
            // Limpia los campos
            $this->nombres = '';
            $this->ap_paterno = '';
            $this->ap_materno = '';
            $this->correo = '';
            $this->celular = '';
            $this->tipo_documento_id = '';
            $this->numero_documento = '';
            $this->tipo_participante_id = '';
            $this->metodo_pago_id = '';
            $this->fecha_pago = '';
            $this->monto = '';
            $this->imagen_comprobante = '';
            $this->fecha_registro = '';

        } catch (\Exception $ex) {
            $this->dispatch('error');
        }
    }

    public function render()
    {
        return view('livewire.convocatoria.registro-participantes');
    }
}
