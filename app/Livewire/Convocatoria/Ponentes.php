<?php

namespace App\Livewire\Convocatoria;

use App\Models\Ponente;
use Livewire\Component;

class Ponentes extends Component
{
    public $ponentes;

    public function mount()
    {
        $this->ponentes = Ponente::with('autor.persona')->get();

        $this->ponentes = Ponente::whereHas('ponencias', function ($query) {
            $query->where('estado', 1);
        })->with('autor.persona')->get();
    }

    public function render()
    {
        return view('livewire.convocatoria.ponentes');
    }
}
