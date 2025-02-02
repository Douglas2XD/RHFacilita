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
                <div class="date-time">
                    <i class="fas fa-calendar-alt"></i> 02/02 
                    <i class="fas fa-clock"></i> 14:30
                </div>
                <div class="title">{{$vacancy->title?? ' '}} | São Paulo – SP | 02 vaga(s)</div>
                <div class="category">Tecnologia</div>
                <div class="location">vespertino</div>
                <a href="#" class="btn-apply">Candidatar-se</a>
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
