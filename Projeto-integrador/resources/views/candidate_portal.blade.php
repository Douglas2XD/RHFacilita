<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal do Candidato</title>
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/teste.css')}}">
    <link rel="stylesheet" href="{{asset('css/styles_processos')}}">

    
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f5f5f5;
    }
    .navbar {
        display: flex;
        justify-content: center;
        background-color: white;
        padding: 10px 0;
        border-bottom: 1px solid #ddd;
    }
    .navbar a {
        margin: 0 15px;
        text-decoration: none;
        color: black;
        font-weight: bold;
    }
    .navbar a.active {
        color: green;
    }
    .container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        padding: 20px;
    }
    .job-card {
        background-color: white;
        border: 1px solid #ddd;
        border-radius: 5px;
        width: 300px;
        margin: 10px;
        padding: 15px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    .job-card .date-time {
        color: #666;
        font-size: 14px;
        margin-bottom: 10px;
    }
    .job-card .title {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 10px;
    }
    .job-card .category {
        display: inline-block;
        background-color: green;
        color: white;
        padding: 5px 10px;
        border-radius: 3px;
        font-size: 14px;
        margin-bottom: 10px;
    }
    .job-card .category.marketing {
        background-color: #28a745;
    }
    .job-card .category.administrativo {
        background-color: #007bff;
    }
    .job-card .category.educacao {
        background-color: #ffc107;
    }
    .job-card .location {
        color: #007bff;
        font-size: 14px;
    }
    @media (max-width: 768px) {
        .job-card {
            width: 100%;
            margin: 10px 0;
        }
    }
</style>
    
</head>

<body>
    
<div class="navbar">
    <a href="#" class="active">TODAS VAGAS</a>
    <a href="#">DIARISTA</a>
    <a href="#">EMPREGO</a>
    <a href="#">ESTÁGIO</a>
    <a href="#">HOME OFFICE</a>
    <a href="#">JOVEM APRENDIZ</a>
    <a href="#">PCD</a>
    <a href="#">RCA</a>
    <a href="#">TRAINEE</a>
</div>
<div class="container">
    <div class="job-card">
        <div class="date-time"><i class="fas fa-calendar-alt"></i> 31/01 <i class="fas fa-clock"></i> 11:15</div>
        <div class="title">Mecânico(a) | Teresina – PI | 01 vaga(s)</div>
        <div class="category">Operacional</div>
        <div class="location">Emprego em Teresina / PI</div>
    </div>
    <div class="job-card">
        <div class="date-time"><i class="fas fa-calendar-alt"></i> 31/01 <i class="fas fa-clock"></i> 11:15</div>
        <div class="title">Estágio em Marketing | Teresina – PI | 01 vaga(s)</div>
        <div class="category marketing">Marketing</div>
        <div class="location">Estágio em Teresina / PI</div>
    </div>
    <div class="job-card">
        <div class="date-time"><i class="fas fa-calendar-alt"></i> 31/01 <i class="fas fa-clock"></i> 11:12</div>
        <div class="title">Gerente | Teresina – PI | 01 vaga(s)</div>
        <div class="category administrativo">Administrativo</div>
        <div class="location">Emprego em Teresina / PI</div>
    </div>
    <div class="job-card">
        <div class="date-time"><i class="fas fa-calendar-alt"></i> 31/01 <i class="fas fa-clock"></i> 10:49</div>
        <div class="title">Assistente de Precificação | Teresina – PI | 01 vaga(s)</div>
        <div class="category administrativo">Administrativo</div>
        <div class="location">Emprego em Teresina / PI</div>
    </div>
    <div class="job-card">
        <div class="date-time"><i class="fas fa-calendar-alt"></i> 31/01 <i class="fas fa-clock"></i> 10:49</div>
        <div class="title">Fiscal de Loja | Teresina – PI | 01 vaga(s)</div>
        <div class="category">Operacional</div>
        <div class="location">Emprego em Teresina / PI</div>
    </div>
    <div class="job-card">
        <div class="date-time"><i class="fas fa-calendar-alt"></i> 31/01 <i class="fas fa-clock"></i> 10:41</div>
        <div class="title">Engenheiro(a) Civil | Parnaíba – PI | 01 vaga(s)</div>
        <div class="category">Operacional</div>
        <div class="location">Emprego em Parnaíba / PI</div>
    </div>
    <div class="job-card">
        <div class="date-time"><i class="fas fa-calendar-alt"></i> 31/01 <i class="fas fa-clock"></i> 10:38</div>
        <div class="title">Estágio em Biblioteconomia | Teresina – PI | 01 vaga(s)</div>
        <div class="category educacao">Educação</div>
        <div class="location">Estágio em Teresina / PI</div>
    </div>
    <div class="job-card">
        <div class="date-time"><i class="fas fa-calendar-alt"></i> 31/01 <i class="fas fa-clock"></i> 10:35</div>
        <div class="title">Assistente de Licitações | Teresina – PI | 01 vaga(s)</div>
        <div class="category administrativo">Administrativo</div>
        <div class="location">Emprego em Teresina / PI</div>
    </div>
</div>









{{---

@foreach ($vacancies as $vaga )
<div class="job-card">
    <h2 class="job-title">{{ $vaga->title }}</h2>
    <p class="job-description">
        <strong>Descrição da Vaga:</strong>  {{$vaga->description}}
    </p>
    <p class="job-requirements">
        <strong>Requisitos:</strong> {{$vaga->requirements}}
    </p>
    <p class="job-salary">
        <strong>Salário:</strong> {{$vaga->remuneration}}
    </p>
    <p class="job-contract">
        <strong>Tipo de Contrato:</strong> {{$vaga->contract_type}}
    </p>
    <p class="job-location">
        <strong>Localização:</strong> {{$vaga->location}}
    </p>
    <p class="job-benefits">
        <strong>Benefícios:</strong> {{$vaga->benefits}}
    </p>
    <!-- Botão que abre o modal específico da vaga -->
    <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#candidaturaModal{{$vaga->id}}">Candidatar</a>
</div>

<!-- Modal específico da vaga -->
<div class="modal fade" id="candidaturaModal{{$vaga->id}}" tabindex="-1" aria-labelledby="candidaturaModalLabel{{$vaga->id}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="candidaturaModalLabel{{$vaga->id}}">Candidatar-se à Vaga: {{ $vaga->title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Formulário -->
                <form action="{{route('create_candidate')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <!-- Campo oculto para enviar o ID da vaga -->
                    <input type="hidden" name="vaga_id" value="{{ $vaga->id }}">
                    
                    <div class="mb-3">
                        <label for="nome{{$vaga->id}}" class="form-label">Nome Completo</label>
                        <input type="text" class="form-control" id="nome{{$vaga->id}}" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email{{$vaga->id}}" class="form-label">E-mail</label>
                        <input type="email" class="form-control" id="email{{$vaga->id}}" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="curriculum{{$vaga->id}}" class="form-label">Currículo (PDF)</label>
                        <input type="file" class="form-control" name="curriculum" accept=".pdf" required >
                    </div>
                    <button type="submit" class="btn btn-primary w-100" onclick="click()">Enviar Candidatura</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    

</body>
</html>

---}}