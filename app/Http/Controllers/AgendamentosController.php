<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Agendamentos;
use App\Models\Medicos;
use App\Models\Pacientes;
use Illuminate\Http\Request;

class AgendamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $agendamentos = Agendamentos::latest()->paginate(5);

        $agendamentos = DB::table('agendamentos')
        ->join('medicos', 'medicos.cd_medico', '=', 'agendamentos.cd_medico')
        ->join('pacientes', 'pacientes.cd_paciente', '=', 'agendamentos.cd_paciente')
        ->select(
                'agendamentos.cd_agendamento',
                'agendamentos.ds_agendamento',
                'medicos.cd_medico',
                'medicos.nm_medico',
                'pacientes.cd_paciente',
                'pacientes.nm_paciente',
                'agendamentos.dt_agendamento_inicio',
                'agendamentos.hora_inicio',
                
                'agendamentos.dt_agendamento_final',
                'agendamentos.hora_final',
        )->get();

        return view('agendamentos.index', compact('agendamentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medicos = Medicos::all();
        $pacientes = Pacientes::all();
        return view('agendamentos.create',compact('medicos', 'pacientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            
            'ds_agendamento' => 'required',
            'cd_medico' => 'required',
            'cd_paciente' => 'required',
            'dt_agendamento_inicio' => 'required',
            'hora_inicio' => 'required',
            'dt_agendamento_final' => 'required',
            'hora_final' => 'required'   
        ]);

        Agendamentos::create($request->all());

        return redirect()->route('agendamentos')
            ->with('success', 'Agendamento cadastrado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agendamentos  $agendamentos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $agendamentos = DB::table('agendamentos')
        ->join('medicos', 'medicos.cd_medico', '=', 'agendamentos.cd_medico')
        ->join('pacientes', 'pacientes.cd_paciente', '=', 'agendamentos.cd_paciente')
        ->select(
                'agendamentos.cd_agendamento',
                'agendamentos.ds_agendamento',
                'medicos.cd_medico',
                'medicos.nm_medico',
                'pacientes.cd_paciente',
                'pacientes.nm_paciente',
                'agendamentos.dt_agendamento_inicio',
                'agendamentos.hora_inicio',
                
                'agendamentos.dt_agendamento_final',
                'agendamentos.hora_final',
        )->where('agendamentos.cd_agendamento', '=', $id)
        ->get();


        return view('agendamentos.show', ['agendamentos' => $agendamentos]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agendamentos  $agendamentos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medicos = Medicos::all();
        $pacientes = Pacientes::all();
        $agendamentos = DB::table('agendamentos')
        ->join('medicos', 'medicos.cd_medico', '=', 'agendamentos.cd_medico')
        ->join('pacientes', 'pacientes.cd_paciente', '=', 'agendamentos.cd_paciente')
        ->select(
                'agendamentos.cd_agendamento',
                'agendamentos.ds_agendamento',
                'medicos.cd_medico',
                'medicos.nm_medico',
                'pacientes.cd_paciente',
                'pacientes.nm_paciente',
                'agendamentos.dt_agendamento_inicio',
                'agendamentos.hora_inicio',                
                'agendamentos.dt_agendamento_final',
                'agendamentos.hora_final',
                'agendamentos.observacao'
        )->where('agendamentos.cd_agendamento', '=', $id)
        ->get();


        return view('agendamentos.edit',compact('agendamentos', 'medicos', 'pacientes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agendamentos  $agendamentos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = array(            
                'ds_agendamento' => 'required',
                'cd_medico' => 'required',
                'cd_paciente' => 'required',
                'dt_agendamento_inicio' => 'required',
                'hora_inicio' => 'required',
                'dt_agendamento_final' => 'required',
                'hora_final' => 'required'   
        );     

        $agendamento = Agendamentos::where('cd_agendamento', '=', $id)->first();

        $agendamento->update($request->all());
            return redirect()->route('agendamentos')
            ->with('success', 'Agendamento alterado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agendamentos  $agendamentos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agendamentos $agendamentos)
    {
        //
    }
}
