<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Encuesta;
use App\Models\User;

class Encuestas extends Component
{
    public $encuestas;
    public $selectedOption;
    public $fecha;
    public $username;

    public $informado; // Agrega propiedades para campos de edición
    public $conoce; // Agrega propiedades para campos de edición
    public $decision; // Agrega propiedades para campos de edición
    public $folio; // Agrega propiedades para campos de edición
    public $encuestaId;
    public $encuesta;

    public $isModalOpen = false;
    public $isEditOpen = false;
    public $isDeleteOpen = false;


    public function changeOption($option)
    {
        $this->selectedOption = $option;
    }

    public function actualizarFecha(){
        if($this->fecha != null){
            if($this->username != null){
                $user = User::where('username', $this->username)->first();
                
                if ($user) {
                    $this->encuestas = Encuesta::where('user_id', $user->id)->where('created_at', $this->fecha)->get();
                }
            }
            $this->encuestas = Encuesta::whereDate('created_at', $this->fecha)->get();
        }
        else {
            $this->encuestas = Encuesta::all();
        }
    }

    public function actualizarUsername()
    {
        if ($this->username != null) {
            $user = User::where('username', $this->username)->first();
    
            if ($user) {
                
                if($this->fecha != null){
                    $this->encuestas = Encuesta::where('user_id', $user->id)->where('created_at', $this->fecha)->get();
                }
                $this->encuestas = Encuesta::where('user_id', $user->id)->get();

            } else {
                // Usuario no encontrado, puedes manejarlo aquí según tus necesidades
            }

        } else {
            $this->encuestas = Encuesta::all();
        }
    }
    


    public function mount()
    {
        $this->encuestas = Encuesta::all();
        $this->selectedOption = 'articulo'; // Asigna el valor por defecto "Artículo"
    }

    public function render()
    {

        return view('livewire.encuestas');
    }

    public function openModal()
    {
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;

        
        // Limpiar los campos del formulario
        $this->resetForm();

        $this->refreshEncuestas();
    }

    public function show_Editar($id)
    {
        $this->encuesta = Encuesta::find($id);

        $this->conoce = $this->encuesta->conoce;
        $this->informado = $this->encuesta->informado;
        // $this->password = $this->userF->password;
        $this->decision = $this->encuesta->decision;

        $this->isEditOpen = true;
    }

    public function close_Editar()
    {
        $this->isEditOpen = false;

        
        // Limpiar los campos del formulario
        $this->resetForm();

        $this->refreshEncuestas();
    }

    public function show_Delete($id)
    {
        $this->encuesta = Encuesta::find($id);

        $this->folio = $this->encuesta->folio;

        $this->isDeleteOpen = true;
    }

    public function close_Delete()
    {
        $this->isDeleteOpen = false;

        
        // Limpiar los campos del formulario
        $this->resetForm();

        $this->refreshEncuestas();
    }

    private function resetForm()
    {
        $this->conoce = '';
        $this->informado = '';
        $this->decision = '';
        $this->encuesta = '';

    }

    public function refreshEncuestas()
    {
        $this->encuestas = Encuesta::all();
    }

    public function editEncuesta()
    {
        
        // 1. Encontrar el registro del usuario
        $survey = Encuesta::find($this->encuesta->id);

        if ($survey) {
            $survey->conoce = $this->conoce;
            $survey->informado = $this->informado;
            $survey->decision = $this->decision;

            // 3. Guardar los cambios en la base de datos
            $survey->save();
        }

        // Cerrar la ventana modal después de registrar al usuario
        $this->close_Editar();

        // Limpiar los campos del formulario
        $this->resetForm();

        $this->refreshEncuestas();
    }

    public function deleteEncuesta(){
        $survey = Encuesta::find($this->encuesta->id);

        $survey->delete();

        // Cerrar la ventana modal después de registrar al usuario
        $this->close_Delete();

        // Limpiar los campos del formulario
        $this->resetForm();

        $this->refreshencuestas();
    }
}
