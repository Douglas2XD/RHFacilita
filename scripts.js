
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




  //MASCARAS 
  function mascaraCPF(campo) {
    let valor = campo.value.replace(/\D/g, ''); // Remove tudo que não for número

    if (valor.length > 11) {
        valor = valor.substring(0, 11); // Limita para 11 números
    }

    if (valor.length <= 11) {
        valor = valor.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
    }

    campo.value = valor;
}

function mascaraTelefone(campo) {
  let valor = campo.value.replace(/\D/g, ''); // Remove tudo que não for número

  // Limita para 11 números
  if (valor.length > 11) {
      valor = valor.substring(0, 11);
  }

  // Aplica a máscara em tempo real
  if (valor.length <= 11) {
      valor = valor.replace(/(\d{2})(\d{1})(\d{4})(\d{4})/, '($1)$2.$3-$4');
  }

  campo.value = valor; // Atualiza o campo com a máscara
}


function mascaraSalario(campo) {
  let valor = campo.value.replace(/\D/g, ''); // Remove tudo que não for número

  // Adiciona o separador de milhar
  valor = valor.replace(/(\d)(\d{3})(\d{3})(\d{3})/, '$1.$2.$3.$4'); // Para valores acima de 999

  // Coloca a vírgula antes dos centavos
  if (valor.length > 5) {
      valor = valor.replace(/(\d)(\d{2})$/, '$1,$2');
  }

  campo.value = valor; // Atualiza o campo com a máscara
}


function mascaraCep(campo) {
  let valor = campo.value.replace(/\D/g, ''); // Remove tudo que não for número
  valor = valor.replace(/^(\d{5})(\d{1,3})/, "$1-$2"); // Aplica o formato 00000-000
  if (valor.length > 8){
    valor = valor.substring(0,9)
  }
  campo.value = valor;
}




  //MASCARAS





  function previewFoto(input) {
    const preview = document.getElementById('photo-preview');
    const file = input.files[0];

    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            preview.innerHTML = `<img src="${e.target.result}" alt="Prévia da Foto">`;
        };
        reader.readAsDataURL(file);
    } else {
        preview.innerHTML = "Prévia da Foto";
    }
}

function cadastrado(){
  window.alert("USUARIO CADASTRADO COM SUCESSO! ");
}

