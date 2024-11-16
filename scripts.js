
document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById("sidebar");
    const toggleIcon = document.getElementById("toggle-icon");
    const mainContent = document.getElementById("main-content");
    
    sidebar.classList.toggle("hidden");
    mainContent.classList.toggle("shifted");

    
    if (sidebar.classList.contains("hidden")) {
      toggleIcon.classList.remove("fa-times");
      toggleIcon.classList.add("fa-bars");
    } else { 
      toggleIcon.classList.remove("fa-bars");
      toggleIcon.classList.add("fa-times");
    }

});

function toggleSidebar() {
    const sidebar = document.getElementById("sidebar");
    const toggleIcon = document.getElementById("toggle-icon");
    const mainContent = document.getElementById("main-content");
    
    sidebar.classList.toggle("hidden");
    mainContent.classList.toggle("shifted");

    
    if (sidebar.classList.contains("hidden")) {
      toggleIcon.classList.remove("fa-times");
      toggleIcon.classList.add("fa-bars");
    } else { 
      toggleIcon.classList.remove("fa-bars");
      toggleIcon.classList.add("fa-times");
    }
  }
