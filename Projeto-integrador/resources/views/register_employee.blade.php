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
    <input type="text" id="cep" name="cep" value="{{ old('cep', $employee->address->cep ?? '' )}}">

    <label>Estado</label>
    <input type="text" id="state" name="state" value="{{ old('state', $employee->address->state ?? '') }}">
    <label>Cidade</label>
    <input type="text" id="city" name="city" value="{{ old('city', $employee->address->city ?? '') }}">
    <label>Logradouro</label>
    <input type="text" id="street" name="street" value="{{ old('street', $employee->address->street ?? '') }}">
    <label>Número</label>
    <input type="text" name="number" value="{{ old('number', $employee->address->number ?? '' )}}">


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
    <select name="name_departament">
        <option value=""></option>
    <option value="Administração" {{ old('name_departament', $employee->departament->name_departament ?? '') == 'Administração' ? 'selected' : '' }}>Administração</option>
    <option value="Suporte" {{ old('name_departament', $employee->departament->name_departament ?? '') == 'Suporte' ? 'selected' : '' }}>Suporte</option>
    <option value="T.I" {{ old('name_departament', $employee->departament->name_departament ?? '') == 'T.I' ? 'selected' : '' }}>T.I</option>
    <option value="Estágio" {{ old('name_departament', $employee->departament->name_departament ?? '') == 'Estágio' ? 'selected' : '' }}>Estágio</option>
    <option value="Recursos Humanos" {{ old('name_departament', $employee->departament->name_departament ?? '') == 'Recursos Humanos' ? 'selected' : '' }}>Recursos Humanos</option>
    <option value="Marketing" {{ old('name_departament', $employee->departament->name_departament ?? '') == 'Marketing' ? 'selected' : '' }}>Marketing</option>
    <option value="Vendas" {{ old('name_departament', $employee->departament->name_departament ?? '') == 'Vendas' ? 'selected' : '' }}>Vendas</option>
    <option value="Financeiro" {{ old('name_departament', $employee->departament->name_departament ?? '') == 'Financeiro' ? 'selected' : '' }}>Financeiro</option>
    <option value="Comercial" {{ old('name_departament', $employee->departament->name_departament ?? '') == 'Comercial' ? 'selected' : '' }}>Comercial</option>
    <option value="Design" {{ old('name_departament', $employee->departament->name_departament ?? '') == 'Design' ? 'selected' : '' }}>Design</option>
    <option value="Desenvolvimento" {{ old('name_departament', $employee->departament->name_departament ?? '') == 'Desenvolvimento' ? 'selected' : '' }}>Desenvolvimento</option>
    <option value="Gestão de Projetos" {{ old('name_departament', $employee->departament->name_departament ?? '') == 'Gestão de Projetos' ? 'selected' : '' }}>Gestão de Projetos</option>
    <option value="Logística" {{ old('name_departament', $employee->departament->name_departament ?? '') == 'Logística' ? 'selected' : '' }}>Logística</option>
    <option value="Atendimento ao Cliente" {{ old('name_departament', $employee->departament->name_departament ?? '') == 'Atendimento ao Cliente' ? 'selected' : '' }}>Atendimento ao Cliente</option>
    <option value="Jurídico" {{ old('name_departament', $employee->departament->name_departament ?? '') == 'Jurídico' ? 'selected' : '' }}>Jurídico</option>
    <option value="Operações" {{ old('name_departament', $employee->departament->name_departament ?? '') == 'Operações' ? 'selected' : '' }}>Operações</option>
    <option value="Engenharia" {{ old('name_departament', $employee->departament->name_departament ?? '') == 'Engenharia' ? 'selected' : '' }}>Engenharia</option>
    <option value="Produção" {{ old('name_departament', $employee->departament->name_departament ?? '') == 'Produção' ? 'selected' : '' }}>Produção</option>
    <option value="Pesquisa e Desenvolvimento" {{ old('name_departament', $employee->departament->name_departament ?? '') == 'Pesquisa e Desenvolvimento' ? 'selected' : '' }}>Pesquisa e Desenvolvimento</option>
    <option value="Qualidade" {{ old('name_departament', $employee->departament->name_departament ?? '') == 'Qualidade' ? 'selected' : '' }}>Qualidade</option>
    <option value="Gestão de Pessoas" {{ old('name_departament', $employee->departament->name_departament ?? '') == 'Gestão de Pessoas' ? 'selected' : '' }}>Gestão de Pessoas</option>

    </select>

    <label>Cargo</label>
    <input type="text" name="position" value="{{ old('position', $employee->departament->position ?? '') }}" >

    <label>Data de Admissão</label>
    <input type="date" name="admission_date" value="{{old('admission_date', $employee->departament->admission_date ?? '')}}">

    <label>Salário</label>
    <input type="text" id="salary" name="salary" placeholder="R$0,00" onInput="maskMoney(event);" value="{{ old('salary', $employee->salary ?? '') }}" />

    <label>Status do Colaborador</label>
    <select name="employee_stats">
        <option value="Ativo" {{ old('employee_stats', $employee->employee_stats ?? '') == 'Ativo' ? 'selected' : '' }}>Ativo</option>
        <option value="Inativo" {{ old('employee_stats', $employee->employee_stats ?? '') == 'Inativo' ? 'selected' : '' }}>Inativo</option>
        <option value="Desligado" {{ old('employee_stats', $employee->employee_stats ?? '') == 'Desligado' ? 'selected' : '' }}>Desligado</option>
    </select>

    <label>Número da CTPS</label>
    <input type="text" name="CTPS_number" value="{{ old('CTPS_number', $employee->departament->CTPS_number ?? '' )}}">

    <label>Série da CTPS</label>
    <input type="text" name="CTPS_series" value="{{ old('CTPS_series', $employee->departament->CTPS_series ?? '')}}">
    
    <label>PIS/PASEP</label>
    <input type="text" name="PIS_PASEP" value="{{ old('PIS_PASEP', $employee->departament->PIS_PASEP ?? '') }}">

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
$(function(){
   $('#cep').mask('00000-000')
})






function mascaraRG(input) {
  let valor = input.value.replace(/\D/g, '');

  if (valor.length > 8) {
    valor = valor.substring(0, 8);
  }

  input.value = valor;
}
const maskMoney = (e) => {
      const onlyDigits = e.target.value
        .split("") // divide por ""
        .filter(num => /\d/.test(num)) 
        .join("") // retorna numa string
        .padStart(3, "0");

      const digitsFloat = onlyDigits.slice(0, -2) + "." + onlyDigits.slice(-2);
      e.target.value = dinheiro(digitsFloat);
    };

    const dinheiro = (valor, locale = 'pt-BR', currency = 'BRL') => {
      
      return new Intl.NumberFormat(locale, {
        style: 'currency',
        currency
      }).format(valor);
    };





</script>
<script src="{{asset('scripts/jquery-3.7.1.min.js')}}"></script>

<script src="{{asset('scripts/jquery.mask.min.js')}}"></script>
<script src="{{asset('scripts/cep.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection