@extends('layout')

@section('document')
    Visualizar Colaboradores
@endsection


@section('content')

<ul>
<div>
    <form action="{{ route('show_ex_employees') }}" method="get" class="p-4 border rounded shadow-sm bg-light">
        <div class="mb-3">
            <label for="search" class="form-label">Buscar por NOME:</label>
            <input name="search" type="text" id="search" class="form-control" placeholder="Digite o nome">
        </div>
        <div class="mb-3">
            <label for="search2" class="form-label">Buscar por CPF:</label>
            <input name="search2" type="text" id="search2" class="form-control" placeholder="Digite o CPF" oninput="mascaraCPF(this)">
        </div>
        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>
<br><br><br>    
</div>

<div class="alert alert-warning">
    <p>obs: Os dados serão apagados após 5 anos a partir da data de demissão.</p>
</div>


@foreach ($list as $employee) 
    <li class="list-group-item d-flex align-items-center justify-content-between">
    <div class="d-flex align-items-center">
        <div class="ml-3">
            <ul class="list-none space-y-2">
                <li><strong>Nome:</strong> <span>{{$employee->name}}</span></li>
                <li><strong>CPF:</strong> <span>{{$employee->cpf}}</span></li>
                <li><strong>Email:</strong> <span>{{$employee->email}}</span></li>
                <li><strong>Departamento:</strong> <span>{{$employee->name_department}}</span></li>
                <li><strong>Cargo:</strong> <span>{{$employee->position}}</span></li>
                <li><strong>Salário:</strong> <span>R$ {{ $employee->salary }}</span></li>
                <li><strong>Data de Contratação:</strong> <span>{{ \Carbon\Carbon::parse($employee->hire_date)->format('d/m/Y') }}</span></li>
                <li><strong>Data de Demissão:</strong> <span>{{ $employee->dismissal_date ? \Carbon\Carbon::parse($employee->dismissal_date)->format('d/m/Y') : 'N/A' }}</span></li>
                <li><strong>Motivo:</strong> <span>{{$employee->reason ?? 'Não informado'}}</span></li>
                <li><strong>Aviso Prévio:</strong> <span>{{$employee->notice_period}}</span></li>
                <li><strong>Comentários:</strong> <span>{{$employee->comments ?? 'Sem comentários'}}</span></li>
                <li><strong>Materiais Devolvidos:</strong> <span>{{$employee->materials_returned }}</span></li>
                <li><strong>Documentos Devolvidos:</strong> <span>{{$employee->documents_returned}}</span></li>
            </ul>
        </div>
        
    </div>

</li>
    <hr>
@endforeach
</ul>
{{$list->links()}}
@endsection

<script>
function mascaraCpf(cpf) {
    cpf = cpf.replace(/\D/g, '');  // Remove qualquer caractere não numérico
    if (cpf.length === 11) {
        return cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
    } else {
        return 'CPF inválido';
    }
}
</script>