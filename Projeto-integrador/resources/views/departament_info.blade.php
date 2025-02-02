@extends('layout')

@section('document')
    Departamento-info
@endsection
@section('content')
<h2>Departamento:   {{$departament->name_departament}}</h2>
@foreach ($employees as $employee)
<li class="list-group-item d-flex align-items-center justify-content-between">
    <div class="d-flex align-items-center">
        <!-- Imagem -->
        <img src="{{asset('assets/profile_pic/'.$employee->profile_pic)}}" alt="" class="img-fluid rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">

        <div class="ml-3">
            <ul class="list-none space-y-2">
                <li><strong>Nome:</strong> <span>{{$employee->name}}</span></li>
                <li><strong>CPF:</strong> <span>{{$employee->cpf}}</span></li>
                <li><strong>Email:</strong> <span>{{$employee->email}}</span></li>
                <li><strong>Cargo:</strong> <span>{{$employee->professional_data->position}}</span></li>
                <li><strong>Salário:</strong> <span>R$ {{ $employee->professional_data->salary }}</span></li>
                <li><strong>Data de Contratação:</strong> <span>{{ \Carbon\Carbon::parse($employee->hire_date)->format('d/m/Y') }}</span></li>
            </ul>
        </div>
    </div>
</li>
    <hr>
@endforeach
<br><br><br>
<hr>
<h2>METAS:</h2>


@endsection