@extends('layout')

@section('document')
    Departamentos
@endsection

@section('content')

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
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

    <div class="alert alert-info">
        <p>  Departamentos com funcionários não podem ser deletados</p>
    </div>


    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Total de Funcionários</th>
                <th>Acessar</th>
                <th>Deletar</th>
                <th>Editar</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach ($list as $department)
            
            <tr>
                <td>{{$department->name_department}}</td>
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

                <td>
                    <a href="{{route('edit_department',$department)}}" class="btn btn-info btn-sm mr-2" target="_blank">
                        Editar
                    </a>
                </td>
                
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>



{{ $list->links() }}


@endsection