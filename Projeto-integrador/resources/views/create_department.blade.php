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
        

    

    <form class="employee-form" action="{{route('store_department')}}" method="post">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
        
        @csrf
            
    
    <div class="hr-text">Departamento</div>
    <div id="mostrarMsg" class="alert alert-warning">
        Por favor, confirme os dados
    </div>
    <label>Nome</label>
    <input type="text" name="name_departament">
    <button id="invisivelBtn" class="btn btn-success w-100" style="display: none;">Confirmar Departamento</button>

    <br><br>
    <i id="mostrarBtn" class="btn btn-primary p-2 w-100" style="cursor: pointer;">Criar departamento</i>
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