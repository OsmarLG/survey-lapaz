@extends('layouts.app')

@section('titulo')
    Registro
    @section('subtitulo')
        {{ $encuesta->folio }}
    @endsection
@endsection

@section('contenido')
<div class="md:grid grid-cols-2 grid-rows-2 gap-0 md:w-[70%] m-auto">
    <div class="col-span-1 row-span-1 border border-blue-500 p-2 rounded-md shadow-md m-1 bg-white">
        <h2 class="font-bold text-gray-600">Información del Registro</h2>
        <div class="p-2 mt-2">
            <p class="font-bold text-sm mt-1">Folio: <span class="text-blue-500">{{ $encuesta->folio }}</span></p>
            <p class="font-bold text-sm mt-1">Brigada: <span class="text-blue-500">{{ $encuesta->brigada->nombre }}</span></p>
            <p class="font-bold text-sm mt-1">Distrito: <span class="text-blue-500">{{ $encuesta->distrito->nombre }}</span></p>
            <p class="font-bold text-sm mt-1">Municipio: <span class="text-blue-500">{{ $encuesta->municipio->nombre }}</span></p>
            <p class="font-bold text-sm mt-1">Estado: <span class="text-blue-500">{{ $encuesta->estado->nombre }}</span></p>
        </div>
    </div>
    
    <div class="col-span-1 row-span-1 border border-blue-500 p-2 rounded-md shadow-md m-1 bg-white">
        <h2 class="font-bold text-gray-600">Información de la Encuesta</h2>
        <div class="p-2 mt-2">
            <p class="font-bold text-sm mt-1">¿Conoce a Abraham Sandoval?: <span class="text-blue-500">{{ $encuesta->conoce }}</span></p>
            <p class="font-bold text-sm mt-1">¿Se le dio a conocer el Proyecto de <span class="text-blue-500">{{ $encuesta->brigada->nombre }}</span>?: <span class="text-blue-500">{{ $encuesta->informado }}</span></p>
            <p class="font-bold text-sm mt-1">¿Apoyaría el Proyecto de <span class="text-blue-500">{{ $encuesta->brigada->nombre }}</span>?: <span class="text-blue-500">{{ $encuesta->decision }}</span></p>
        </div>
    </div>
    
    <div class="col-span-2 row-span-2 border border-blue-500 p-2 rounded-md shadow-md m-1 bg-white">
        <div class="md:flex">
            <div class="md:w-[50%]">
                <h2 class="font-bold text-gray-600">Datos de Ubicación Geográfica</h2>

                <div class="p-2">
                    <p class="font-bold text-sm mt-1">Latitud: <span class="text-blue-500">{{ $encuesta->latitud }}</span></p>
                    <p class="font-bold text-sm mt-1">Longitud: <span class="text-blue-500">{{ $encuesta->longitud }}</span></p>
                </div>
            </div>
            
            <div id="map" class="md:w-[50%] h-52 mt-2">

            </div>
        </div>
    </div>
</div>

@endsection


<script>
    document.addEventListener("DOMContentLoaded", function () {
        
        map = L.map('map').setView([@json($encuesta->latitud), @json($encuesta->longitud)], 12)

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'}).addTo(map);

        var greenIcon = new L.Icon({
            iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png',
            shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
        });

        var blueIcon = new L.Icon({
            iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-blue.png',
            shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
        });

        var redIcon = new L.Icon({
            iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
            shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
        });

        var yellowIcon = new L.Icon({
            iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-yellow.png',
            shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
        });

        var chooseIcon;
        if (@json($encuesta->decision === 'SI')){
            chooseIcon = greenIcon;
        }

        if (@json($encuesta->decision === 'NO')){
            chooseIcon = redIcon;
        }

        if (@json($encuesta->decision === 'INDECISO')){
            chooseIcon = yellowIcon;
        }

        L.marker([@json($encuesta->latitud), @json($encuesta->longitud)] , {icon: chooseIcon}).addTo(map)

        .bindPopup('Folio: <span class="font-bold">' + @json($encuesta->folio) + '</span> </p> <p class="font-bold text-sm"> ' + @json($encuesta->distrito->nombre) +  ' </p>  <p class="text-sm">' + @json($encuesta->created_at->diffForHumans()) +  '</p>');
    })
</script>