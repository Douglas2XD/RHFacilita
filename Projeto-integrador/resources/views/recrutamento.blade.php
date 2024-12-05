@extends('layout')


@section('content')
<hr>
      <div class="shortcuts">
        <h2>Painel de controle de Colaboradores</h2>
        <div class="row">
          <!-- Card 1 -->
          <div class="col-md-4 mb-3">
            <div class="shortcut-card p-3">
              <i class="fas fa-id-card mr-2 fa-2x mb-3 gold-icon"></i>
              <a style="text-decoration: none;" href="{{route('register_employees')}}">
                <div class="shortcut-title font-weight-bold">Cadastro de Colaboladores</div>
              </a>
              <p class="shortcut-description text-muted">Cadastre novos funcionários aqui.</p>
            </div>
          </div>
          
          <div class="col-md-4 mb-3">
            <div class="shortcut-card p-3">
              <i class="fas fa-user fa-2x mb-3 gold-icon"></i>
              <a href="{{route('show_employees')}}" style="text-decoration: none;"><div class="shortcut-title font-weight-bold">Visualizar Colaboladores</div></a>
              <p class="shortcut-description text-muted">Visualizar funcionários</p>
            </div>
          </div>

          <div class="col-md-4 mb-3">
            <div class="shortcut-card p-3">
              <i class="fas fa-user-times fa-2x mb-3 gold-icon"></i>
              <a href="ainda_em_desenvolvimento.html" style="text-decoration: none;"><div class="shortcut-title font-weight-bold">Desligar funcionário</div></a>
              <p class="shortcut-description text-muted">Desligar funcionário</p>
            </div>
          </div>

          <!-- Outros cards seguem... -->
        </div>
      </div>
    </main>
  </div>
@endsection


