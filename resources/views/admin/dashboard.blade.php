@extends('layouts.app')

@section('titulo')
    Dashboard
@endsection

@section('contenido')

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 p-4">
        <!-- USUARIOS -->
        <div class=" bg-gray-50 p-4 text-center rounded-lg shadow-md">
            <h3 class="text-lg font-bold">Usuarios</h3>
            <p class="font-bold mb-4">{{ $users->count() }}</p>
            <a href="{{ route('usuarios') }}" class="font-bold text-sm border-b border-gray-500 text-indigo-500">Gestionar Usuarios</a>
        </div>

        <!-- ENCUESTAS -->
        <div class=" bg-gray-50 p-4 text-center rounded-lg shadow-md">
            <h3 class="text-lg font-bold">Encuestas</h3>
            <p class="font-bold mb-4">{{ $encuestas->count() }}</p>
            <a href="{{ route('encuestas') }}" class="font-bold text-sm border-b border-gray-500 text-indigo-500">Gestionar Encuestas</a>
        </div>

        {{-- <!-- BRIGADAS -->
        <div class=" bg-blue-50 p-4 text-center rounded-lg shadow-md">
            <h3 class="text-lg font-bold">Brigadas</h3>
            <p class="font-bold mb-4">0</p>
            <a href="#" class="font-bold text-sm border-b border-indigo-500 text-indigo-500">Gestionar Brigadas</a>
        </div> --}}

        {{-- <!-- DISTRITOS -->
        <div class=" bg-blue-50 p-4 text-center rounded-lg shadow-md">
            <h3 class="text-lg font-bold">Distritos</h3>
            <p class="font-bold mb-4">0</p>
            <a href="#" class="font-bold text-sm border-b border-indigo-500 text-indigo-500">Gestionar Distritos</a>
        </div> --}}

        <!-- MUNICIPIOS -->
        <div class=" bg-gray-50 p-4 text-center rounded-lg shadow-md">
            <h3 class="text-lg font-bold">Municipios</h3>
            <p class="font-bold mb-4">{{ $municipios->count(); }}</p>
            <a href="{{ route('municipios') }}" class="font-bold text-sm border-b border-gray-500 text-indigo-500">Gestionar Municipios</a>
        </div>

        <!-- ESTADOS -->
        <div class=" bg-gray-50 p-4 text-center rounded-lg shadow-md">
            <h3 class="text-lg font-bold">Estados</h3>
            <p class="font-bold mb-4">{{ $estados->count(); }}</p>
            <a href="{{ route('estados') }}" class="font-bold text-sm border-b border-gray-500 text-indigo-500">Gestionar Estados</a>
        </div>
    </div>

    <div class="mt-5">
        <div id="chart_totales" class="items-center w-[90%] m-auto rounded-md p-2 bg-white">
            <h1>{{ $chart1->options['chart_title'] }}</h1>
            {!! $chart1->renderHtml() !!}
        </div>

    </div>

@endsection

@section('scripts')
{!! $chart1->renderChartJsLibrary() !!}
{!! $chart1->renderJs() !!}
@endsection