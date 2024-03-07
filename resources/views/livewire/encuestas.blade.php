<div>
    <div class=" bg-gray-50 shadow-md p-2 mb-4 border border-blue-50 rounded-lg">
        <label for="element-type" class="block text-sm font-medium text-gray-700">Seleccione un modo de vista:</label>
        <select wire:model="selectedOption" id="element-type" name="element-type" class="mt-1 block w-full border border-blue-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" wire:change="changeOption($event.target.value)">
            <option value="articulo">Artículo</option>
            <option value="tabla">Tabla</option>
            <option value="mapa">Mapa</option>
        </select>
    </div>

    @if ($selectedOption === 'articulo')

    <div class="bg-gray-50 shadow-md p-2 mb-4 border border-blue-50 rounded-lg">
        <label for="fecha" class="block text-sm font-medium text-gray-700">Buscar por fecha</label>
        <input 
            type="date" 
            wire:model="fecha" 
            id="fecha" 
            class="border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm rounded-md"
            wire:change='actualizarFecha'
        >
    </div>

    <div class="bg-gray-50 shadow-md p-2 mb-4 border border-blue-50 rounded-lg">
        <label for="fecha" class="block text-sm font-medium text-gray-700">Buscar por Usuario</label>
        <input 
            type="text" 
            wire:model="username"
            placeholder="Ingresa el usuario"
            id="username" 
            class="border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm rounded-md"
            wire:change='actualizarUsername'
        >
    </div>

        <div class="md:grid md:grid-cols-3 gap-4 p-2">
            @foreach($encuestas as $key=>$encuesta)
                    <div class="bg-white p-4 shadow-md rounded-md border border-blue-300 mt-2 hover:bg-blue-100 transition-all">
                        <p class="font-bold text-gray-600">Folio: <span class=" text-blue-700">{{ $encuesta->folio }}</span></p>
                        <div class="flex">
                            <p class="font-bold text-gray-600">Por: <span class="font-normal">{{ $encuesta->user->username }}</span></p>

                        </div>

                        <div class="mt-2">
                            <!--VER-->                            
                            <button class="bg-blue-500 rounded-lg" wire:click="show_Editar({{ $encuesta->id }})">
                                <a href="{{ route('encuestas.show', ['username' => $encuesta->user->username, 'encuesta_id' => $encuesta->id]) }}"><span class="font-medium text-xs text-white hover:underline p-2">Ver</span></a>
                            </button>
                            <!-- Botón de Editar -->
                                <button class="bg-yellow-500 rounded-lg" wire:click="show_Editar({{ $encuesta->id }})">
                                    <span class="font-medium text-xs text-white hover:underline p-2">Editar</span>
                                </button>

                                <!-- Botón de Eliminar -->
                                <button class="bg-red-600 rounded-lg" wire:click="show_Delete({{ $encuesta->id }})">
                                    <span class="font-medium text-xs text-white hover:underline p-2">Eliminar</span>
                                </button>
                        </div>

                        <div class="flex justify-between mt-2">
                            <p class=" text-sm text-gray-700">{{ $encuesta->distrito->nombre }}</p>
                            <p class="text-sm">{{ $encuesta->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
            @endforeach
        </div>
    @elseif ($selectedOption === 'tabla')

    <div class="bg-gray-50 shadow-md p-2 mb-4 border border-blue-50">
        <label for="fecha" class="block text-sm font-medium text-gray-700">Buscar por fecha</label>
        <input 
            type="date" 
            wire:model="fecha" 
            id="fecha" 
            class="border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm rounded-md"
            wire:change='actualizarFecha'
        >
    </div>

    <div class="bg-gray-50 shadow-md p-2 mb-4 border border-blue-50">
        <label for="fecha" class="block text-sm font-medium text-gray-700">Buscar por Usuario</label>
        <input 
            type="text" 
            wire:model="username" 
            id="username" 
            class="border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm rounded-md"
            wire:change='actualizarUsername'
        >
    </div>
    
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg w-full">
            <table class="w-full text-xs text-left text-gray-700 dark:text-gray-400">
                <thead class="text-xs text-gray-700 font-bold bg-gray-100">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Folio
                        </th>
                        <th scope="col" class="px-6 py-3">
                            ¿Conoce a Abraham Sandoval?
                        </th>
                        <th scope="col" class="px-6 py-3">
                            ¿Se le dio a conocer el Proyecto de <span class="text-blue-500">Abraham Sandoval</span>?                        
                        </th>
                        <th scope="col" class="px-6 py-3">
                            ¿Apoyaría el Proyecto de <span class="text-blue-500">Abraham Sandoval</span>?                        
                        </th>      
                        <th scope="col" class="px-6 py-3">
                            Brigada
                        </th>      
                        <th scope="col" class="px-6 py-3">
                            Usuario
                        </th>      
                        <th scope="col" class="px-6 py-3">
                            Distrito
                        </th>      
                        <th scope="col" class="px-6 py-3">
                            Municipio
                        </th>      
                        <th scope="col" class="px-6 py-3">
                            Estado
                        </th>      
                        <th scope="col" class="px-6 py-3 text-center">
                            Acciones
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($encuestas as $key=>$encuesta)
                        <tr class="bg-white border-b hover:bg-gray-50 text-xs">
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap" id="casilla">
                                <span id="span{{$encuesta->id}}">{{$encuesta->folio}}</span>
                            </td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap" id="casilla">
                                <span id="span{{$encuesta->id}}">{{$encuesta->conoce}}</span>
                            </td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap" id="casilla">
                                <span id="span{{$encuesta->id}}">{{$encuesta->informado}}</span>
                            </td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap" id="casilla">
                                <span id="span{{$encuesta->id}}">{{$encuesta->decision}}</span>
                            </td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap" id="casilla">
                                <span id="span{{$encuesta->id}}">{{$encuesta->brigada->nombre}}</span>
                            </td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap" id="casilla">
                                <span id="span{{$encuesta->id}}">{{$encuesta->user->username}}</span>
                            </td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap" id="casilla">
                                <span id="span{{$encuesta->id}}">{{$encuesta->distrito->nombre}}</span>
                            </td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap" id="casilla">
                                <span id="span{{$encuesta->id}}">{{$encuesta->municipio->nombre}}</span>
                            </td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap" id="casilla">
                                <span id="span{{$encuesta->id}}">{{$encuesta->estado->nombre}}</span>
                            </td>
                            <td class="px-6 py-4 text-center flex justify-center gap-4">
                             <!-- Botón de Editar -->
                                <button class="bg-yellow-500 rounded-lg" wire:click="show_Editar({{ $encuesta->id }})">
                                    <span class="font-medium text-white hover:underline p-2">Editar</span>
                                </button>

                                <!-- Botón de Eliminar -->
                                <button class="bg-red-600 rounded-lg" wire:click="show_Delete({{ $encuesta->id }})">
                                    <span class="font-medium text-white hover:underline p-2">Eliminar</span>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

           
    @elseif ($selectedOption === 'mapa')
        <button class=" p-2 bg-blue-700 text-white font-bold rounded-md">
            <a href="{{ route('encuestas.mapa') }}">VER EL MAPA</a>
        </button>

        <div id="map" class=" w-[90%] h-[90%] mt-2 m-auto">

        </div>
    @endif



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
                    <h3 class="text-lg font-medium text-gray-900 mb-6">Editar Registro</h3>
                    <form wire:submit.prevent="editEncuesta">
                        @csrf
                        <div class="mb-4">
                            <label for="conoce" class="block text-gray-700 text-sm font-bold mb-2">¿Conoce a Abraham Sandoval?</label>
                            <select wire:model="conoce" id="conoce" class="w-full px-3 py-2 border rounded-md" required>
                                <option value="SI">SI</option>
                                <option value="NO">NO</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="informado" class="block text-gray-700 text-sm font-bold mb-2">¿Se le dio a conocer el Proyecto de <span class="text-blue-500">Abraham Sandoval</span>?</label>
                            <select wire:model="informado" id="informado" class="w-full px-3 py-2 border rounded-md" required>
                                <option value="SI">SI</option>
                                <option value="NO">NO</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="decision" class="block text-gray-700 text-sm font-bold mb-2">¿Apoyaría el Proyecto de <span class="text-blue-500">Abraham Sandoval</span>?</label>
                            <select wire:model="decision" id="decision" class="w-full px-3 py-2 border rounded-md" required>
                                <option value="SI">SI</option>
                                <option value="NO">NO</option>
                                <option value="INDECISO">INDECISO</option>
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
                    <h3 class="text-lg font-medium text-gray-900 mb-6">Eliminar Registro</h3>
                    <form wire:submit.prevent="deleteEncuesta">
                        @csrf
                        <div class="mb-4">
                            <h3>¿Estas seguro de eliminar el folio <span class=" font-bold">{{ $folio }}</span> ?</h3>
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

</div>


