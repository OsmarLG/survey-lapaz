<div>
    <!-- BOTON -->
    <div class=" p-2 ">
        <button wire:click="openModal" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Registrar Nuevo Usuario
        </button>
    </div>

    <!-- Ventana modal -->
    <div wire:ignore.self class="fixed z-10 inset-0 overflow-y-auto" x-data="{ showModal: @entangle('isModalOpen') }" x-show="showModal" x-cloak>
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true" x-show="showModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <!-- Contenido de la ventana modal -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" x-show="showModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <!-- Contenido del formulario de registro -->
                    <h3 class="text-lg font-medium text-gray-900 mb-6">Registrar Usuario</h3>
                    <form wire:submit.prevent="registerUser">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nombre</label>
                            <input type="text" wire:model="name" id="name" class="w-full px-3 py-2 border rounded-md" required>
                            @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4">
                            <label for="username" class="block text-gray-700 text-sm font-bold mb-2">Nombre de Usuario</label>
                            <input type="username" wire:model="username" id="username" class="w-full px-3 py-2 border rounded-md" required>
                            @error('username') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4">
                            <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Contraseña</label>
                            <input type="password" wire:model="password" id="password" class="w-full px-3 py-2 border rounded-md" required>
                        </div>
                        <div class="mb-4">
                            <label for="user_type" class="block text-gray-700 text-sm font-bold mb-2">Tipo de Usuario</label>
                            <select wire:model="userType" id="user_type" class="w-full px-3 py-2 border rounded-md" required>
                                <option value="">Seleccionar tipo de usuario</option>
                                @foreach($userTypes as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Otros campos del formulario de registro -->
                        <!-- Botones de "Cancelar" y "Registrar" -->
                        <div class="mt-4 flex justify-end">
                            <button type="button" wire:click="closeModal" class="mr-2 text-gray-600 hover:text-gray-800">Cancelar</button>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Ventana Edit -->
    <div wire:ignore.self class="fixed z-10 inset-0 overflow-y-auto" x-data="{ showModal: @entangle('isEditOpen') }" x-show="showModal" x-cloak>
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true" x-show="showModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

        <!-- Contenido de la ventana modal -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" x-show="showModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <!-- Contenido del formulario de edicion -->
                    <h3 class="text-lg font-medium text-gray-900 mb-6">Editar Usuario</h3>
                    <form wire:submit.prevent="editUser">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nombre</label>
                            <input type="text" wire:model="name" id="name" class="w-full px-3 py-2 border rounded-md" required>
                            @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4">
                            <label for="username" class="block text-gray-700 text-sm font-bold mb-2">Nombre de Usuario</label>
                            <input type="username" wire:model="username" id="username" class="w-full px-3 py-2 border rounded-md" required>
                            @error('username') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4">
                            <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Contraseña</label>
                            <input type="password" wire:model="password" id="password" class="w-full px-3 py-2 border rounded-md">
                            @error('password') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4">
                            <label for="user_type" class="block text-gray-700 text-sm font-bold mb-2">Tipo de Usuario</label>
                            <select wire:model="userType" id="user_type" class="w-full px-3 py-2 border rounded-md" required>
                                <option value="">Seleccionar tipo de usuario</option>
                                @foreach($userTypes as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Otros campos del formulario de registro -->
                        <!-- Botones de "Cancelar" y "Registrar" -->
                        <div class="mt-4 flex justify-end">
                            <button type="button" wire:click="close_Editar" class="mr-2 text-gray-600 hover:text-gray-800">Cancelar</button>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Ventana Eliminar -->
    <div wire:ignore.self class="fixed z-10 inset-0 overflow-y-auto" x-data="{ showModal: @entangle('isDeleteOpen') }" x-show="showModal" x-cloak>
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true" x-show="showModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

        <!-- Contenido de la ventana modal -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" x-show="showModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <!-- Contenido del formulario de edicion -->
                    <h3 class="text-lg font-medium text-gray-900 mb-6">Eliminar Usuario</h3>
                    <form wire:submit.prevent="deleteUser">
                        @csrf
                        <div class="mb-4">
                            <h3>¿Estas seguro de eliminar al usuario <span class=" font-bold">{{ $username }}</span> ?</h3>

                            <p class=" text-red-600 mt-3"> <span class=" text-red-700 font-bold">¡ALERTA! </span> Una vez realizado la eliminaci&oacute;n del usuario se perderan todos los registros de Encuestas realizados por el usuario.</p>
                        </div>
                        <!-- Otros campos del formulario de registro -->
                        <!-- Botones de "Cancelar" y "Registrar" -->
                        <div class="mt-4 flex justify-end">
                            <button type="button" wire:click="close_Delete" class="mr-2 text-gray-600 hover:text-gray-800">Cancelar</button>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Eliminar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <div class="relative overflow-x-auto shadow-md sm:rounded-lg md:mx-[50px] my-[25px]">
        <table class="w-full text-sm text-left text-gray-700 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nombre
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Username
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tipo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Acciones
                    </th>
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $key=>$user)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap" id="casilla">
                            <span id="span{{$user->id}}">{{$user->name}}</span>
                        </td>
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap" id="casilla">
                            <span id="span{{$user->id}}">{{$user->username}}</span>
                        </td>
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap" id="casilla">
                            <span id="span{{$user->id}}">{{$user->tipo}}</span>
                        </td>
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap" id="casilla">
                            @if ($user->status)
                                <span id="span{{$user->id}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Activo</span>
                            @else
                                <span id="span{{$user->id}}" class="font-medium text-red-600 dark:text-red-500 hover:underline">Inactivo</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-center flex justify-center gap-4">
                            @if ($user->status)
                                <button class="bg-orange-500 rounded-lg">                            
                                    <a href="#" class="font-medium text-white hover:underline p-2" wire:click='desactivar({{$user->id}})'>Desactivar</a>
                                </button>
                            @else
                                <button class="bg-blue-600 rounded-lg">                            
                                    <a href="#" class="font-medium text-white hover:underline p-2" wire:click='activar({{$user->id}})'>Activar</a>
                                </button>
                            @endif
                            
                            <button class="bg-yellow-500 rounded-lg">
                                <a href="#" class="font-medium text-white hover:underline p-2" wire:click='show_Editar({{$user->id}})'>Editar</a>
                            </button>
                            <button class="bg-red-600 rounded-lg">
                                <a href="#" class="font-medium text-white hover:underline p-2" wire:click='show_Delete({{$user->id}})'>Eliminar</a>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
      
    </div>
</div>
