<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('document') </title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/teste.css')}}">
    
</head>
<body>
<div class="container-fluid">
    <nav id="sidebar" class="sidebar">
      <div class="text-center py-4">
        <img src="{{asset('images/logo_rhf.jpeg')}}" alt="Logo" width="100" height="50">
      </div>
      <ul>
        <a style="text-decoration: none;" href="{{route('index')}}"><li class="active"><i class="fas fa-home mr-2"></i> Página inicial</li></a>
        {{--<li><i class="fas fa-chart-line mr-2"></i> Visão geral</li>---}}
        <a href="{{route('processos_seletivos')}}" style="text-decoration: none;"><li><i class="fas fa-clipboard-list mr-2"></i> Processos seletivos</li></a>
        <a style="text-decoration: none;" href="{{route('recrutamento')}}"><li><i class="fas fa-user-plus mr-2"></i> Recrutamento e Seleção</li> </a>
        <a style="text-decoration: none;" href="{{route('show_departments')}}"> <li><i class="fas fa-users mr-2"></i> Equipes e Departamentos</li> </a> 
        <a href="{{route('endomarketing')}}" style="text-decoration: none;"><li><i class="fas fa-heart mr-2"></i> Endomarketing</li></a>
        <a href="{{route('dashboard')}}" style="text-decoration: none;"><li><i class="fas fa-chart-pie mr-2"></i> Relatórios de RH</li></a>
        <li><i class="fas fa-cogs mr-2"></i> Configurações</li>
      </ul>
    </nav>
    
    <!-- Main Content -->
    <main id="main-content" class="main-content">
      <div class="navbar d-flex justify-content-between align-items-center mb-4">
        <!-- Toggle Button -->
        <span class="toggle-button" onclick="toggleSidebar()">
          <i id="toggle-icon" class="fas fa-bars" style="color: #1a2b49;"></i>
        </span>
      
        <!-- Título -->
        <h3 class="text-center text-primary fw-bold ">RHFacilita</h3>

      
        <!-- Usuário -->
        <div class="d-flex align-items-center user-info dropdown">
          
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
          
          @if(auth()->check()) 
          <img src="{{asset('assets/profile_pic/'.auth()->user()->photo)}}" alt="User" class="user-image rounded-circle">

          {{ auth()->user()->name }}
          @else
                
                {{---<script>window.location = "{{ route('login') }}";</script>---}}  
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

          <div class="user-details">
          </div>
        </div>
      </div>
      @yield('content')  <!-- A seção content será preenchida pelas páginas que estendem este layout -->
    </main>

    
  </div>
  
  <script src="{{asset('scripts/scripts.js') }}"></script> <!-- Ajuste se necessário -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <footer class="footer bg-dark text-white py-5">
    <div class="container">
        <div class="row">
            <!-- About Section -->
            <div class="col-md-4 mb-4">
                <h5>Sobre Nós</h5>
                <p class="text-muted">
                    Nossa empresa se dedica a fornecer os melhores produtos e serviços para nossos clientes, sempre com qualidade e excelência.
                </p>
                <div class="social-icons">
                    <a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-white"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
  
            <!-- Quick Links -->
            <div class="col-md-4 mb-4">
                <h5>Links Rápidos</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-white text-decoration-none">Início</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Sobre</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Serviços</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Contato</a></li>
                    <li><a href="#" class="text-white text-decoration-none">FAQ</a></li>
                </ul>
            </div>
  
            <!-- Contact Info -->
            <div class="col-md-4 mb-4">
                <h5>Contato</h5>
                <ul class="list-unstyled">
                    <li>
                        <i class="fas fa-map-marker-alt me-2"></i>
                        Av. Principal, 123, São Paulo - SP
                    </li>
                    <li>
                        <i class="fas fa-phone me-2"></i>
                        (11) 1234-5678
                    </li>
                    <li>
                        <i class="fas fa-envelope me-2"></i>
                        contato@empresa.com
                    </li>
                </ul>
            </div>
        </div>
    </div>
  
    <!-- Copyright -->
    <div class="footer-bottom text-center bg-dark text-white py-3">
        <div class="container">
            <p class="mb-0">
                &copy; 2025 Sua Empresa. Todos os direitos reservados.
            </p>
        </div>
    </div>
  </footer>
</body>





</html>
