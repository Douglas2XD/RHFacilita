@extends('layout')

@section('document')
    Endomarketing
@endsection

<style>
   

    .card {
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        width: 300px;
        text-align: center;
        overflow: hidden;
    }

    .card img {
        width: 100%;
        height: auto;
    }

    .card h2 {
        margin: 10px 0;
        font-size: 24px;
        color: #333;
    }

    .card p {
        margin: 5px 0;
        color: #666;
    }

    .card .info {
        padding: 15px;
    }
</style>


@section('content')
<h2>Endomarketing</h2>

@if($employees->count() > 0)
<hr>
<h3>Próximos aniversariantes: </h3>   
<div class="card-container" style="display:flex">    
    @foreach ($employees as $aniversariante)

    <div class="card">
        <img src="{{asset('assets/profile_pic/'.$aniversariante->profile_pic)}}" class="card-img-top" alt="...">
        <div class="info">
            <h2>{{$aniversariante->name}}</h2>
            <p>Completa: {{$aniversariante->age}}</p>
            <p>Data niver: {{$aniversariante->date_birth}} </p>
            <p></p>
        </div>
    </div>

    
    @endforeach
    </div>
@endif
@if($next_employees->count() > 0)

<h3>Aniversariantes do próximo mês: </h3>   
    <div class="card-container" style="display:flex">
        @foreach ($next_employees as $aniversariante)
        <div class="card">
            <img src="{{asset('assets/profile_pic/'.$aniversariante->profile_pic)}}" class="card-img-top" alt="...">
            <div class="info">
                <h2>{{$aniversariante->name}}</h2>
                <p>Completa: {{$aniversariante->age}}</p>
                <p>Data niver: {{$aniversariante->date_birth}} </p>
                <p></p>
            </div>
        </div>
        @endforeach
    </div>
@endif

<hr>
<h3>Sorteio Geral (Todos concorrem) </h3>
    <form action="{{route('draw')}}" method="GET">
        @csrf
        <select name="id_department">
            <option value="">TODOS</option>
            @foreach($departments as $department)
            <option value="{{$department->id}}">
                {{$department->name_department}}
            </option>
            @endforeach
        </select>
        
        <button class="btn btn-success">Sortear</button>
    </form>
    
    @endsection