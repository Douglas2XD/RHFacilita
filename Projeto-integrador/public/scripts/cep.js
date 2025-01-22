


const inputCEP = document.getElementById('cep');
const inputStreet = document.getElementById('street');
const inputState = document.getElementById('state');
const inputCity = document.getElementById('city');

inputCEP.addEventListener('focusout', () => {
    let cep = inputCEP.value.trim(); // Remove espaços em branco

    fetch(`https://viacep.com.br/ws/${cep}/json/`)
        .then(response => {
            if (!response.ok) throw new Error('CEP não encontrado!');
            return response.json();
        })
        .then(json => {
            if (json.erro) {
                alert('CEP inválido!');
                return;
            }
            inputStreet.value = json.logradouro || '';
            inputCity.value = json.localidade || '';
            inputState.value = json.uf || '';
        })
        .catch(error => console.error('Erro:', error));
});

$(function(){
    $('#cep').mask('00000-000');
})

