@extends('layouts.app')
@section('content')

   <fieldset class="border p-2">
   <legend  class="w-auto">Agendamentos <a class="btn btn-success" href="{{ route('agendamento-create') }}" title="Cadastrar Agendamento"> <i class="fas fa-plus-circle"></i>
                    </a></legend>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ session()->get('success') }}</p>
        </div>
    @endif
    <table class="table table-bordered table-responsive-lg" id="table_agendamentos">
        <thead>
        <tr>
            <th>Título</th>
            <th>Médico</th>
            <th>Paciente</th>
            <th>Data / Hora inicial</th>        
            <th>Data / Hora final</th>        
            <th>Ações</th>
        </tr>
</thead>
<tbody>
        @foreach ($agendamentos as $agendamento) 
        <?php 
        $dataInicioFormatada = date("d/m/Y", strtotime($agendamento->dt_agendamento_inicio));
        $dataFinalFormatada = date("d/m/Y", strtotime($agendamento->dt_agendamento_final));
        ?>       
            <tr>
                <td><?=$agendamento->ds_agendamento; ?></td>            
                <td><?=$agendamento->nm_medico; ?></td>
                <td><?=$agendamento->nm_paciente; ?></td>
                <td><?=$dataInicioFormatada. " às " . $agendamento->hora_inicio; ?></td>
                <td><?=$dataFinalFormatada. " às " . $agendamento->hora_final; ?></td>
                <td>
                    <form action="" method="POST">

                        <a href="{{ route('agendamento-show',$agendamento->cd_agendamento) }}" title="Detalhes">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>

                        <a href="{{ route('agendamento-edit',$agendamento->cd_agendamento) }}" title="Editar">
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
        $('#table_agendamentos').DataTable({
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