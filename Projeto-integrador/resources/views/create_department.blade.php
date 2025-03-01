@extends('layout')

@section('document')
    Criar Departamento 
@endsection

<style>
    #invisivelBtn{
        display: none;
    }
    
    #mostrarMsg{
        display: none;
    }
</style>

@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


@if (isset($department->id) and $department->id)
        <form class="employee-form" action="{{route('update_department',$department)}}" method="post">
            @method('PUT')
            @csrf
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
    @else
    <form class="employee-form" action="{{route('store_department')}}" method="post">
        @csrf    
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
        
        @csrf

        @endif
@endif

    <div class="hr-text">Departamento</div>
    <div id="mostrarMsg" class="alert alert-warning">
        Por favor, confirme os dados
    </div>
    <label>Nome</label>
    <input type="text" name="name_department" value="{{ $department->name_department ?? ""}} ">
    <button id="invisivelBtn" class="btn btn-success w-100" style="display: none;">Confirmar Departamento</button>

    <br><br>
    @if (isset($department->id) and $department->id)
    <i id="mostrarBtn" class="btn btn-primary p-2 w-100" style="cursor: pointer;">Alterar departamento</i>
    @else
    <i id="mostrarBtn" class="btn btn-primary p-2 w-100" style="cursor: pointer;">Criar departamento</i>
    @endif    
</form>
    
<script>
    document.getElementById("mostrarBtn").addEventListener("click", function() {
    document.getElementById("invisivelBtn").style.display = "inline"; // Torna o botão visível
    document.getElementById("mostrarMsg").style.display = "inline";
    document.getElementById("mostrarBtn").style.display = "none";
    });



    document.addEventListener('keydown', function(event) {
    if (event.key === 'Enter') {
        event.preventDefault(); 
    }
});
</script>






@endsection