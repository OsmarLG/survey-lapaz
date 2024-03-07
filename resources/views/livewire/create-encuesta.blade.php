<div>
    
    <div class="flex items-center justify-center">
        <form method="POST" action="{{ route('encuestas.store') }}" class="max-w-md mx-auto rounded-lg ">
            @csrf
            <div class=" md:w-4/5 md:flex md:space-x-10 justify-center gap-5 p-2">
                <div class="">
                    <div class="mb-12">
                        <label for="folio" class="block text-white text-sm font-bold mb-2">Folio:</label>
                        <input type="text" class=" border border-blue-500 p-1 rounded-lg form-input @error('folio') border-red-500 @enderror" id="folio" name="folio" value="{{ old('folio', 'F-AS-' . now()->format('Ymd')) }}">
                        @error('folio')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-12">
                        <label for="brigada" class="block text-gray-700 text-sm font-bold mb-2">Brigada</label>
                        <select class="border border-blue-500 p-1 rounded-lg form-select @error('brigada') border-red-500 @enderror" id="brigada" name="brigada">
                            @foreach ($brigadas as $key=>$brigada)
                                <option value="{{ $brigada->id }}">{{ $brigada->nombre }}</option>
                            @endforeach
                        </select>
                        @error('brigada')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-12">
                        <label for="estado" class="block text-gray-700 text-sm font-bold mb-2">Estado</label>
                        <select class="border border-blue-500 p-1 rounded-lg form-select @error('estado') border-red-500 @enderror" id="estado" name="estado">
                            @foreach ($estados as $key=>$estado)
                                <option value="{{ $estado->id }}">{{ $estado->nombre }}</option>
                            @endforeach
                        </select>
                        @error('estado')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-12">
                        <label for="distrito" class="block text-gray-700 text-sm font-bold mb-2">Distrito</label>
                        <select class="border border-blue-500 p-1 rounded-lg form-select @error('distrito') border-red-500 @enderror" id="distrito" name="distrito">
                            @foreach ($distritos as $key=>$distrito)
                                <option value="{{ $distrito->id }}">{{ $distrito->nombre }}</option>
                            @endforeach
                        </select>
                        @error('distrito')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="">
                    <div class="mb-12">
                        <label for="conoce" class="block text-gray-700 text-sm font-bold mb-2">¿Conoc&eacute; a Abraham Sandoval?:</label>
                        <select class="border border-blue-500 p-1 rounded-lg form-select @error('conoce') border-red-500 @enderror" id="conoce" name="conoce">
                            <option value="SI" {{ old('conoce') === 'SI' ? 'selected' : '' }}>SI</option>
                            <option value="NO" {{ old('conoce') === 'NO' ? 'selected' : '' }}>NO</option>
                        </select>
                        @error('conoce')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                
                    <div class="mb-12">
                        <label for="informado" class="block text-gray-700 text-sm font-bold mb-2">¿Se le di&oacute; Informaci&oacute;n?:</label>
                        <select class="border border-blue-500 p-1 rounded-lg form-select @error('informado') border-red-500 @enderror" id="informado" name="informado">
                            <option value="SI" {{ old('informado') === 'SI' ? 'selected' : '' }}>SI</option>
                            <option value="NO" {{ old('informado') === 'NO' ? 'selected' : '' }}>NO</option>
                        </select>
                        @error('informado')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-12">
                        <label for="decision" class="block text-gray-700 text-sm font-bold mb-2">¿Apoya a Abraham Sandoval?:</label>
                        <select class="border border-blue-500 p-1 rounded-lg form-select @error('decision') border-red-500 @enderror" id="decision" name="decision">
                            <option value="SI" {{ old('decision') === 'SI' ? 'selected' : '' }}>SI</option>
                            <option value="NO" {{ old('decision') === 'NO' ? 'selected' : '' }}>NO</option>
                            <option value="INDECISO" {{ old('decision') === 'INDECISO' ? 'selected' : '' }}>INDECISO</option>
                        </select>
                        @error('decision')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>    
                    <div class="mb-12">
                        <label for="latitud" class="block text-gray-700 text-sm font-bold mb-2">Latitud:</label>
                        <input type="text" class="border border-blue-500 p-1 rounded-lg form-input @error('latitud') border-red-500 @enderror" id="latitud" name="latitud" value="{{ old('latitud') }}">
                        @error('latitud')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                
                    <div class="mb-12">
                        <label for="longitud" class="block text-gray-700 text-sm font-bold mb-2">Longitud:</label>
                        <input type="text" class="border border-blue-500 p-1 rounded-lg form-input @error('longitud') border-red-500 @enderror" id="longitud" name="longitud" value="{{ old('longitud') }}">
                        @error('longitud')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-12">
                        <div class="flex justify-center">
                            <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" id="getLocation" >Obtener Ubicaci&oacute;n</button>
                        </div>
                        <div id="map" class="w-full h-40 mt-4">
                      
                        </div>
                    </div>
                </div>
            </div>
                    
            <div class="flex items-center justify-center">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Guardar Registro</button>
            </div>
        </form>
        
    </div>
</div>
