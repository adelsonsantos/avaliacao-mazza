@extends('layouts.app')

@section('content')
    <fieldset class="border p-2">
   <legend  class="w-auto">Detalhes do Médico</legend>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nome:</strong>
                {{ $medicos->nm_medico }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <a class="btn btn-dark" href="{{ route('medicos') }}"><i class="fas fa-angle-left"></i> Voltar</a>                      
        </div>
    </div>
</fieldset>
@endsection