@extends('layout')

@section('document')
    Metas
@endsection


@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (isset($goal->id) and $goal->id)
        <form class="employee-form" action="{{route("update_goal", $goal)}}" method="post">
            @method('PUT')
            @csrf
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
    @else
        <form class="employee-form" action="{{route('create_goals')}}" method="post">
            @csrf
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
@endif
    
    <div class="hr-text">Meta</div>
    <label>Nome da Meta</label>
    <input type="text" name="name" value="{{ $goal->name ?? " " }}">

    <label>Descrição</label>
    <textarea name="description" id="" cols="30" rows="10">{{ $goal->description ?? " " }}</textarea>

    <label>Inicio</label>
    <input type="date" name="start_date" value="{{ $goal->start_date ?? "" }}">

    <label>Data de finalização</label>
    <input type="date" name="end_date" value="{{ $goal->end_date ?? "" }}">

    <label>Departamentos Responsáveis</label>
    <textarea name="participants" id="" cols="30" rows="10"> {{  $goal->participants ?? " " }} </textarea>
    
    <label>Situação</label>
    <select name="situation" id="">
        
        <option value="Em andamento" {{ old('situation',$goal->situation ?? "") == 'Em andamento' ? 'selected' : '' }}>Em andamento</option>
        @if(isset($goal->id) and $goal->id)
        <option value="Finalizado" {{ old('situation',$goal->situation) == 'Finalizado' ? 'selected' : '' }}>Finalizado</option>
        <option value="Não Concluído" {{ old('situation',$goal->situation) == 'Não Concluído' ? 'selected' : '' }}>Não Concluído</option>
        @endif
    </select>
    <br><br><br><br><br><br><br><br>
    <button type="submit" style="background-color: #1a2b49; width: 100%;">Salvar</button>
    
</form>


@endsection