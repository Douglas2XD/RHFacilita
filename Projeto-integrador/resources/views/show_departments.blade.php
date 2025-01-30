@extends('layout')

@section('document')
    Departamentos
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

    
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="container mt-5">
    <h2 class="mb-4">Lista de todos os Departamentos  <a href="{{route('create_department')}}" class="btn btn-success " target="_blank">
        Criar Novo Departamento
    </a>  </h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Total de Funcionários</th>
                <th>Acessar</th>
                <th>Deletar</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach ($list as $department)
            <tr>
                <td>{{$department->name_departament}}</td>
                <td>{{$department->employee_count}}</td>
                <td>
                    <a href="{{route('department_info',$department)}}" class="btn btn-primary btn-sm" target="_blank">
                        Visualizar
                    </a>
                </td>
                <td>
                @if($department->employee_count == 0)
                    <a href="{{route('delete_departament',$department)}}" class="btn btn-danger btn-sm">
                        Deletar
                    </a>
                @else
                    <p>Não pode deletar</p>
                @endif
                
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>






@endsection