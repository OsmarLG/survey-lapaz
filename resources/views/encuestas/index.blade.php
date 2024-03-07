@extends('layouts.app')

@section('titulo')
   Registros de {{ auth()->user()->username }}
@endsection

@section('contenido')

<div class="p-2">
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        <a href="{{ route('encuestas.create') }}">Registrar Nuevo Ejercicio</a>
    </button>
</div>

    <div class="md:grid md:grid-cols-3 gap-4 p-2">
        @foreach($encuestas as $key=>$encuesta)
            <a href="{{ route('encuestas.show', ['username' => $user->username, 'encuesta_id' => $encuesta->id]) }}" class="">
                <div class="bg-white p-4 shadow-md rounded-md border border-blue-300 mt-2 hover:bg-blue-100 transition-all">
                    <p class="font-bold">Folio: <span class=" text-blue-700">{{ $encuesta->folio }}</span></p>
                    <div class="flex">
                        <p class="font-bold">Por: <span class="font-normal">{{ $encuesta->user->username }}</span></p>

                    </div>
                    <div class="flex justify-between">
                        <p class=" text-sm text-gray-700">{{ $encuesta->distrito->nombre }}</p>
                        <p class="text-sm">{{ $encuesta->created_at->diffForHumans() }}</p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
@endsection