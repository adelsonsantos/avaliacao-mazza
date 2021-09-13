@extends('layouts.app')

@section('content')
<div class="row">
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-dark">
              <div class="inner">
                <p>Agendamentos Cadastrados</p>
                <h3>{{$agendamentos}}</h3>               
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>              
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
              <p>Médicos cadastrados</p>  
              <h3>{{$medicos}}</h3>              
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>            
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4  col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <p>Pacientes Cadastrados</p>
                <h3>{{$pacientes}}<sup style="font-size: 20px"></sup></h3>                
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>              
            </div>
          </div>         
        </div>
@endsection
