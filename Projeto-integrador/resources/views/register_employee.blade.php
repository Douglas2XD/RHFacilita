@extends('layout')

@section('document')
    Registrar Funcionário
@endsection


@section('content')
<link rel="stylesheet" href="{{asset('css/styles_cadastrar.css')}}">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">



@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (isset($employee->id) and $employee->id)
        <form class="employee-form" action="{{route("update", $employee)}}" enctype="multipart/form-data" method="post">
            @method('PUT')
            @csrf
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
    @else
        <form class="employee-form" action="{{route('store')}}" enctype="multipart/form-data" method="post">
            @csrf
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <label>Foto de Perfil</label>
    <div class="photo-preview" id="photo-preview">Prévia da Foto</div>
    <input type="file" name="profile_pic" accept="image/*" onchange="previewFoto(this)" value="{{old('profile_pic',$employee->photo ?? ' ')}}" required>

    <!-- Currículo -->
    <label>Currículo</label>
    <input type="file" name="curriculum" accept=".pdf,.doc,.docx" value="{{old('curriculum',$employee->curriculum ?? ' ')}}" required>
    @endif
    
    <div class="hr-text">Dados Pessoais</div>
    <!-- Foto de Perfil -->

    <label>Nome</label>
    <input type="text" name="name" value="{{old('name',$employee->name ?? " ")}}">

    <label>CPF</label>
    <input type="text" name="cpf" oninput="mascaraCPF(this)" value="{{old('cpf',$employee->cpf ?? " ")}}">

    <label>RG</label>
    <input type="text" name="rg" id="rg" value="{{old('rg',$employee->rg ?? " ")}}" oninput="mascaraRG(this)" >

    <label>Data de Nascimento</label>
    <input type="date" name="birth_date" value="{{old('birth_date',$employee->birth_date ?? " ")}}">

    <label>Email</label>
    <input type="email" name="email" value="{{old('email',$employee->email ?? " ")}}">

    <label>Telefone</label>
    <input type="text" name="phone" oninput="mascaraTelefone(this)" value="{{old('phone',$employee->phone ?? " ")}}">

    <label>Sexo</label>
    <select name="gender" value="{{old('gender',$employee->gender ?? " ")}}">
        <option value="Masculino" {{ old('gender', $employee->gender ?? '') == 'Masculino' ? 'selected' : '' }}>Masculino</option>
        <option value="Feminino" {{ old('gender', $employee->gender ?? '') == 'Feminino' ? 'selected' : '' }}>Feminino</option>
        <option value="Outro" {{ old('gender', $employee->gender ?? '') == 'Outro' ? 'selected' : '' }}>Outro</option>
    </select>

    <label>Estado Civil</label>
    <select name="marital_status" value="{{old('marital_status',$employee->marital_status ?? " ")}}">
        <option value="Solteiro(a)" {{ old('marital_status', $employee->marital_status ?? '') == 'Solteiro(a)' ? 'selected' : '' }}>Solteiro(a)</option>
        <option value="Casado(a)" {{ old('marital_status', $employee->marital_status ?? '') == 'Casado(a)' ? 'selected' : '' }}>Casado(a)</option>
        <option value="Divorciado(a)" {{ old('marital_status', $employee->marital_status ?? '') == 'Divorciado(a)' ? 'selected' : '' }}>Divorciado(a)</option>
        <option value="Viúvo(a)" {{ old('marital_status', $employee->marital_status ?? '') == 'Viúvo(a)' ? 'selected' : '' }}>Viúvo(a)</option>

    </select>

    <label>Quantidade de Filhos</label>
    <input class="form-control" type="number" name="children" value="{{old('children',$employee->children ?? " ")}}">

    <label>Cep</label>
    <input type="text" id="cep" name="cep" value="{{ old('cep', $employee->cep ?? '' )}}">
    <label>Estado</label>
    <input type="text" id="state" name="state" value="{{ old('state', $employee->state ?? '') }}">
    <label>Cidade</label>
    <input type="text" id="city" name="city" value="{{ old('city', $employee->city ?? '') }}">
    <label>Logradouro</label>
    <input type="text" id="street" name="street" value="{{ old('street', $employee->street ?? '') }}">
    <label>Número</label>
    <input type="text" name="number" value="{{ old('number', $employee->number ?? '' )}}">


    <label>PCD (Pessoa com Deficiência)</label>
    <div style="display: flex; align-items: center; gap: 150px; padding: 10px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9;">
        <div style="display: flex; align-items: center;">
            <input type="radio" id="pcd_sim" name="pwd" value="1" style="margin-right: 6px;">
            <label for="pcd_sim">Sim</label>
        </div>
        <div style="display: flex; align-items: center;">
            <input type="radio" id="pcd_nao" name="pwd" value="0" style="margin-right: 10px;" checked>
            <label for="pcd_nao">Não</label>
        </div>
    </div>

    <div class="hr-text">Área de Atuação</div>
    <label>Departamento</label>
    
    <select name="department_id"> 
        @if(isset($employee->id))
        <option value=""></option>
        @foreach ($departments as $department)
        <option value="{{ $department->id }}" {{ old('department_id', $department->id ?? '') == $department_user->id ? 'selected' : '' }}>
            {{ $department->name_department}}
        </option>
        @endforeach

        @else

        <option value=""></option>
        @foreach ($departments as $department)
        <option value="{{ $department->id }}" {{ old('department_id', $employee->department ?? '') == $department->id ? 'selected' : '' }}>
            {{ $department->name_department }}
        </option>
        @endforeach

        @endif        
    </select>   

    <label>Cargo</label>
    <input type="text" name="position" value="{{ old('position', $employee->position ?? '') }}" >

    <label>Data de Admissão</label>
    <input type="date" name="admission_date" value="{{old('admission_date', $employee->admission_date ?? '')}}">

    <label>Salário</label>
    <input type="text" id="salary" name="salary" placeholder="R$0,00" onInput=maskMoney(event); value="{{ old('salary', $employee->salary ?? '') }}" />

    <label>Status do Colaborador</label>
    <select name="employee_stats">
        <option value="Ativo" {{ old('employee_stats', $employee->employee_stats ?? '') == 'Ativo' ? 'selected' : '' }}>Ativo</option>
        <option value="Inativo" {{ old('employee_stats', $employee->employee_stats ?? '') == 'Inativo' ? 'selected' : '' }}>Inativo</option>
        <option value="Desligado" {{ old('employee_stats', $employee->employee_stats ?? '') == 'Desligado' ? 'selected' : '' }}>Desligado</option>
    </select>

    <label>Número da CTPS</label>
    <input type="text" name="CTPS_number" value="{{ old('CTPS_number', $employee->CTPS_number ?? '' )}}">

    <label>Série da CTPS</label>
    <input type="text" name="CTPS_series" value="{{ old('CTPS_series', $employee->CTPS_series ?? '')}}">
    
    <label>PIS/PASEP</label>
    <input type="text" name="PIS_PASEP" value="{{ old('PIS_PASEP', $employee->PIS_PASEP ?? '') }}">

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

<script>

document.getElementById('rg').addEventListener('input', function (e) {
    e.target.value = e.target.value.replace(/\D/g, '').slice(0, 7);
});


const maskMoney = (e) => {
    // Remove tudo o que não for número
    const onlyDigits = e.target.value
        .split("") // divide por caracteres
        .filter(num => /\d/.test(num)) // filtra para deixar apenas números
        .join(""); // retorna numa string

    // Garantir que tenha ao menos dois números decimais
    const digitsFloat = onlyDigits.slice(0, -2) + "." + onlyDigits.slice(-2);

    // Atualizar o campo com a máscara de dinheiro
    e.target.value = dinheiro(digitsFloat);
};

const dinheiro = (valor, locale = 'pt-BR', currency = 'BRL') => {
    // Converter valor para número
    const numberValue = parseFloat(valor.replace(",", "."));
    
    // Se o valor não for um número válido, retorne o valor original
    if (isNaN(numberValue)) return valor;

    // Formatar como moeda
    return new Intl.NumberFormat(locale, {
        style: 'currency',
        currency
    }).format(numberValue);
};

</script>
<script src="{{asset('scripts/jquery-3.7.1.min.js')}}"></script>

<script src="{{asset('scripts/jquery.mask.min.js')}}"></script>
<script src="{{asset('scripts/cep.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection