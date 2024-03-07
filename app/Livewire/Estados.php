<?php

namespace App\Livewire;

use App\Models\Estado;
use Livewire\Component;

class Estados extends Component
{
    public $estados;

    public function desactivar($id){
        $estado = Estado::find($id);

        $estado->status = false; 
        $estado->save();

        $this->refreshEstados();
    }

    public function activar($id){
        $estado = Estado::find($id);

        $estado->status = true;
        $estado->save();

        $this->refreshEstados();
    }

    public function refreshEstados()
    {
        $this->estados = Estado::all();
    }

    public function mount(){
        $this->estados = Estado::all();
    }

    public function render()
    {
        return view('livewire.estados');
    }
}
