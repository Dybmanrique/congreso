<?php

namespace App\Livewire\Convocatoria;

use App\Models\Comprobante;
use App\Models\MetodoPago;
use App\Models\PagoPonencia;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormValidarPonencia extends Component
{
    use WithFileUploads;

    public $ponente_ponencia;
    public $metodosPago;

    public $fecha_pago, $monto, $metodo_pago_id, $imagen_comprobante;

    public function registrarComprobante() {
        $this->validate([
            'metodo_pago_id' => 'required|integer',
            'fecha_pago' => 'required|date',
            'monto' => 'required|numeric',
            'imagen_comprobante' => 'image|max:4098',
        ]);

        $nombreFoto = $this->imagen_comprobante->store('comprobantes', 'public');

        $comprobante = Comprobante::create([
            'metodo_pago_id' => $this->metodo_pago_id,
            'fecha_pago' => $this->fecha_pago,
            'monto' => $this->monto,
            'imagen_comprobante' => $nombreFoto,
        ]);

        // date('Y-m-d')
        PagoPonencia::create([
            'fecha_registro' => date('Y-m-d'),
            'comprobante_id' => $comprobante->id,
            'ponente_ponencia_id' => $this->ponente_ponencia->id
        ]);

        $this->ponente_ponencia->update([
            'uuid' => null
        ]);

        return redirect()->route('convocatoria.agradecimiento');
    }

    public function mount() {
        $this->metodosPago = MetodoPago::all();
    }

    public function render()
    {
        return view('livewire.convocatoria.form-validar-ponencia');
    }
}
