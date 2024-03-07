<?php

namespace App\Http\Controllers;

use App\Models\Brigada;
use App\Models\User;
use App\Models\Estado;
use App\Models\Distrito;
use App\Models\Encuesta;
use App\Models\Municipio;
use Illuminate\Http\Request;

class EncuestaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
     public function index($username)
     {
         // Obtener el usuario por su nombre de usuario
         $user = User::where('username', $username)->first();
     
         if (!$user) {
             // Manejar el caso en que el usuario no existe
             abort(404); // Esto generará una página 404
         }
     
         // Cargar las encuestas para este usuario (asumiendo que tienes una relación en el modelo User)
        $encuestas = $user->encuestas;
     
         // Realizar cualquier otra lógica que necesites
     
         return view('encuestas.index', ['encuestas' => $encuestas, 'user' => $user]);
     }
     

    public function mostrar(){

        $encuestas = Encuesta::all();

        return view('admin.encuestas', ['encuestas' => $encuestas]);
    }

    public function mostrar_mapa(){
        $encuestas = Encuesta::all();
        $si = Encuesta::where('decision', 'SI')->get();
        $no = Encuesta::where('decision', 'NO')->get();
        $indeciso = Encuesta::where('decision', 'INDECISO')->get();

        return view('encuestas.mapa', ['encuestas' => $encuestas, 'si' => $si, 'no' => $no, 'indeciso' => $indeciso]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $estados = Estado::where('status', 1)->get();

        $municipios = Municipio::where('status', 1)->get();

        $distritos = Distrito::where('status', 1)->get();

        $brigadas = Brigada::where('status', 1)->get();


        return view('encuestas.create', ['estados' => $estados, 'municipios' => $municipios, 'distritos' => $distritos, 'brigadas' => $brigadas]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'latitud' => 'required|min:2|unique:encuestas,latitud',
            'longitud' => 'required|min:2|unique:encuestas,longitud',
        ]);
        
        //Otras forma de registrar
            // $usuario = new User;
            // $encuesta->user_id = auth()->user()->id;
            // $encuesta->save();
            
            // $request->user()->posts()->create([
            //     'titulo' => $request->titulo,
            //     'descripcion' => $request->descripcion,
            //     'imagen' => $request->imagen,
            //     'user_id' => auth()->user()->id
            // ]);
        
        Encuesta::create([
            'folio' => $request->folio,
            'conoce' => $request->conoce,
            'informado' => $request->informado,
            'decision' => $request->decision,
            'latitud' => $request->latitud,
            'longitud' => $request->longitud,
            'user_id' => auth()->user()->id,
            'brigada_id' => $request->brigada, 
            'estado_id' => $request->estado, 
            'municipio_id' => $request->municipio, 
            'distrito_id' => $request->distrito, 
        ]);

        return redirect()->route('encuestas.index', auth()->user()->username);
        // return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show($username, $encuesta_id)
    {
        // Tu lógica para mostrar la encuesta
        
        $user = User::where('username', $username)->get();
        $encuesta = Encuesta::find($encuesta_id);


        return view('encuestas.show', ['user' => $user, 'encuesta' => $encuesta]);
    }

    public function encuestas($encuesta_id)
    {
        // Tu lógica para mostrar la encuesta
        
        $encuesta = Encuesta::find($encuesta_id);

        return view('encuestas.encuesta', ['encuesta', $encuesta]);
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Encuesta $encuesta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Encuesta $encuesta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Encuesta $encuesta)
    {
        //
    }
}
