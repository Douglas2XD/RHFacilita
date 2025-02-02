<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('document') </title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/teste.css')}}">
    <style>
      /* Sidebar */
      
  </style>
</head>
<body>
<div class="container-fluid">
  <nav class="navbar">
    <div class="container">
        <div class="menu-btn" onclick="toggleSidebar()">
            <i class="fas fa-bars"></i>
        </div>
        

        @if(auth()->check()) 
          
          <div class="d-flex align-items-center user-info dropdown">
          
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            
            @if(auth()->check()) 
            <img src="{{asset('assets/profile_pic/'.auth()->user()->photo)}}" alt="User" class="user-image rounded-circle">
  
            {{ auth()->user()->name }}
            @endif
              
            
            
            </a>
  
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
  
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
          @endif
          
    </div>
</nav>
    
    <!-- Main Content -->
    <main id="main-content" class="main-content">
      <div class="sidebar" id="sidebar">
        <span class="close-btn" onclick="toggleSidebar()">
            <i class="fas fa-times"></i>
        </span>
        <a href="{{route('index')}}" class="sidebar-link" style="text-decoration: none">
            <i class="fas fa-home"></i> Página inicial
        </a>
        <a href="{{route('processos_seletivos')}}" class="sidebar-link" style="text-decoration: none">
            <i class="fas fa-clipboard-list"></i> Processos seletivos
        </a>
        <a href="{{route('recrutamento')}}" class="sidebar-link" style="text-decoration: none">
            <i class="fas fa-user-plus"></i> Recrutamento e Seleção
        </a>
        <a href="{{route('show_departments')}}" class="sidebar-link" style="text-decoration: none">
            <i class="fas fa-users"></i> Equipes e Departamentos
        </a>
        <a href="{{route('endomarketing')}}" class="sidebar-link" style="text-decoration: none">
            <i class="fas fa-heart"></i> Endomarketing
        </a>
        <a href="{{route('dashboard')}}" class="sidebar-link" style="text-decoration: none">
            <i class="fas fa-chart-pie"></i> Relatórios de RH
        </a>
        <a href="#" class="sidebar-link" style="text-decoration: none">
            <i class="fas fa-cogs"></i> Configurações
        </a>
    </div>
    <div class="overlay" onclick="toggleSidebar()"></div>
      @yield('content')  <!-- A seção content será preenchida pelas páginas que estendem este layout -->
    </main>
  </div>
  
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<footer class="footer">
  <div class="container">
      <div class="row">
          <!-- About Section -->
          <div class="col-md-4 mb-4">
              <h5>Sobre Nós</h5>
              <p class="text-muted">
                  Nossa empresa se dedica a fornecer os melhores produtos e serviços para nossos clientes, sempre com qualidade e excelência.
              </p>
              <div class="social-icons">
                  <a href="#"><i class="fab fa-facebook-f"></i></a>
                  <a href="#"><i class="fab fa-twitter"></i></a>
                  <a href="#"><i class="fab fa-instagram"></i></a>
                  <a href="#"><i class="fab fa-linkedin-in"></i></a>
              </div>
          </div>

          <!-- Quick Links -->
          <div class="col-md-4 mb-4">
              <h5>Links Rápidos</h5>
              <ul class="footer-links">
                  <li><a href="#">Início</a></li>
                  <li><a href="#">Sobre</a></li>
                  <li><a href="#">Serviços</a></li>
                  <li><a href="#">Contato</a></li>
                  <li><a href="#">FAQ</a></li>
              </ul>
          </div>

          <!-- Contact Info -->
          <div class="col-md-4 mb-4">
              <h5>Contato</h5>
              <ul class="footer-links">
                  <li>
                      <i class="fas fa-map-marker-alt me-2"></i>
                      Sem endereço no momento.
                  </li>
                  <li>
                      <i class="fas fa-phone me-2"></i>
                      (86)9.9918-7482
                  </li>
                  <li>
                      <i class="fas fa-envelope me-2"></i>
                      jociandouglas12@gmail.com
                  </li>
              </ul>
          </div>
      </div>
  </div>

  <!-- Copyright -->
  <div class="footer-bottom text-center">
      <div class="container">
          <p class="mb-0">
              &copy; {{now()->year}} RHFacilita. Todos os direitos reservados.
          </p>
      </div>
  </div>
</footer>

</body>
</html>
<script src="{{asset('scripts/scripts.js') }}"></script> <!-- Ajuste se necessário -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function toggleSidebar() {
        document.getElementById('sidebar').classList.toggle('active');
        document.querySelector('.overlay').classList.toggle('active');
        document.body.style.overflow = document.getElementById('sidebar').classList.contains('active') ? 'hidden' : 'auto';
    }
    </script>