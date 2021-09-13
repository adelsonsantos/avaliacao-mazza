@extends('layouts.app')
   
@section('content')

  
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <fieldset class="border p-2">
   <legend  class="w-auto">Editar Médico</legend>

    <form action="" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nome:</strong>
                    <input type="text" name="nm_medico" value="{{ $medicos->nm_medico }}" class="form-control" placeholder="Title">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <a class="btn btn-dark" href="{{ route('medicos') }}"><i class="fas fa-angle-left"></i> Voltar</a>    
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>Salvar</button>                        
            </div>
        </div>
   
    </form>
    </fieldset>
@endsection