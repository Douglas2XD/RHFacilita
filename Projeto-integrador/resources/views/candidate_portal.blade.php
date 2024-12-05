<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/teste.css')}}">
    <link rel="stylesheet" href="{{asset('css/styles_processos')}}">
    
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <div class="alert alert-primary py-4">
                <h2 class="fw-bold">Olá, seja bem-vindo!</h2>
                <p class="lead">Candidate-se à sua vaga de preferência agora mesmo.</p>
            </div>
        </div>
    </div>
</div>

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