<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Surveys - @yield('titulo')</title>
        
        @vite('resources/css/app.css')
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />


    </head>
    <body class=" bg-rose-950">
        <header class=" p-5 border-b bg-rose-900 shadow">
            <div class="container mx-auto flex justify-between">
                <h1 class=" text-3xl font-black">
                    <a href="{{ route('home') }}" class="text-white">Surveys - AS</a>
                </h1>

            </div>
        </header>

        @auth
            <nav class="text-center mt-4">

                <p class="text-white">Hola: <span class=" font-bold text-gray-100"><a href="{{ route('encuestas.index', auth()->user()->username)}}">{{ auth()->user()->username }}</a></span></p>

                <div class="mt-4 flex justify-center">
                    <div>
                        @if (auth()->user()->tipo === "ADMIN")
                            @if (Route::currentRouteName() == 'home')
                            <a class=" m-4 font-bold text-indigo-500 text-sm" href="{{ route('dashboard') }}">
                                    Ir a Dashboard
                                </a>
                            @else
                                <a class=" m-4 font-bold text-indigo-500 text-sm" href="{{ route('home') }}">
                                    Ir a Home
                                </a>    
                            @endif
                        @endif
                    </div>
                    
                    <div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="font-bold text-gray-100 text-sm">
                                Cerrar Sesi&oacute;n
                            </button>
                        </form>
                    </div>
                </div>
            </nav>
         @endauth

        <main class=" container mx-auto mt-10">
            <h2 class=" font-black text-center text-white text-3xl mb-10">@yield('titulo') <span class=" text-gray-50">@yield('subtitulo')</span></h2>

            @yield('contenido')
        </main>

        @if (Route::currentRouteName() != 'login' && !in_array(Route::currentRouteName(), ['home', 'dashboard']))
            <!-- Botón de regresar -->
            <div class="fixed bottom-4 right-4">
                <a href="{{ url()->previous() }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Regresar</a>
            </div>
        @endif

        <footer class=" text-center p-5 text-white font-bold uppercase">
            Surveys - Todos los Derechos Reservados &copy; {{ now()->year }}
        </footer>

        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
        @yield('scripts')
    </body>
</html>