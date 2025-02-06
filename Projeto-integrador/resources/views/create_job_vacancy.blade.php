@extends('layout')

@section('document')
    Criar vaga 
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

@if (isset($vacancy->id))
        <form class="employee-form" action="{{route('update_vacancy',$vacancy)}}" method="post">
            @method('PUT')
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    @else
    
    <form class="employee-form" action="{{route('store_vacancy')}}" method="post">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    @endif

    @csrf
    
    <div class="mb-3">
        <label for="titulo" class="form-label">Título da Vaga</label>
        <input type="text" class="form-control" id="titulo" name="title" placeholder="Exemplo: Técnico administrativo" value="{{ old('title', $vacancy->title ?? '') }}">
    </div>
    
    <div class="mb-3">
        <label for="department" class="form-label">Departamento</label>
        <select id="department" name="department" class="form-select">
            @foreach ($departments as $department)
                <option value="{{ $department->name_department }}" {{ old('department', $vacancy->department ?? '') == $department->name_department ? 'selected' : '' }}>
                    {{ $department->name_department }}
                </option>
            @endforeach
        </select>
    </div>
    
    <div class="mb-3">
        <label for="descricao" class="form-label">Descrição da Vaga</label>
        <textarea id="descricao" name="description" class="form-control" rows="5" placeholder="Descreva as responsabilidades e atividades do cargo.">{{ old('description', $vacancy->description ?? '') }}</textarea>
    </div>
    
    <div class="mb-3">
        <label for="requisitos" class="form-label">Requisitos</label>
        <textarea id="requisitos" name="requirements" class="form-control" rows="5" placeholder="Descreva as qualificações e habilidades exigidas.">{{ old('requirements', $vacancy->requirements ?? '') }}</textarea>
    </div>
    
    <div class="mb-3">
        <label for="remuneration" class="form-label">Salário</label>
        <input type="text" class="form-control" id="remuneration" name="remuneration" placeholder="R$0,00" onInput="maskMoney(event);" value="{{ old('remuneration', $vacancy->remuneration ?? '') }}" />
    </div>
    
    <div class="mb-3">
        <label for="total_vacancies" class="form-label">Total de Vagas</label>
        <input type="number" class="form-control" id="total_vacancies" name="total_vacancies" placeholder="Total de vagas. Ex: 2 (obs caso não queira mostrar, deixe este campo limpo)." value="{{ old('total_vacancies', $vacancy->total_vacancies ?? '') }}" />
    </div>
    
    <div class="mb-3">
        <label for="pwd_vacancy" class="form-label">Vaga para PCD</label>
        <select id="pwd_vacancy" name="pwd_vacancy" class="form-select">
            <option value="NAO" {{ old('pwd_vacancy', $vacancy->pwd_vacancy ?? '') == 'NAO' ? 'selected' : '' }}>NÃO</option>
            <option value="SIM" {{ old('pwd_vacancy', $vacancy->pwd_vacancy ?? '') == 'SIM' ? 'selected' : '' }}>SIM</option>
        </select>
    </div>
    
    <div class="mb-3">
        <label for="contract_type" class="form-label">Tipo de Contrato</label>
        <select id="contract_type" name="contract_type" class="form-select">
            @foreach(['CLT', 'PJ', 'Estágio', 'Freelancer', 'DIARISTA', 'JOVEM APRENDIZ', 'PCD', 'TRAINEE'] as $type)
                <option value="{{ $type }}" {{ old('contract_type', $vacancy->contract_type ?? '') == $type ? 'selected' : '' }}>{{ strtoupper($type) }}</option>
            @endforeach
        </select>
    </div>
    
    <div class="mb-3">
        <label for="location" class="form-label">Localização</label>
        <input type="text" class="form-control" id="location" name="location" placeholder="Exemplo: Rua 12, Bairro Centro, Teresina, PI. (ou Remoto)" value="{{ old('location', $vacancy->location ?? '') }}">
    </div>
    
    <div class="mb-3">
        <label for="time_work" class="form-label">Horário</label>
        <input type="text" class="form-control" id="time_work" name="time_work" placeholder="Ex: 8:30 até 18:00" value="{{ old('time_work', $vacancy->time_work ?? '') }}">
    </div>
    
    <div class="mb-3">
        <label for="benefits" class="form-label">Benefícios</label>
        <textarea id="benefits" name="benefits" class="form-control" rows="3" placeholder="Exemplo: Vale transporte, plano de saúde, etc.">{{ old('benefits', $vacancy->benefits ?? '') }}</textarea>
    </div>
    
    <button type="submit" data-toggle="modal" data-target="#exampleModal" style="background-color: #1a2b49; width: 100%;">Salvar</button>
    
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Quer mesmo cadastrar esta vaga?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Por favor, confirme os dados antes de cadastrar.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Confirmar Dados</button>
                    <button type="submit" class="btn btn-primary">Cadastrar Vaga</button>
                </div>
            </div>
        </div>
    </div>
    
</form>





</main>
</div>
<script>
    const maskMoney = (e) => {
      const onlyDigits = e.target.value
        .split("") // divide por ""
        .filter(num => /\d/.test(num)) // realiza o filtro impedindo sair outras coisas além de números
        .join("") // retorna numa string
        .padStart(3, "0");

      const digitsFloat = onlyDigits.slice(0, -2) + "." + onlyDigits.slice(-2);
      e.target.value = dinheiro(digitsFloat);
    };

    const dinheiro = (valor, locale = 'pt-BR', currency = 'BRL') => {
      // locale influencia no formato de saída ex: pontos e vírgulas
      return new Intl.NumberFormat(locale, {
        style: 'currency',
        currency
      }).format(valor);
    };
  </script>



@endsection

