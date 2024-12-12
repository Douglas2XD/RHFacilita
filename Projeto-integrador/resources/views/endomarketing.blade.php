@extends('layout')

@section('document')
    Endomarketing
@endsection


@section('content')
<h2>Endomarketing</h2>
<hr>
<h3>Próximos aniversariantes: </h3>   
<div class="card-container" style="display:flex">    
    @foreach ($employees as $aniversariante)
    
    <div class="card" style="width: 10rem;" >
    <img src="{{asset('assets/profile_pic/'.$aniversariante->profile_pic)}}" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text"> {{$aniversariante->name}} 
            {{$aniversariante->birth_date}}
            
            </p>
        </div>
    </div>
    
    @endforeach
    </div>

<h3>Aniversariantes do próximo mês: </h3>   
    <div class="card-container" style="display:flex">
        @foreach ($next_employees as $aniversariante)
        <div class="card" style="width: 10rem;">
        <img src="{{asset('assets/profile_pic/'.$aniversariante->profile_pic)}}" class="card-img-top" alt="...">
            <div class="card-body">
                <p class="card-text"> {{$aniversariante->name}} 
                    {{$aniversariante->birth_date}}
                </p>
            </div>
        </div>
        @endforeach
    </div>
    @endsection