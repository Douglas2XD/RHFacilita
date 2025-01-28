@extends('layout')

@section('document')
    Visualizar Colaboradores
@endsection


<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form method="POST" action="{{route('store_termination')}}" class="container mt-4">
    @csrf
    <img 
    src="{{asset('assets/profile_pic/'.$employee->profile_pic)}}" 
    alt="Foto de Perfil" 
    class="rounded-circle mr-3" 
    style="width: 80px; height: 80px; object-fit: cover;"
>
    

    <div class="mb-3">
        <label for="name" class="form-label">Nome do Funcionário</label>
        <input type="text" id="name_hidden" name="name" value="{{$employee->name ?? " "}}" hidden>
        <input type="text" id="name" name="name" class="form-control" value="{{$employee->name ?? " "}}" disabled>
    </div>
    
    <div class="mb-3">
        <label for="Cpf" class="form-label">CPF</label>
        <input type="text" id="cpf_hidden" name="cpf" value="{{ $employee->cpf ?? ' ' }}" hidden>
        <input type="text" id="cpf" name="cpf" class="form-control" value="{{ $employee->cpf ?? ' ' }}" disabled>
    </div>
    
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" id="email_hidden" name="email" value="{{ $employee->email ?? ' ' }}" hidden>
        <input type="text" id="email" name="email" class="form-control" value="{{ $employee->email ?? ' ' }}" disabled>
    </div>
    
    <div class="mb-3">
        <label for="name_departament" class="form-label">Departamento</label>
        <input type="text" id="name_departament_hidden" name="name_departament" value="{{ $employee->departament->name_departament ?? ' ' }}" hidden>
        <input type="text" id="name_departament" name="name_departament" class="form-control" value="{{ $employee->departament->name_departament ?? ' ' }}" disabled>
    </div>
    
    <div class="mb-3">
        <label for="position" class="form-label">Posição</label>
        <input type="text" id="position_hidden" name="position" value="{{ $employee->departament->position ?? ' ' }}" hidden>
        <input type="text" id="position" name="position" class="form-control" value="{{ $employee->departament->position ?? ' ' }}" disabled>
    </div>
    
    <div class="mb-3">
        <label for="salary" class="form-label">Salário</label>
        <input type="text" id="salary_hidden" name="salary" value="{{ $employee->salary ?? ' ' }}" hidden>
        <input type="text" id="salary" name="salary" class="form-control" value="R$ {{ $employee->salary ?? ' ' }}" disabled>
    </div>
    
    <div class="mb-3">
        <label for="hire_date" class="form-label">Data de Admissão</label>
        <input type="date" id="hire_date_hidden" name="hire_date" value="{{ $employee->departament->admission_date ?? ' ' }}" hidden>
        <input type="date" id="hire_date" name="hire_date" class="form-control" value="{{ $employee->departament->admission_date ?? ' ' }}" disabled>
    </div>

    <div class="mb-3">
        <label for="data_demissao" class="form-label">Data de Demissão</label>
        <input type="date" id="data_demissao" name="dismissal_date" class="form-control" value="{{ old('data_demissao') }}" required>
    </div>
    
    <div class="mb-3">
        <label for="motivo" class="form-label">Motivo da Demissão</label>
        <select id="motivo" name="reason" class="form-select" required>
            <option value="">Selecione...</option>
            <option value="pedido_demissao" {{ old('motivo') == 'pedido_demissao' ? 'selected' : '' }}>Pedido de Demissão</option>
            <option value="sem_justa_causa" {{ old('motivo') == 'sem_justa_causa' ? 'selected' : '' }}>Dispensa Sem Justa Causa</option>
            <option value="com_justa_causa" {{ old('motivo') == 'com_justa_causa' ? 'selected' : '' }}>Dispensa Com Justa Causa</option>
            <option value="termino_contrato" {{ old('motivo') == 'termino_contrato' ? 'selected' : '' }}>Término de Contrato</option>
            <option value="acordo_partes" {{ old('motivo') == 'acordo_partes' ? 'selected' : '' }}>Acordo Entre as Partes</option>
        </select>
    </div>
    
    <div class="mb-3">
        <label for="aviso_previo" class="form-label">Aviso Prévio</label>
        <select id="aviso_previo" name="notice_period" class="form-select">
            <option value="cumprido" {{ old('aviso_previo') == 'cumprido' ? 'selected' : '' }}>Cumprido</option>
            <option value="não_cumprido" {{ old('aviso_previo') == 'não_cumprido' ? 'selected' : '' }}>Não Cumprido</option>
            <option value="dispensa" {{ old('aviso_previo') == 'dispensa' ? 'selected' : '' }}>Dispensa de Aviso Prévio</option>
        </select>
    </div>
    
    <div class="mb-3">
        <label for="observacoes" class="form-label">Observações</label>
        <textarea id="observacoes" name="comments" class="form-control" rows="4" placeholder="Exemplo: Motivo específico para a demissão"></textarea>
    </div>
    
    <div class="mb-3">
        <label for="materiais" class="form-label">Devolução de Materiais</label>
        <textarea id="materiais" name="materials_returned" class="form-control" rows="4" placeholder="Ex: Cartão de acesso, notebook, uniforme..."></textarea>
    </div>
    
    <div class="mb-3">
        <label for="documentos_entregues" class="form-label">Documentos Entregues</label>
        <textarea id="documentos_entregues" name="documents_returned" class="form-control" rows="4" placeholder="Ex: CTPS, Termo de Rescisão..."></textarea>
    </div>
    
    
    <br><br><br><br>
    <input type="number" name="id_employee" value="{{$employee->id}}" hidden>
    <input type="number" name="removed_by" value="{{ auth()->id()}}" hidden>
    <button type="submit" class="btn btn-danger  w-100">DESLIGAR</button>
</form>
<script src="{{asset('scripts/jquery-3.7.1.min.js')}}"></script>

<script src="{{asset('scripts/jquery.mask.min.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.1/dist/js/bootstrap-select.min.js"></script>

@endsection