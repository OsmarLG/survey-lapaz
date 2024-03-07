<?php

namespace App\Http\Controllers;

use App\Models\Encuesta;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\User;
use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;


class DashboardController extends Controller
{
    //
    public function index(){

        if (auth()->user()->tipo != "ADMIN") {
            // Si el usuario no es ADMIN, redirige a la vista principal
            return redirect()->route('home');
        } 

        $users = User::all();
        $estados = Estado::all();
        $municipios = Municipio::all();
        $encuestas = Encuesta::all();

        $chart_options = [
            'chart_title' => 'Registros por Usuarios',
            'chart_type' => 'bar',
            'report_type' => 'group_by_relationship',
            'model' => 'App\Models\Encuesta',
        
            'relationship_name' => 'user',
            'group_by_field' => 'name', // El campo que relaciona las encuestas con los usuarios
        
            'aggregate_function' => 'count', // Usar 'count' para contar la cantidad de registros
            'aggregate_field' => 'id', // El campo que se contará
        
            'filter_days' => 30, // Puedes ajustar esto según tus necesidades
            'filter_period' => 'week',
            'chart_color' => '30,144,255',
        ];
        
        
        $chart1 = new LaravelChart($chart_options);

        return view('admin.dashboard', ['users' => $users, 'estados' => $estados, 'municipios' => $municipios, 'encuestas' => $encuestas, 'chart1' => $chart1]);
    }
}
