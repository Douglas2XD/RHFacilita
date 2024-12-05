@extends('layout')

@section('content')
<link rel="stylesheet" href="{{asset('css/styles_cadastrar.css')}}">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if (isset($employee->id) and $employee->id)
        <form class="employee-form" action="{{route("update", $employee)}}" enctype="multipart/form-data" method="post">
            @method('PUT')
    @else
        
        <form class="employee-form" action="{{route('store')}}" enctype="multipart/form-data" method="post">

    @endif
    @csrf
    <div class="hr-text">Dados Pessoais</div>
    <!-- Foto de Perfil -->
    <label>Foto de Perfil</label>
    <div class="photo-preview" id="photo-preview">Prévia da Foto</div>
    <input type="file" name="profile_pic" accept="image/*" onchange="previewFoto(this)">

    <!-- Currículo -->
    <label>Currículo</label>
    <input type="file" name="curriculum" accept=".pdf,.doc,.docx">

    <label>Nome</label>
    <input type="text" name="name" value="{{$employee->name ?? " "}}">

    <label>CPF</label>
    <input type="text" name="cpf" oninput="mascaraCPF(this)" value="{{$employee->cpf ?? " "}}">

    <label>RG</label>
    <input type="text" name="rg" value="{{$employee->rg ?? " "}}">

    <label>Data de Nascimento</label>
    <input type="date" name="birth_date" value="{{$employee->birth_date ?? " "}}">

    <label>Email</label>
    <input type="email" name="email" value="{{$employee->email ?? " "}}">

    <label>Telefone</label>
    <input type="text" name="phone" oninput="mascaraTelefone(this)" value="{{$employee->phone ?? " "}}">

    <label>Sexo</label>
    <select name="gender" value="{{$employee->gender ?? " "}}">
        <option>Masculino</option>
        <option>Feminino</option>
        <option>Outro</option>
    </select>

    <label>Estado Civil</label>
    <select name="marital_status" value="{{$employee->marital_status ?? " "}}">
        <option>Solteiro(a)</option>
        <option>Casado(a)</option>
        <option>Divorciado(a)</option>
        <option>Viúvo(a)</option>
    </select>

    <label>Quantidade de Filhos</label>
    <input class="form-control" type="number" name="children" value="{{$employee->children ?? " "}}">

    <label>Endereço</label>
    <input type="text" name="address" value="{{$employee->address ?? " "}}">

    <label>PCD (Pessoa com Deficiência)</label>
    <div style="display: flex; align-items: center; gap: 150px; padding: 10px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9;">
        <div style="display: flex; align-items: center;">
            <input type="radio" id="pcd_sim" name="pwd" value="1" style="margin-right: 6px;">
            <label for="pcd_sim">Sim</label>
        </div>
        <div style="display: flex; align-items: center;">
            <input type="radio" id="pcd_nao" name="pwd" value="0" style="margin-right: 10px;">
            <label for="pcd_nao">Não</label>
        </div>
    </div>

    <div class="hr-text">Área de Atuação</div>
    <label>Departamento</label>
    <select name="department">
        <option></option>
        <option>Administração</option>
        <option>Suporte</option>
        <option>T.I</option>
        <option>Estágio</option>
        <option>Recursos Humanos</option>
        <option>Marketing</option>
        <option>Vendas</option>
        <option>Financeiro</option>
        <option>Comercial</option>
        <option>Design</option>
        <option>Desenvolvimento</option>
        <option>Gestão de Projetos</option>
        <option>Logística</option>
        <option>Atendimento ao Cliente</option>
        <option>Jurídico</option>
        <option>Operações</option>
        <option>Engenharia</option>
        <option>Produção</option>
        <option>Pesquisa e Desenvolvimento</option>
        <option>Qualidade</option>
        <option>Gestão de Pessoas</option>
    </select>

    <label>Cargo</label>
    <input type="text" name="position">

    <label>Data de Admissão</label>
    <input type="date" name="admission_date">

    <label>Salário</label>
    <input type="text" name="salary" oninput="mascaraSalario(this)">

    <label>Status do Colaborador</label>
    <select name="status">
        <option>Ativo</option>
        <option>Inativo</option>
        <option>Desligado</option>
    </select>

    <label>Número da CTPS</label>
    <input type="text" name="ctps_number">

    <label>Série da CTPS</label>
    <input type="text" name="ctps_series">

    <label>PIS/PASEP</label>
    <input type="text" name="pis_pasep">

    <div class="hr-text">Dados Bancários</div>
    <label>Banco</label>
    <input type="text" name="bank_name">

    <label>Agência</label>
    <input type="text" name="bank_agency">

    <label>Número da Conta</label>
    <input type="text" name="bank_account">

    <label>Tipo de Conta</label>
    <select name="account_type">
        <option>Corrente</option>
        <option>Poupança</option>
    </select>

    <label>Observações</label>
    <textarea name="observations" style="opacity: 0.5;" placeholder="Caso tenha alguma deficiência ou queira adicionar algo a mais, pode usar este campo."></textarea>
    <button type="submit" style="background-color: #1a2b49; width: 100%;">Salvar</button>

</form>
<a href="{{route('new')}}">new</a>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

@endsection