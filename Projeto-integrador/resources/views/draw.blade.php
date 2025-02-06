@extends('layout')

@section('document')
    Home
@endsection

@section('content')

<style>
    .flip-card {
      width: 100%;
      max-width: 300px; /* Largura máxima do card */
      height: auto;
      aspect-ratio: 3/4; /* Mantém proporção do card */
      perspective: 1000px;
      cursor: pointer;
      margin: 0 auto; /* Centraliza o card */
    }

    .flip-card-inner {
      position: relative;
      width: 100%;
      height: 100%;
      text-align: center;
      transition: transform 0.6s;
      transform-style: preserve-3d;
    }

    .flip-card.flipped .flip-card-inner {
      transform: rotateY(180deg);
    }

    .flip-card-front, .flip-card-back {
      position: absolute;
      width: 100%;
      height: 100%;
      backface-visibility: hidden;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      background-color: #ffffff;
    }

    .flip-card-front {
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }

    .flip-card-back {
      transform: rotateY(180deg);
      overflow: hidden; /* Previne que o conteúdo extrapole */
    }

    .flip-card-front h2 {
      font-family: Arial, sans-serif;
      color: #333;
      font-size: clamp(16px, 3vw, 24px); /* Texto responsivo */
    }

    .card-img-top {
      width: 100%;
      height: 60%; /* Altura da imagem em relação ao card */
      object-fit: cover;
    }

    .card-body {
      padding: 15px;
      height: 40%; /* Altura do corpo em relação ao card */
      overflow-y: auto; /* Scroll se necessário */
    }

    .card-text {
      margin: 0;
      font-size: clamp(14px, 2.5vw, 16px); /* Texto responsivo */
    }

    /* Media queries para ajustes em diferentes tamanhos de tela */
    @media (max-width: 768px) {
      .flip-card {
        max-width: 250px;
      }
    }

    @media (max-width: 480px) {
      .flip-card {
        max-width: 200px;
      }
      
      .card-body {
        padding: 10px;
      }
    }
</style>



@if(isset($department))

@if($total_departments > 0)

<div class="alert alert-success">
    <h2>Vencedor do Sorteio  
    </h2>
    <p>Toque para ver!!</p>
</div>

<div class="flip-card">
    <div class="flip-card-inner">
      <div class="flip-card-front">
        <h2>Clique para virar!</h2>
      </div>
      <div class="flip-card-back">
        <img src="{{asset('assets/profile_pic/'.$employee_contempled->profile_pic ??' ')}}" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">  
                <p><strong>Nome:</strong> {{$employee_contempled->name ??' '}}</p>  
        </div>
      </div>
    </div>
  </div>
    <script>
        const card = document.querySelector('.flip-card');
        
        card.addEventListener('click', function() {
          this.classList.toggle('flipped');
        });
      </script>

@else 
<h2>Parece que este departamento está vazio :( </h2>  
@endif
@endif

@endsection