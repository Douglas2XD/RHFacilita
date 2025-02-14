@extends('layout')

@section('document')
    Metas
@endsection


@section('content')
<h2>Metas</h2>
<hr>
    <div class="shortcuts">
      
      
      <div class="row">
        <!-- Card 1 -->
        <div class="col-md-4 mb-3">
          <div class="shortcut-card p-3">
            <i class="fas fa-plus fa-2x mb-3 gold-icon"></i>
            <a href="{{route('form_goals')}}" style="text-decoration: none;"><div class="shortcut-title font-weight-bold">Criar Metas</div>
            </a>
            <p class="shortcut-description text-muted">Crie novas metas para sua equipe</p>
          </div>
        </div>


        <div class="col-md-4 mb-3">
            <div class="shortcut-card p-3">
                <i class="fas fa-tasks fa-2x mb-3 gold-icon"></i>
              <a href="{{route('show_goals')}}" style="text-decoration: none;"><div class="shortcut-title font-weight-bold">Gerenciar metas</div>
              </a>
              <p class="shortcut-description text-muted">Visualize, Edite ou Exclua</p>
            </div>
          </div>
    </div>
</div>

@endsection

