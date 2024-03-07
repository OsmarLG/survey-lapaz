<div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg md:mx-[50px] my-[25px]">
        <table class="w-full text-sm text-left text-gray-700 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nombre
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
                @foreach ($municipios as $key=>$municipio)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap" id="casilla">
                            <span id="span{{$municipio->id}}">{{$municipio->nombre}}</span>
                        </td>
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap" id="casilla">
                            @if ($municipio->status)
                                <span id="span{{$municipio->id}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Activo</span>
                            @else
                                <span id="span{{$municipio->id}}" class="font-medium text-red-600 dark:text-red-500 hover:underline">Inactivo</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-center flex justify-center gap-4">
                            @if ($municipio->status)
                                <button class="bg-orange-500 rounded-lg">                            
                                    <a href="#" class="font-medium text-white hover:underline p-2" wire:click='desactivar({{$municipio->id}})'>Desactivar</a>
                                </button>
                            @else
                                <button class="bg-blue-600 rounded-lg">                            
                                    <a href="#" class="font-medium text-white hover:underline p-2" wire:click='activar({{$municipio->id}})'>Activar</a>
                                </button>
                            @endif
                            
                            {{-- <button class="bg-yellow-500 rounded-lg">
                                <a href="#" class="font-medium text-white hover:underline p-2" wire:click='show_Editar({{$municipio->id}})'>Editar</a>
                            </button>
                            <button class="bg-red-600 rounded-lg">
                                <a href="#" class="font-medium text-white hover:underline p-2" wire:click='show_Delete({{$municipio->id}})'>Eliminar</a>
                            </button> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
      
      </div>
</div>
