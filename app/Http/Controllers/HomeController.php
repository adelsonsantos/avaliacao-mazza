<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Agendamentos;
use App\Models\Medicos;
use App\Models\Pacientes;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $medicos = DB::table('medicos')->count();
        $pacientes = DB::table('pacientes')->count();
        $agendamentos = DB::table('agendamentos')->count();
        return view('home',compact('agendamentos', 'pacientes', 'medicos'));
    }
}
