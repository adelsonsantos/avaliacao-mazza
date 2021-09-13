@extends('layouts.app')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Error!</strong> 
            <ul>
                @foreach ($errors->all() as $error)
                    <li></li>
                @endforeach
            </ul>
        </div>
    @endif
    <fieldset class="border p-2">
   <legend  class="w-auto">Cadastrar novo Médico </legend>
    <form action="{{ route('medicos.store') }}" method="POST" >
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nome:</strong>
                    <input type="text" name="nm_medico" class="form-control" placeholder="Nome do médico">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <a class="btn btn-dark" href="{{ route('medicos') }}"><i class="fas fa-angle-left"></i> Voltar</a>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </div>

    </form>
</fieldset>
@endsection