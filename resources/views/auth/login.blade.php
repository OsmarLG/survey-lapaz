@extends('layouts.app')

@section('titulo')
    Iniciar Sesi&oacute;n
@endsection

@section('contenido')
<div class="md:flex md:justify-center md:gap-10 md:items-center">
    <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
        <form method="POST" action="{{ route('login') }}" novalidate>
            @csrf     
            
            @if (session('mensaje'))
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">       
                    {{ session('mensaje') }}
                </p>
            @endif

            <!-- INPUT USERNAME-->
            <div class="mb-5">
                <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
                    Nombre de Usuario
                </label>
                <input 
                    id="username"
                    name="username"
                    type="username"
                    placeholder="T&uacute; Nombre de Usuario"
                    class="border p-3 w-full rounded-lg  @error('username')
                    border-red-500
                    @enderror"
                    value="{{old('username')}}" 
                />
                @error('username')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-1">{{$message}}</p>
                @enderror
            </div>
            
            <!-- INPUT PASSWORD-->
            <div class="mb-5">
                <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
                    Contraseña
                </label>
                <input 
                    id="password"
                    name="password"
                    type="password"
                    placeholder="T&uacute; Contraseña"
                    class="border p-3 w-full rounded-lg @error('password')
                    border-red-500
                    @enderror"
                />
                @error('password')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-5">
                <input type="checkbox" name="remember"> 
                <label class="text-gray-500 text-sm">Mantener mi sesi&oacute;n abierta</label>
            </div>

            <input 
                type="submit"
                value="Iniciar Sesi&oacute;n"
                class="bg-white hover:bg-rose-950 hover:text-white transition-colors border-2 border-rose-950 cursor-pointer uppercase font-bold w-full p-3 text-rose-950 rounded-lg mt-5"
            />
        </form>
    </div>
</div>
@endsection
