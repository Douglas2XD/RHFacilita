
const inputCEP = document.getElementById('cep');
const inputStreet = document.getElementById('street');
const inputState = document.getElementById('state');
const inputDistrict = document.getElementById('district');
const inputCity = document.getElementById('city');


inputCEP.addEventListener('blur', ()=>{
    let cep = inputCEP.value;

    if (cep.length != 8){
        return;
    }
    fetch('https://viacep.com.br/ws/${cep}/json/')
        .then(response => response.json())
        .then(json => {
            inputStreet.value = json.logradouro;
            inputCity.value = json.localidade;
            inputState.value = json.uf;
            inputDistrict.value = json.bairro;
        });
});