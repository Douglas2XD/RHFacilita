@extends('layout')

@section('document')
    Departamentos
@endsection

@section('content')


<div class="container mt-5">
    <h2 class="mb-4">Lista de todos os Departamentos  <a href="{{route('create_department')}}" class="btn btn-primary btn-sm" target="_blank">
        Criar Novo Departamento
    </a>  </h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Total de Funcionários</th>
                <th>Acessar</th>
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
            </tr>
            @endforeach
        </tbody>
    </table>
</div>






@endsection