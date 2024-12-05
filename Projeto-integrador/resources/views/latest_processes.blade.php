@extends('layout')

@section('content')

<link rel="stylesheet" href="{{asset('css/styles_processos')}}">

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@foreach ($list as $vaga )


<div class="job-card">
    <h2 class="job-title"> </h2>
    <p class="job-description">
        <strong>Descrição da Vaga:</strong>  {{$vaga->title}}
    </p>
    <p class="job-requirements">
        <strong>Requisitos:</strong> {{$vaga->requirements}}
    </p>
    <p class="job-salary">
        <strong>Salário:</strong> {{$vaga->remuneration}}
    </p>
    <p class="job-contract">
        <strong>Tipo de Contrato:</strong> {{$vaga->contract_type}}
    </p>
    <p class="job-location">
        <strong>Localização:</strong> {{$vaga->location}}
    </p>
    <p class="job-benefits">
        <strong>Benefícios:</strong> {{$vaga->benefits}}
    </p>
    <p class="job-benefits">
        <strong>Criado:</strong> {{$vaga->created_at}}
    </p>
    <a class="btn btn-danger" href="{{route('delete_vacancy',$vaga)}}">Delete</a>

    <a class="btn btn-warning" href="{{route('show_candidates', $vaga->id)}}">Visualizar Candidatos</a>
</div>

@endforeach


@endsection