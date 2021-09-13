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
   <legend  class="w-auto">Cadastrar novo Agendamento </legend>
    <form action="{{ route('agendamento-store') }}" method="POST" >
        @csrf

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Título:</strong>
                        <input type="text" name="ds_agendamento" class="form-control" placeholder="Título">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Médico:</strong>
                        <select class="form-control" name="cd_medico">
                            <option value="0"> Selecione o Médico</option>
                            @foreach ($medicos as $medico)
                                <option value="{{$medico->cd_medico}}"> {{ $medico->nm_medico }}</option>
                            @endforeach                        
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Paciente:</strong>
                        <select class="form-control" name="cd_paciente">
                            <option value="0"> Selecione o Paciente</option>
                            @foreach ($pacientes as $paciente)
                                <option value="{{$paciente->cd_paciente}}"> {{ $paciente->nm_paciente }}</option>
                            @endforeach                        
                        </select>
                    </div>
                </div>
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <strong>Data inicio:</strong>
                    <div class='input-group date'>
                        <input type="text" name="dt_agendamento_inicio" class="form-control datepicker" placeholder="dd/mm/aaaa" value="">                    
                        <input type="text" name="hora_inicio" class="form-control" placeholder="HH:mm" value="">
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <strong>Data final:</strong>
                    <div class='input-group date'>
                        <input type="text" name="dt_agendamento_final" class="form-control datepicker" placeholder="dd/mm/aaaa" value="">
                        <input type="text" name="hora_final" class="form-control" placeholder="HH:mm" value="">
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Observação:</strong>
                        <textarea  class="form-control" rows="4" cols="200"></textarea>
                    </div>
                </div>
            <div class="row"><div class="col-xs-12 col-sm-12 col-md-12 text-center"><br></div></div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <a class="btn btn-dark" href="{{ route('pacientes') }}"><i class="fas fa-angle-left"></i> Voltar</a>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </div>          
    </form>
</fieldset>

    <script type="text/javascript">

        $(function() {
            $('.datepicker').datepicker(
                {
                    format: 'yyyy/mm/dd',
                    dateFormat: 'yy-mm-dd',
                    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
                    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
                    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
                    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
                    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
                    nextText: 'Próximo',
                    prevText: 'Anterior'
                }
            );
        });
    </script> 
@endsection