<?php

namespace App\Livewire;

use App\Models\Estado;
use App\Models\Brigada;
use Livewire\Component;
use App\Models\Distrito;
use App\Models\Municipio;
use Illuminate\Support\Facades\Http;

class CreateEncuesta extends Component
{
    public $estados;
    public $municipios;
    public $distritos;
    public $brigadas;

    // public function getPublicIp()
    // {
    //     try {
    //         $response = Http::get('https://api64.ipify.org?format=json');
    //         $data = $response->json();
    //         $publicIp = $data['ip'];

    //         // Ahora $publicIp contiene tu IP pública
    //         return $publicIp;
    //     } catch (\Exception $e) {
    //         // Manejar cualquier error que ocurra al obtener la IP pública
    //         return 'Error al obtener la IP pública: ' . $e->getMessage();
    //     }
    // }

    public function mount(){

        // $this->estados = Estado::where('status', 1)->get();

        // $this->municipios = Municipio::where('status', 1)->get();

        // $this->distritos = Distrito::where('status', 1)->get();

        // $this->brigadas = Brigada::where('status', 1)->get();

        // $response = Http::get("http://ip-api.com/json/{$this->getPublicIp()}");

        // if ($response->ok()) {
        //     $ubicacion = $response->json();
        //     $latitud = $ubicacion['lat'];
        //     $longitud = $ubicacion['lon'];
        //     //dd($latitud . ',' . $longitud);
        // }

    }

    public function render()
    {
        return view('livewire.create-encuesta');
    }
}
