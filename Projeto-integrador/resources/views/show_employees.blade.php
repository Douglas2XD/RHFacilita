@extends('layout')

@section('document')
    Visualizar Colaboradores
@endsection


@section('content')


<style>
        img.rounded-circle mr-3 {
              width: 100px; /* Largura da imagem */
              height: 100px; /* Altura da imagem */
              border-radius: 50%; /* Deixa a imagem circular */
              object-fit: cover; /* Ajusta o conteúdo para caber no círculo */
              border: 2px solid #ccc; /* Adiciona uma borda fina */
            }
    </style>




<ul>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<h2>Todos os Colaboradores</h2>
@foreach ($list as $employee) 
    @if($employee->pwd == 0 )
    
    <?php 
        $employee->pwd = "NÃO POSSUI DEFICIÊNCIA!"
    ?>
    @else
    <?php 
        $employee->pwd = "POSSUI DEFICIÊNCIA!"
    ?>
    @endif
    <li class="list-group-item d-flex align-items-center justify-content-between">
    <!-- Coluna com informações e imagem -->
    <div class="d-flex align-items-center">
        
        <!-- Imagem de perfil -->
        <img 
            src="{{asset('assets/profile_pic/'.$employee->profile_pic)}}" 
            alt="Foto de Perfil" 
            class="rounded-circle mr-3" 
            style="width: 50px; height: 50px; object-fit: cover;"
        >
        <!-- Informações do funcionário -->
        <div class="ml-3">
            <strong>{{$employee->name}}</strong><br>
            <span>{{$employee->cpf}} - {{$employee->marital_status}} - {{$employee->pwd}}</span>
            
        </div>
    </div>

    <!-- Botões de ação -->
    <div>
        <a class="btn btn-warning btn-sm mr-2" href="{{route('edit',$employee->id)}}">EDITAR</a>
        <a href="{{route('analisar_demissao',$employee)}}" class="btn btn-danger btn-sm">DESLIGAR</a>
    </div>
</li>
    <hr>
@endforeach
</ul>
{{$list->links()}}
@endsection