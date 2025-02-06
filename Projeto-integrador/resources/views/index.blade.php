@extends('layout')

@section('document')
    Home
@endsection


@section('content')
<hr>
    <div class="shortcuts">
      <h2>Atalhos rápidos</h2>
      
      <div class="row">
        <!-- Card 1 -->
        <div class="col-md-4 mb-3">
          <div class="shortcut-card p-3">
            <i class="fas fa-cogs fa-2x mb-3 gold-icon"></i>
            <a href="{{route('ainda_em_desenvolvimento')}}" style="text-decoration: none;"><div class="shortcut-title font-weight-bold">Processo de organização</div>
            </a>
            <p class="shortcut-description text-muted">Definição de missão, visão e valores para alinhar a equipe.</p>
          </div>
        </div>
      
        <!-- Card 2 -->
        <div class="col-md-4 mb-3">
          <div class="shortcut-card p-3">
            <i class="fas fa-bullseye fa-2x mb-3 gold-icon"></i>
            <a href="{{route('ainda_em_desenvolvimento')}}" style="text-decoration: none;"><div class="shortcut-title font-weight-bold">Planejamento estratégico</div></a>
            <p class="shortcut-description text-muted">Definição de metas e estratégias para os objetivos de longo prazo.</p>
          </div>
        </div>
    
        <!-- Card 3 -->
        <div class="col-md-4 mb-3">
          <div class="shortcut-card p-3">
            <i class="fas fa-sitemap fa-2x mb-3 gold-icon"></i>
            <a href="{{route('ainda_em_desenvolvimento')}}" style="text-decoration: none;"><div class="shortcut-title font-weight-bold">Estrutura organizacional</div></a>
            <p class="shortcut-description text-muted">Organização hierárquica e responsabilidades da empresa.</p>
          </div>
        </div>
      </div>
    
      <div class="row">
        <!-- Card 4 -->
        <div class="col-md-4 mb-3">
          <div class="shortcut-card p-3">
            <i class="fas fa-smile fa-2x mb-3 gold-icon"></i>
            <a href="{{route('ainda_em_desenvolvimento')}}" style="text-decoration: none;"><div class="shortcut-title font-weight-bold">Gestão de clima</div> </a>
            <p class="shortcut-description text-muted">Avaliação da satisfação e motivação dos colaboradores no ambiente de trabalho.</p>
          </div>
        </div>
    
        <!-- Card 5 -->
        <div class="col-md-4 mb-3">
          <div class="shortcut-card p-3">
            <i class="fas fa-bullhorn fa-2x mb-3 gold-icon"></i>
            <a href="{{route('endomarketing')}}" style="text-decoration: none;"><div class="shortcut-title font-weight-bold">Plano de endomarketing</div></a>
            <p class="shortcut-description text-muted">Estratégias internas para engajar e motivar os colaboradores.</p>
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <div class="shortcut-card p-3">
            <i class="fas fa-user-times fa-2x mb-3 gold-icon"></i>
            <a href="{{route('ainda_em_desenvolvimento')}}" style="text-decoration: none;"> <div class="shortcut-title font-weight-bold">Gestão de desligamento</div></a>
            <p class="shortcut-description text-muted">Processo de desligamento de colaboradores com suporte adequado.</p>
          </div>
        
      </div>        
      </div>
    </div>

  </main>
</div>
@endsection