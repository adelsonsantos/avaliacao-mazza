<?php

namespace App\Http\Controllers;

use App\Models\Pacientes;
use Illuminate\Http\Request;

class PacientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = Pacientes::latest()->paginate(5);

        return view('pacientes.index', compact('pacientes'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pacientes.create');
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
            'nm_paciente' => 'required'
        ]);        

        Pacientes::create($request->all());

        return redirect()->route('pacientes')
            ->with('success', 'Paciente cadastrado com sucesso.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pacientes  $pacientes
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('pacientes.show', ['pacientes' => Pacientes::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pacientes  $pacientes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('pacientes.edit', ['pacientes' => Pacientes::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pacientes  $pacientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = array(
            'nm_paciente' => 'required'
        );     

        $paciente = Pacientes::where('cd_paciente', '=', $id)->first();

        $paciente->update($request->all());
            return redirect()->route('pacientes')
            ->with('success', 'Paciente alterado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pacientes  $pacientes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $paciente = Pacientes::find($id);
        if(!empty($paciente)){
            $paciente->delete();
        }else{
            $retorno['status'] = 404;
            $retorno['message'] = "Paciente não encontrado.";
        }
    
        return redirect()->route('pacientes')
                        ->with('success','Post deleted successfully');
    }
}
