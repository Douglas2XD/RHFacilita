function toggleSidebar() {
    const sidebar = document.getElementById("sidebar");
    const toggleIcon = document.getElementById("toggle-icon");
    const mainContent = document.getElementById("main-content");
    
    sidebar.classList.toggle("hidden");
    mainContent.classList.toggle("shifted");
    
    // Alterna o ícone entre hambúrguer e 'X'
    if (sidebar.classList.contains("hidden")) {
      toggleIcon.classList.remove("fa-bars");
      toggleIcon.classList.add("fa-times");
    } else {
      toggleIcon.classList.remove("fa-times");
      toggleIcon.classList.add("fa-bars");
    }
  }
