<?php

namespace App\Http\Controllers;

use App\Models\Medicos;
use Illuminate\Http\Request;

class MedicosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicos = Medicos::latest()->paginate(5);

        return view('medicos.index', compact('medicos'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('medicos.create');
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
            'nm_medico' => 'required'
        ]);

        

        Medicos::create($request->all());

        return redirect()->route('medicos')
            ->with('success', 'Médico cadastrado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('medicos.show', ['medicos' => Medicos::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {       
        return view('medicos.edit', ['medicos' => Medicos::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = array(
            'nm_medico'       => 'required'
        );     

        $medico = Medicos::where('cd_medico', '=', $id)->first();

        $medico->update($request->all());
            return redirect()->route('medicos')
            ->with('success', 'Médico alterado com sucesso.');
    }


    public function dados(){
        $retorno = [];
        $medicos = Medicos::all();
        if(!empty($medicos)){
            $retorno = $medicos;
        }else{
            $retorno['message'] = "Nenhum médico cadastrado.";
        }
        return response()->json($retorno);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
