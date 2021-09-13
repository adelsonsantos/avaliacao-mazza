@extends('layouts.app')

@section('content')
    <fieldset class="border p-2">
   <legend  class="w-auto">Detalhes do Agendamento</legend>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Título:</strong>

                <?=$agendamentos[0]->ds_agendamento; ?>
            </div>
            <div class="form-group">
                <strong>Médico:</strong>
                <?=$agendamentos[0]->nm_medico; ?>
            </div>
            <div class="form-group">
                <strong>Paciente:</strong>    
                <?=$agendamentos[0]->nm_paciente;  ?>
            </div>
            <div class="form-group">
                <strong>Inicio:</strong>
                <?php $dataInicioFormatada = date("d/m/Y", strtotime($agendamentos[0]->dt_agendamento_inicio)); ?>
                <?=$dataInicioFormatada. " às " . $agendamentos[0]->hora_inicio; ?>
            </div>
            <div class="form-group">
                <strong>Final:</strong>
                <?php $dataFinalFormatada = date("d/m/Y", strtotime($agendamentos[0]->dt_agendamento_final));?>
                <?=$dataInicioFormatada. " às " . $agendamentos[0]->hora_inicio; ?>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <a class="btn btn-dark" href="{{ route('agendamentos') }}"><i class="fas fa-angle-left"></i> Voltar</a>                      
        </div>
    </div>
</fieldset>
@endsection