<?php

namespace App\Http\Controllers;

use App\Models\Encuesta;
use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;


class HomeController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke()
    {
        $encuestas = Encuesta::where('user_id', auth()->user()->id)->get();
        $encuestas_si = Encuesta::where('user_id', auth()->user()->id)->where('decision', 'SI')->get();
        $encuestas_no = Encuesta::where('user_id', auth()->user()->id)->where('decision', 'NO')->get();
        $encuestas_indeciso = Encuesta::where('user_id', auth()->user()->id)->where('decision', 'INDECISO')->get();

        return view('home',
            [
                'encuestas' => $encuestas,
                'encuestas_si' => $encuestas_si,
                'encuestas_no' => $encuestas_no,
                'encuestas_indeciso' => $encuestas_indeciso,
            ]
        );
    }
}
