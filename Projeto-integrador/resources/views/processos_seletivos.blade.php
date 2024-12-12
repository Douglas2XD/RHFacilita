@extends('layout')

@section('document')
    Processos Seletivos
@endsection

@section('content')

<div class="shortcuts">
    <h2>Processos Seletivos</h2>
    
    <div class="row">
      <!-- Card 1 -->
      <div class="col-md-4 mb-3">
        <div class="shortcut-card p-3">
          <i class="fas fa-user-plus fa-2x mb-3 gold-icon"></i>
          <a href="{{route('create_job_vacancy')}}" style="text-decoration: none;"><div class="shortcut-title font-weight-bold">Criar Vaga</div>
          </a>
          <p class="shortcut-description text-muted">Crie ou edite novas vagas de empregos. </p>
        </div>
      </div>
  
      <!-- Card 2 -->
      <div class="col-md-4 mb-3">
        <div class="shortcut-card p-3">
          <i class="fas fa-users fa-2x mb-3 gold-icon"></i>
          <a href="{{route('show_all_candidates')}}" style="text-decoration: none;"><div class="shortcut-title font-weight-bold">Visualizar Candidatos</div></a>
          <p class="shortcut-description text-muted">Visualize todos candidatos as vagas abertas</p>
        </div>
      </div>
  
      <!-- Card 3 -->
      <div class="col-md-4 mb-3">
        <div class="shortcut-card p-3">
          <i class="fas fa-folder fa-2x mb-3 gold-icon"></i>
          <a href="{{route('latest_processes')}}" style="text-decoration: none;"><div class="shortcut-title font-weight-bold">Ultimos Processos seletivos</div></a>
          <p class="shortcut-description text-muted">Visualize histórico dos ultimos processos seletivos.
            e seus respectivos candidatos.</p>
        </div>
      </div>
    </div>        
      
    </div>
  </div>


@endsection

