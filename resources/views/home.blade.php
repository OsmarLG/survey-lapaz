@extends('layouts.app')

@section('titulo')
    P&aacute;gina Principal
@endsection

@section('contenido')
    <div class="flex justify-center mb-4">
        <div class=" bg-red-300 p-2 rounded-lg">    
            <h2 class="uppercase font-bold">Trabajos realizados por el usuario {{ auth()->user()->username }}</h2>
        </div>
    </div>

    <div class="flex justify-center items-center">

        <!-- BOTON -->
        <div class=" flex flex-col items-center md:flex-row">
            <div class="p-2">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    <a href="{{ route('encuestas.create') }}">Registrar Nuevo Ejercicio</a>
                </button>
            </div>

            <div class="p-2">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    <a href="{{ route('encuestas.index', auth()->user()->username)}}">Ver Mis Ejercicios</a>
                </button>
            </div>
        </div>
        
    </div>

        <div class="w-[90%] bg-white h-[400px]  mt-2 m-auto md:w-[30%] md:h-[60%] rounded-md">
            <canvas id="myChart" height="400" class=" m-auto"></canvas>
        </div>

    </div>

    <div class="mt-5">
        <div id="iconos" class="items-center bg-white w-[90%] md:w-[60%] m-auto rounded-md">
            <div class="p-2 w-[100%] text-center flex gap-2 md:justify-center">
                <p class="font-bold text-gray-700">Total de Encuestas: </p> <span> {{ $encuestas->count() }}</span> <span> <img class="w-[20px] h-[30px]" src="https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-blue.png" alt=""></span>
            </div>
            <div class="p-2 w-[100%] text-center">
                <p class="font-bold text-gray-700">¿Apoyan el proyecto?</p>
                <div class="flex justify-between md:justify-evenly md:mt-2">
                    <div class="flex gap-2">
                        <p class=" font-semibold text-gray-800">Si: </p> <span>{{ $encuestas_si->count() }}</span> <span> <img class="w-[20px] h-[30px]" src="https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png" alt=""></span>
                    </div>
                    <div class="flex gap-2">
                        <p class=" font-semibold text-gray-800">No: </p> <span>{{ $encuestas_no->count() }}</span> <span> <img class="w-[20px] h-[30px]" src="https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png" alt=""></span>
                    </div>
                    <div class="flex gap-2">
                        <p class=" font-semibold text-gray-800">Indeciso: </p> <span>{{ $encuestas_indeciso->count() }}</span> <span> <img class="w-[20px] h-[30px]" src="https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-yellow.png" alt=""></span>
                    </div>
                </div>
            </div>
        </div>

        <div id="map" class=" w-[90%] h-[300px] md:w-[60%] md:h-[60%] mt-2 m-auto">

        </div>
    </div>
@endsection

@section('scripts')
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const ctx = document.getElementById('myChart').getContext('2d');
        
            new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Ejercicios Totales'],
                datasets: [{
                label: 'Registros de ' + @json(auth()->user()->name),
                data: [@json($encuestas->count())],
                borderWidth: 1
                }]
            },
            options: {
                scales: {
                y: {
                    beginAtZero: true
                }
                }
            }
            });
        });
    </script>
@endsection

@if ($encuestas->count() >= 1)
    

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var map = L.map('map')
        .setView([{{ $encuestas[0]->latitud }}, {{ $encuestas[0]->longitud }}], 12);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var greenIcon = new L.Icon({
            iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-green.png',
            // shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
            iconSize: [18, 22],
            iconAnchor: [5, 5],
            popupAnchor: [1, -34],
            shadowSize: [2, 2]
        });

        var blueIcon = new L.Icon({
            iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-blue.png',
            // shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
            iconSize: [18, 22],
            iconAnchor: [5, 5],
            popupAnchor: [1, -34],
            shadowSize: [2, 2]
        });

        var redIcon = new L.Icon({
            iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-red.png',
            // shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
            iconSize: [18, 22],
            iconAnchor: [5, 5],
            popupAnchor: [1, -34],
            shadowSize: [2, 2]
        });

        var yellowIcon = new L.Icon({
            iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-yellow.png',
            // shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
            iconSize: [18, 22],
            iconAnchor: [5, 5],
            popupAnchor: [1, -34],
            shadowSize: [2, 2]
        });

        var chooseIcon;

        // Recorrer los datos de las encuestas y crear marcadores en el mapa
        var i;
        @for ($i = 0; $i < count($encuestas); $i++)
            var encuesta = @json($encuestas[$i]);
            var distrito = @json($encuestas[$i]->distrito)


            if (@json($encuestas[$i]->decision) === 'SI'){
                chooseIcon = greenIcon;
            }

            if (@json($encuestas[$i]->decision) === 'NO'){
                chooseIcon = redIcon;
            }

            if (@json($encuestas[$i]->decision) === 'INDECISO'){
                chooseIcon = yellowIcon;
            }

            // console.log(json($encuestas[$i]))
            

            L.marker([@json($encuestas[$i]->latitud), @json($encuestas[$i]->longitud)], { icon: chooseIcon }).addTo(map)
            .bindPopup(
                'Folio: <span class="font-bold text-xs">' + @json($encuestas[$i]->folio) + '</span>'
                +'<div class="flex justify-between"> <p class="text-xs">' + @json($encuestas[$i]->distrito->nombre) + '</p> <p text-xs> ' + @json($encuestas[$i]->municipio->nombre) +  ' </p> </div>'
                +'<p text-xs>' + @json($encuestas[$i]->estado->nombre) + '</p>'
                +'<div class="flex justify-between"> <p class="text-xs font-bold text-gray-400">Por: <span class="font-normal text-blue-500 text-xs">' + @json($encuestas[$i]->user->name) + '</span></p> <p class="text-xs"> ' + @json($encuestas[$i]->created_at->diffForHumans()) +  ' </p> </div>');

        @endfor
    });
</script>

@endif