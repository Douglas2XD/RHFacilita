<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Informações do Funcionário</title>
    <style>
        body { font-family: Arial, sans-serif; }
        h1 { color: #333; }
    </style>
</head>
<body>
    <h1>Informações do Funcionário</h1>

    <img 
    src="{{ public_path('assets/profile_pic/'.$data['pic']) }}" 
    alt="Foto de Perfil" 
    style="width: 250px; height: 250px; object-fit: cover;"
>   
    
    <p><strong>Nome: </strong> {{ $data['name'] }}</p>
    <p><strong>Cpf: </strong> {{ $data['cpf'] }}</p>
    <hr>
    <h5>Dados Profissionais</h5>
    <p><strong>Salário: </strong> {{ $data['salary'] }}</p>
    <p><strong>Posição: </strong> {{ $data['position'] }}</p>
    <p><strong>Data de Admissão: </strong> {{ $data['admission_date'] }}</p>
    <p><strong>Status: </strong> {{ $data['employee_stats'] }}</p>
    <p><strong>CTPS Número: </strong> {{ $data['CTPS_number'] }}</p>
    <p><strong>CTPS Serie: </strong> {{ $data['CTPS_series'] }}</p>
    <p><strong>PIS/PASEP: </strong> {{ $data['PIS_PASEP'] }}</p>
    <hr>
    <h5>Endereço</h5>
    <p><strong>CEP: </strong> {{ $data['cep'] }}</p>
    <p><strong>Rua: </strong> {{ $data['street'] }}</p>
    <p><strong>Número: </strong> {{ $data['number'] }}</p>
    <p><strong>Cidade: </strong> {{ $data['city'] }}</p>
    <p><strong>Estado: </strong> {{ $data['state'] }}</p>
    

    


</body>
</html>