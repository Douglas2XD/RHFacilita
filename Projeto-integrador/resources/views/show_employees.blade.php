@extends('layout')

@section('content')


<style>
        img {
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
    <li><a class="btn btn-warning" href="{{route('edit',$employee->id)}}">EDITAR</a> <img src="{{asset('assets/profile_pic/'.$employee->profile_pic)}}"> {{"$employee->name - $employee->cpf - $employee->marital_status -  $employee->pwd"}} <a href="{{route('delete',$employee)}} "class='btn btn-danger'>DESLIGAR</a> </li>
    <hr>
@endforeach
</ul>
{{$list->links()}}
@endsection