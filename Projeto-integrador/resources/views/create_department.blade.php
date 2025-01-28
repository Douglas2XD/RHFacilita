@extends('layout')

@section('document')
    Criar Departamento 
@endsection


@section('content')
        
    <form class="employee-form" action="{{route('store_department')}}" method="post">
        @csrf
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
    
    <div class="hr-text">Departamento</div>

    <label>Nome</label>
    <input type="text" name="name_departament">
    
    <input type="submit">
            
    </form>




@endsection