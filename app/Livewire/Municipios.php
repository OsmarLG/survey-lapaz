<?php

namespace App\Livewire;

use App\Models\Municipio;
use Livewire\Component;

class Municipios extends Component
{
    public $municipios;

    public function desactivar($id){
        $municipio = Municipio::find($id);

        $municipio->status = false; 
        $municipio->save();

        $this->refreshMunicipios();
    }

    public function activar($id){
        $municipio = Municipio::find($id);

        $municipio->status = true;
        $municipio->save();

        $this->refreshMunicipios();
    }

    public function refreshMunicipios()
    {
        $this->municipios = Municipio::all();
    }

    public function mount(){
        $this->municipios = Municipio::all();
    }

    public function render()
    {
        return view('livewire.municipios');
    }
}
