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



@if(session('sucess'))
    <div class="alert alert-success">
        {{ session('sucess') }}
        
    </div>
@endif

@if (isset($vacancy->id))
        <form class="employee-form" action="{{route('update_vacancy',$vacancy)}}" method="post">
            @method('PUT')
           
    @else
    <form class="employee-form" action="{{route('store_vacancy')}}" method="post">

    @endif

    @csrf
    <div class="mb-3">
        <label for="titulo" class="form-label">Título da Vaga</label>
        <input type="text" class="form-control" id="titulo" name="title"  placeholder="Exemplo: Técnico administrativo" value="{{$vacancy->title ?? " "}}">
    </div>

    <div class="mb-3">
        <label for="descricao" class="form-label">Descrição da Vaga</label>
        <textarea id="descricao" name="description" class="form-control" rows="5"  placeholder="Descreva as responsabilidades e atividades do cargo." > {{$vacancy->description ?? " "}} </textarea>
    </div>

    <div class="mb-3">
        <label for="requisitos" class="form-label">Requisitos</label>
        <textarea id="requisitos" name="requirements" class="form-control" rows="5"  placeholder="Descreva as qualificações e habilidades exigidas.">{{$vacancy->requirements ?? " "}}</textarea>
    </div>

    <div class="mb-3">
        <label for="remuneration" class="form-label">Salário</label>
        <input type="text" class="form-control" id="remuneration" name="remuneration" placeholder="R$0,00" onInput="maskMoney(event);" />
    </div>

    <div class="mb-3">
        <label for="contract_type" class="form-label">Tipo de Contrato</label>
        <select id="contract_type" name="contract_type" class="form-select" value="{{$vacancy->contract_type ?? " "}}">
            <option value="CLT">CLT</option>
            <option value="PJ">PJ</option>
            <option value="Estágio">Estágio</option>
            <option value="Freelancer">Freelancer</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="location" class="form-label">Localização</label>
        <input type="text" class="form-control" id="location" name="location"  placeholder="Exemplo: Rua 12, Bairro Centro, Teresina, PI. (ou Remoto)" value="{{$vacancy->location ?? " "}}">
    </div>

    <div class="mb-3">
        <label for="benefits" class="form-label">Benefícios</label>
        <textarea id="benefits" name="benefits" class="form-control" rows="3" placeholder="Exemplo: Vale transporte, plano de saúde, etc."> {{$vacancy->benefits ?? " "}} </textarea>
    </div>


    <button type="submit" data-toggle="modal" data-target="#exampleModal" style="background-color: #1a2b49; width: 100%;" type="submit">Salvar</button>                    
    
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
            <button type="button" class="btn btn-primary">Cadastrar Vaga</button>
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




<!--
<hr>
<form>
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Título da Vaga</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" required placeholder="Exemplo: Desenvolvedor Front-End">
                    </div>
        
                    <div class="mb-3">
                        <label for="descricao" class="form-label">Descrição da Vaga</label>
                        <textarea id="descricao" name="descricao" class="form-control" rows="5" required placeholder="Descreva as responsabilidades e atividades do cargo."></textarea>
                    </div>
        
                    <div class="mb-3">
                        <label for="requisitos" class="form-label">Requisitos</label>
                        <textarea id="requisitos" name="requisitos" class="form-control" rows="5" required placeholder="Descreva as qualificações e habilidades exigidas."></textarea>
                    </div>
        
                    <div class="mb-3">
                        <label for="salario" class="form-label">Salário</label>
                        <input type="text" class="form-control" id="salario" name="salario" required placeholder="Exemplo: R$ 4.000 a R$ 5.500">
                    </div>
        
                    <div class="mb-3">
                        <label for="tipo_contrato" class="form-label">Tipo de Contrato</label>
                        <select id="tipo_contrato" name="tipo_contrato" class="form-select" required>
                            <option value="CLT">CLT</option>
                            <option value="PJ">PJ</option>
                            <option value="Estágio">Estágio</option>
                            <option value="Freelancer">Freelancer</option>
                        </select>
                    </div>
        
                    <div class="mb-3">
                        <label for="localizacao" class="form-label">Localização</label>
                        <input type="text" class="form-control" id="localizacao" name="localizacao" required placeholder="Exemplo: São Paulo, SP (ou Remoto)">
                    </div>
        
                    <div class="mb-3">
                        <label for="beneficios" class="form-label">Benefícios</label>
                        <textarea id="beneficios" name="beneficios" class="form-control" rows="3" placeholder="Exemplo: Vale transporte, plano de saúde, etc."></textarea>
                    </div>
        
                    <div class="mb-3">
                        <label for="como_candidatar" class="form-label">Como se Candidatar</label>
                        <textarea id="como_candidatar" name="como_candidatar" class="form-control" rows="3" placeholder="Instruções de como o candidato deve se inscrever."></textarea>
                    </div>
        
                    <button type="button" data-toggle="modal" data-target="#exampleModal" style="background-color: #1a2b49; width: 100%;" type="submit">Salvar</button>                    
                    
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
                            <button type="button" class="btn btn-primary">Cadastrar Vaga</button>
                        </div>
                        </div>
                    </div>
                    </div>
                </form>



-->