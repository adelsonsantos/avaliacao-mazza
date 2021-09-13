@extends('layouts.app')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Error!</strong> 
            <ul>
                @foreach ($errors->all() as $error)
                    <li><?php echo $error; ?></li>
                @endforeach
            </ul>
        </div>
    @endif
    <fieldset class="border p-2">
   <legend  class="w-auto">Cadastrar novo Paciente </legend>
    <form action="{{ route('paciente-store') }}" method="POST" >
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nome:</strong>
                    <input type="text" name="nm_paciente" class="form-control" placeholder="Nome do paciente">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <a class="btn btn-dark" href="{{ route('pacientes') }}"><i class="fas fa-angle-left"></i> Voltar</a>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </div>

    </form>
</fieldset>
@endsection