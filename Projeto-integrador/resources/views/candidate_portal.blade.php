<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal de Vagas</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
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
            flex-wrap: wrap;
        }
        .navbar-links {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .navbar a {
            margin: 0 15px;
            text-decoration: none;
            color: black;
            font-weight: bold;
            padding: 5px 10px;
        }
        .navbar a.active {
            color: #28a745;
        }
        .navbar-select {
            display: none;
            width: 90%;
            max-width: 300px;
            padding: 8px;
            border: 2px solid #28a745;
            border-radius: 5px;
            font-weight: bold;
            margin: 10px auto;
        }
        .navbar-select option {
            padding: 8px;
        }
        .search-container {
            display: flex;
            justify-content: center;
            width: 100%;
            margin-bottom: 15px;
        }
        .search-container input {
            width: 70%;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 14px;
        }
        .search-container button {
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 8px 15px;
            margin-left: 10px;
            cursor: pointer;
        }
        .search-container button:hover {
            background-color: #218838;
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }
        .job-card {
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 300px;
            margin: 10px;
            padding: 15px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }
        .job-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
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
            color: #333;
        }
        .job-card .category {
            display: inline-block;
            background-color: #28a745;
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
        .job-card .fas {
            margin-right: 5px;
        }
        .btn-apply {
            display: block;
            width: 100%;
            background-color: #28a745;
            color: white;
            border: none;
            padding: 8px;
            border-radius: 3px;
            margin-top: 15px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
        }
        .btn-apply:hover {
            background-color: #218838;
            color: white;
        }
        @media (max-width: 768px) {
            .navbar-links {
                display: none;
            }
            .navbar-select {
                display: block;
            }
            .job-card {
                width: 100%;
                margin: 10px 0;
            }
        }
    </style>
</head>
<body>


    
    <div class="navbar">
        <div class="navbar-links">
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
        <select class="navbar-select">
            <option selected>TODAS VAGAS</option>
            <option>DIARISTA</option>
            <option>EMPREGO</option>
            <option>ESTÁGIO</option>
            <option>HOME OFFICE</option>
            <option>JOVEM APRENDIZ</option>
            <option>PCD</option>
            <option>RCA</option>
            <option>TRAINEE</option>
        </select>
    </div>
<br><br>
    <!-- Campo de pesquisa -->
    <div class="search-container">
        <input type="text" id="search" placeholder="Pesquisar vagas...">
        <button id="searchButton"><i class="fas fa-search"></i> Buscar</button>
    </div>

    <div class="container">
        @foreach($vacancies as $vacancy)
        
        <div class="job-card">
            <a data-bs-toggle="modal" data-bs-target="#candidaturaModal{{$vacancy->id}}">
                <div class="date-time">
                    <i class="fas fa-calendar-alt"></i> 02/02 
                    <i class="fas fa-clock"></i> 14:30
                </div>
                <div class="title">{{$vacancy->title ?? ' '}} | {{$vacancy->location ?? 'Localização não informada'}} | {{$vacancy->total_vacancies ?? '0'}} vaga(s)</div>
                <div class="category">Tecnologia</div>
                <div class="location">
                    {{$vacancy->work_schedule ?? 'Jornada não informada'}}
                </div>
            </a>
        </div>
            <!--INICIO DO CARD-->
            <div class="modal fade" id="candidaturaModal{{$vacancy->id}}" tabindex="-1" aria-labelledby="candidaturaModalLabel{{$vacancy->id}}" aria-hidden="true">
                
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="candidaturaModalLabel{{$vacancy->id}}">Candidatar-se à Vaga: {{ $vacancy->title }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p class="modal-title" id="candidaturaModalLabel{{$vacancy->id}}"><strong>Descrição:</strong> {{ $vacancy->description }}</p>
                            <hr>
                            <!-- Formulário -->
                            <form action="{{route('create_candidate')}}" method="post" enctype="multipart/form-data">
                                
                                @csrf
                                <!-- Campo oculto para enviar o ID da vaga -->
                                <input type="hidden" name="vaga_id" value="{{ $vacancy->id }}">
                                
                                <div class="mb-3">
                                    <label for="nome{{$vacancy->id}}" class="form-label">Nome Completo</label>
                                    <input type="text" class="form-control" id="nome{{$vacancy->id}}" name="name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email{{$vacancy->id}}" class="form-label">E-mail</label>
                                    <input type="email" class="form-control" id="email{{$vacancy->id}}" name="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="curriculum{{$vacancy->id}}" class="form-label">Currículo (PDF)</label>
                                    <input type="file" class="form-control" name="curriculum" accept=".pdf" required >
                                </div>
                                <button type="submit" class="btn-apply" onclick="click()">Enviar Candidatura</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>






        @endforeach
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <script>
        // Sincroniza a seleção entre a navbar e o select
        document.querySelector('.navbar-select').addEventListener('change', function(e) {
            const links = document.querySelectorAll('.navbar-links a');
            links.forEach(link => link.classList.remove('active'));
            links.forEach(link => {
                if (link.textContent === e.target.value) {
                    link.classList.add('active');
                }
            });
        });

        // Função de pesquisa (em breve, você pode adicionar lógica de backend para filtrar as vagas)
        document.getElementById('searchButton').addEventListener('click', function() {
            const query = document.getElementById('search').value.toLowerCase();
            const jobCards = document.querySelectorAll('.job-card');
            jobCards.forEach(card => {
                const title = card.querySelector('.title').textContent.toLowerCase();
                if (title.includes(query)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>
