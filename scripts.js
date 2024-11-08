const menuIcon = document.querySelector('.menu-icon i');
  const sidebar = document.querySelector('.sidebar');

  // Adicionando o evento de clique no ícone do menu
  menuIcon.addEventListener('click', () => {
    // Alterna a classe 'active' na sidebar
    sidebar.classList.toggle('active');
  });