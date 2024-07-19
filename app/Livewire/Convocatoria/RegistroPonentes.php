<?php

namespace App\Livewire\Convocatoria;

use App\Models\Autor;
use App\Models\Documento;
use App\Models\GrupoInvestigacion;
use App\Models\Institucion;
use App\Models\Persona;
use App\Models\Ponencia;
use App\Models\Ponente;
use App\Models\TipoDocumento;
use Livewire\Component;
use Livewire\WithFileUploads;

class RegistroPonentes extends Component
{
    use WithFileUploads;

    public $ponencia, $titulo, $resumen, $nombres,  $ap_paterno, $ap_materno, $correo, $celular, $tipo_documento_id, $numero_documento, $tiposDocumento,
        $grupoInvestigacion, $documento, $persona_id, $grupo_investigacion_id, $institucion_id, $orcid_id, $cv_resumen, $foto, $instit, $Grupo_Investigacion, $nombre_grupo, $nombre_institucion, $valorNombreGrupo;
    public $ejesTematicos, $eje_tematico_id, $grupo_investigacion_add, $institucion_add;

    public function validateForm()
    {

        $this->validate([
            'titulo' => 'required|max:255',
            'resumen' => 'required',
            'nombres' => 'required|max:255',
            'ap_paterno' => 'required|max:255',
            'ap_materno' => 'required|max:255',
            'correo' => 'required|email|unique:personas',
            'celular' => 'required|numeric',
            'tipo_documento_id' => 'required|integer',
            'numero_documento' => 'required|unique:documentos,numero',
            'grupo_investigacion_id' => 'required',
            'institucion_id' => 'required',
            'orcid_id' => 'required',
            'cv_resumen' => 'required',
            'foto' => 'image|max:5605',
        ], [
            'ap_paterno.required' => 'Ingrese su apellido paterno',
            'ap_materno.required' => 'Ingrese su apellido materno',
            'tipo_documento_id.required' => 'Seleccione el tipo de documento',
            'numero_documento.required' => 'Ingrese su numero de documento',
            'grupo_investigacion_id.required' => 'Seleccione su grupo de investigacion o agregue si no existe',
            'institucion_id.required' => 'Seleccione su institucion o agregue si no existe',
            'orcid_id.required' => 'Ingrese su orcid_id',
            'cv_resumen.required' => 'Ingrese resumen de su CV',
        ]);
    }
    public function submitForm()
    {
        $this->registrarPonencia();

        $this->dispatch('closePonenciaModal');
        $this->dispatch('showPonenciaSuccessAlert');
    }

    public function mount()
    {
        $this->tiposDocumento = TipoDocumento::all();
        $this->grupoInvestigacion = GrupoInvestigacion::all();
        $this->instit = Institucion::all();
    }

    public function registrarPonencia()
    {
        try {
            //validamos los datos del formulario
            $this->validateForm();
    
            $ponencia = new Ponencia();
            $ponencia->titulo = $this->titulo;
            $ponencia->resumen = $this->resumen;
            $ponencia->save();
    
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
    
            $Autor = new Autor();
            $Autor->persona_id = $persona->id;
    
            $Autor->grupo_investigacion_id = $this->grupo_investigacion_id;
            $Autor->institucion_id = $this->institucion_id;
            $Autor->orcid_id = $this->orcid_id;
            $Autor->save();
    
            //crea un nuevo registro en la tabla intermedia con los IDs del Autor y la Ponencia
            $ponencia->autores()->attach($Autor->id);
    
            $nombreFoto = $this->foto->store('fotos', 'public');
    
            $Ponente = new Ponente();
            $Ponente->autor_id = $Autor->id;
            $Ponente->cv_resumen = $this->cv_resumen;
            $Ponente->foto =  $nombreFoto;
            $Ponente->save();
            $ponencia->ponentes()->attach($Ponente->id);
    
            // Limpia los campos
            $this->reset([
                'titulo', 'resumen', 'nombres', 'ap_paterno', 'ap_materno', 'correo', 'celular', 'tipo_documento_id', 'numero_documento',
                'grupo_investigacion_id', 'institucion_id', 'orcid_id', 'cv_resumen', 'foto'
            ]);
        } catch (\Throwable $th) {
            // session()->flash('message', $th);
        }
    }

    function registrar_grupo() {
        $this->validate([
            'grupo_investigacion_add' => 'required|max:255|string'
        ]);

        $grupo_agregado = GrupoInvestigacion::create([
            'nombre' => $this->grupo_investigacion_add
        ]);
        $this->grupoInvestigacion = GrupoInvestigacion::all();
        // $this->grupo_investigacion_id = $grupo_agregado->id;
        $this->dispatch('grupoAgregado', id: $grupo_agregado->id);
        $this->reset(['grupo_investigacion_add']);
    }

    function registrar_institucion() {
        $this->validate([
            'institucion_add' => 'required|max:255|string'
        ]);

        $institucion_agregada = Institucion::create([
            'nombre' => $this->institucion_add
        ]);
        $this->instit = Institucion::all();
        // $this->institucion_id = $institucion_agregada->id;
        $this->dispatch('institucionAgregada', id: $institucion_agregada->id, nombre: $institucion_agregada->nombre);
        $this->reset(['institucion_add']);
    }

    public function render()
    {
        return view('livewire.convocatoria.registro-ponentes');
    }
}
