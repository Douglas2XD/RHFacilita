@extends('layout')

@section('document')
    Painel de Colaboradores
@endsection

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
              <a href="{{route('show_employees')}}" style="text-decoration: none;"><div class="shortcut-title font-weight-bold">Gerenciar Colaboradores</div></a>
              <p class="shortcut-description text-muted">Visualize, Edite ou Desligue</p>
            </div>
          </div>
          <!--  -->


        </div>
      </div>
    </main>
  </div>
@endsection


