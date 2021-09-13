@extends('layouts.app')
@section('content')

   <fieldset class="border p-2">
   <legend  class="w-auto">Pacientes <a class="btn btn-success" href="{{ route('paciente-create') }}" title="Cadastrar Paciente"> <i class="fas fa-plus-circle"></i>
                    </a></legend>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ session()->get('success') }}</p>
        </div>
    @endif
    <table class="table table-bordered table-responsive-lg" id="table_pacientes">
        <thead>
        <tr>
            <th>Id</th>
            <th>Nome</th>        
            <th>Ações</th>
        </tr>
</thead>
<tbody>
        @foreach ($pacientes as $paciente)        
            <tr>
                <td><?=$paciente->cd_paciente; ?></td>            
                <td><?=$paciente->nm_paciente; ?></td>
                <td>
                    <form action="" method="POST">

                        <a href="{{ route('paciente-show',$paciente->cd_paciente) }}" title="Detalhes">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>

                        <a href="{{ route('paciente-edit',$paciente->cd_paciente) }}" title="Editar">
                            <i class="fas fa-edit  fa-lg"></i>
                        </a>

                        <a href="{{ route('paciente-delete',$paciente->cd_paciente) }}" title="Excluir">
                            <i class="fas fa-trash fa-lg text-danger"></i>
                        </a>


                      
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</fieldset>


<script>
    $(document).ready(function() {
        $('#table_pacientes').DataTable({
            "oLanguage": {
                "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "Nenhum resultado encontrado",
        "sEmptyTable":     "Nenhum resultado encontrado",
        "sInfo":           "Mostrando registros de _START_ a _END_ de um total de _TOTAL_ registros",
        "sInfoEmpty":      "Mostrando registros de 0 al 0 de um total de 0 registros",
        "sInfoFiltered":   "(filtrado de um total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Carregando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Ativar para ordenar a columna de maneira crescente",
            "sSortDescending": ": Ativar para ordenar a columna de maneira decrescente"
        }
    }
        });
    } );
</script>
@endsection