@extends('layouts.app')
@section('content')

   <fieldset class="border p-2">
   <legend  class="w-auto">Médicos <a class="btn btn-success" href="{{ route('create') }}" title="Cadastrar Médico"> <i class="fas fa-plus-circle"></i>
                    </a></legend>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ session()->get('success') }}</p>
        </div>
    @endif
    <table class="table table-bordered table-responsive-lg" id="table_medicos">
        <thead>
        <tr>
            <th>Id</th>
            <th>Nome</th>        
            <th>Ações</th>
        </tr>
</thead>
<tbody>
        @foreach ($medicos as $medico)        
            <tr>
                <td><?=$medico->cd_medico; ?></td>            
                <td><?=$medico->nm_medico; ?></td>
                <td>
                    <form action="" method="POST">

                        <a href="{{ route('show',$medico->cd_medico) }}" title="Detalhes">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>

                        <a href="{{ route('medicos.edit',$medico->cd_medico) }}" title="Editar">
                            <i class="fas fa-edit  fa-lg"></i>
                        </a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" title="Excluir" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</fieldset>


<script>
    $(document).ready(function() {
        $('#table_medicos').DataTable({
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