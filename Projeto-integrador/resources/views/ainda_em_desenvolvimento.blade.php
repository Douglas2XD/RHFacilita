<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ainda em Desenvolvimento</title>
    <style>
        /* Resetando margens e padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Estilos do Body */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f4f8;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: #333;
        }

        /* Estilos do Container */
        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 600px;
            width: 100%;
        }

        /* Estilo do título */
        h1 {
            font-size: 2rem;
            color: #333;
            margin-bottom: 20px;
        }

        /* Estilo do texto */
        p {
            font-size: 1rem;
            color: #666;
            margin-bottom: 20px;
        }

        /* Estilo da animação de carregamento */
        .loader {
            border: 8px solid #f3f3f3;
            border-top: 8px solid #3498db;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
            margin: 20px auto;
        }

        /* Animação de rotação */
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Botão (opcional, para voltar ou entrar em contato) */
        .btn {
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            font-size: 1rem;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
            display: inline-block;
        }

        .btn:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Ainda em Desenvolvimento</h1>
        <p>Estamos trabalhando para trazer o melhor conteúdo para você. Por favor, aguarde...</p>

        <!-- Animação de carregamento -->
        <div class="loader"></div>

        <!-- Botão de ação, opcional -->
        <a href="{{route('index')}}" class="btn">Voltar para a página inicial</a>
    </div>

</body>
</html>
