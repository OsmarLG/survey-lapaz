<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Usuarios extends Component
{
    public $users;
    public $userF;

    public $name;
    public $username;
    public $password;
    public $userType; // Propiedad para almacenar el tipo de usuario seleccionado
    public $status;

    // public $nameEdit;
    // public $usernameEdit;
    // public $passwordEdit;
    // public $userTypeEdit; // Propiedad para almacenar el tipo de usuario seleccionado

    public $isModalOpen = false;
    public $isEditOpen = false;
    public $isDeleteOpen = false;

    // Lista de opciones para el tipo de usuario
    public $userTypes = [
        'SURVEY' => 'SURVEY',
        'ADMIN' => 'ADMIN',
    ];

    public function openModal()
    {
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;

        
        // Limpiar los campos del formulario
        $this->resetForm();

        $this->refreshUsers();
    }

    public function show_Editar($id)
    {
        $this->userF = User::find($id);

        $this->name = $this->userF->name;
        $this->username = $this->userF->username;
        // $this->password = $this->userF->password;
        $this->userType = $this->userF->tipo;

        $this->isEditOpen = true;
    }

    public function close_Editar()
    {
        $this->isEditOpen = false;

        
        // Limpiar los campos del formulario
        $this->resetForm();

        $this->refreshUsers();
    }

    public function show_Delete($id)
    {
        $this->userF = User::find($id);

        $this->name = $this->userF->name;
        $this->username = $this->userF->username;
        // $this->password = $this->userF->password;
        $this->userType = $this->userF->tipo;

        $this->isDeleteOpen = true;
    }

    public function close_Delete()
    {
        $this->isDeleteOpen = false;

        
        // Limpiar los campos del formulario
        $this->resetForm();

        $this->refreshUsers();
    }

    public function registerUser()
    {
        // Validar los datos del formulario
        $this->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|unique:users,username',
            'password' => 'required|min:8',
        ]);

        // Crear un nuevo usuario en la base de datos
        User::create([
            'name' => $this->name,
            'username' => $this->username,
            'password' => bcrypt($this->password),
            'tipo' => $this->userType,
        ]);

        // Cerrar la ventana modal después de registrar al usuario
        $this->closeModal();

        // Limpiar los campos del formulario
        $this->resetForm();

        $this->refreshUsers();
    }

    public function editUser()
    {
        
        // 1. Encontrar el registro del usuario
        $user = User::find($this->userF->id);
        
        // Validar los datos del formulario
        $this->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|unique:users,username,'.$user->id,
        ]);

        if ($user) {
            // 2. Actualizar los campos necesarios
            $user->name = $this->name;
            $user->username = $this->username;

            // Si deseas actualizar la contraseña, puedes hacerlo de la siguiente manera:
            if (!empty($this->password)) {
                $this->validate([
                    'password' => 'required|min:8',
                ]);
                $user->password = bcrypt($this->password);
            }

            $user->tipo = $this->userType;

            // 3. Guardar los cambios en la base de datos
            $user->save();
        }

        // Cerrar la ventana modal después de registrar al usuario
        $this->close_Editar();

        // Limpiar los campos del formulario
        $this->resetForm();

        $this->refreshUsers();
    }

    public function deleteUser(){
        $user = User::find($this->userF->id);

        $user->delete();

        // Cerrar la ventana modal después de registrar al usuario
        $this->close_Delete();

        // Limpiar los campos del formulario
        $this->resetForm();

        $this->refreshUsers();
    }

    public function desactivar($id){
        $user = User::find($id);

        $user->status = false; 
        $user->save();

        $this->refreshUsers();
    }

    public function activar($id){
        $user = User::find($id);

        $user->status = true;
        $user->save();

        $this->refreshUsers();
    }

    private function resetForm()
    {
        $this->name = '';
        $this->username = '';
        $this->password = '';
        $this->userType = '';

        $this->userF = '';
    }

    public function refreshUsers()
    {
        $this->users = User::all();
    }

    public function mount(){
        $this->users = User::all();
    }

    public function render()
    {
        return view('livewire.usuarios');
    }
}
