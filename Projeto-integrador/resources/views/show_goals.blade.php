@extends('layout')

@section('document')
    Visualizar Metas
@endsection

<link rel="stylesheet" href="{{asset('css/styles_processos')}}">

@section('content')

<h2>Todas as metas</h2>
<hr>

@if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

@foreach ($list as $goal)




<div class="job-card">
    @if($goal->situation == "Não Concluído")
    <div class="alert alert-danger"> {{ $goal->situation }}  </div>
    @elseif($goal->situation == "Finalizado")
    <div class="alert alert-info"> {{ $goal->situation }}  </div>
    @else
    <div class="alert alert-success"> {{ $goal->situation }}  </div>
    @endif


    <h2 class="job-title"> </h2>
    <p class="job-description">
        <strong>Nome:</strong>  {{ $goal->name }} 
    </p>
    
    <p class="job-description">
        <strong>Descrição:</strong>  {{ $goal->description }} 
    </p>


    <p class="job-description">
        <strong> Data de inicio:</strong>  {{ \Carbon\Carbon::parse($goal->start_data)->format('d/m/Y') }} 
    </p>

    <p class="job-description">
        <strong> Data de fim:</strong> {{ \Carbon\Carbon::parse($goal->end_date)->format('d/m/Y') }} 
        
    </p>
    <p class="job-description">
        <strong> Participantes:</strong>  {{ $goal->participants }} 
    </p>



    <a class="btn btn-danger" href="{{ route('delete_goal',$goal) }}">Deletar</a>
    <a class="btn btn-info" href="{{ route('edit_goal',$goal) }}">Editar Meta</a>



</div>

@endforeach








@endsection
