const addressForm = document.querySelector("#adress-form")
const cepInput = document.querySelector("#cep");
const addressInput = document.querySelector("#address");
const cityInput = document.querySelector("#city");
const neighborhoodInput = document.querySelector("#neighborhood");
const regionInput = document.querySelector("#region");
const formInputs = document.querySelectorAll("[data-input]");

//Validação input CEP
cepInput.addEventListener("keypress", (e) => {

    const onlyNumbers = /[0-9]/;
    const key = String.fromCharCode(e.keyCode);

    //permitir somente numeros
    if(!onlyNumbers.test(key)){
        e.preventDefault();
        return;
    }
});

//Evento pegar endereço (get Adress)
cepInput.addEventListener("keyup", (e) => {

    const inputValue = e.target.value;

    //verificação dos 8 digitos do cep
    if(inputValue.length === 8){
        getAdress(inputValue);
    }

});

//pegar endereço do cliente da API
const getAdress = async (cep) => {
    cepInput.blur();

    const apiUrl = `https://viacep.com.br/ws/${cep}/json/`; //url da api 

    const response = await fetch(apiUrl); //traz todos os dados da api

    const data = await response.json(); //recebe apenas os dados do endereço 

    //Se o CEP for inválido, irá mostrar o erro e resetar o form
    if ("erro" in data){
        alert("CEP Inválido, tente novamente.");
        if (!addressInput.hasAttribute("disabled")) {
            toggleDisabled();
        }
        cepInput.value = "";
        addressInput.value = ""; 
        cityInput.value = ""; 
        neighborhoodInput.value = "";
        regionInput.value = "";
    }

    if(addressInput.value == ""){
        toggleDisabled();
    }
    
    addressInput.value = data.logradouro; //endereço vindo da api
    cityInput.value = data.localidade; //cidade vindo da api
    neighborhoodInput.value = data.bairro; //bairro vindo da api
    regionInput.value = data.uf; //estado vindo da api
};

//adicionar ou remover atributo "disabled" dos inputs
const toggleDisabled = () => {

    if(regionInput.hasAttribute("disabled")){
        formInputs.forEach((input) => {
            input.removeAttribute("disabled");
        })
    }else{
        formInputs.forEach((input) => {
            input.setAttribute("disabled", "disabled");
        })
    }

};

addressInput.value = ""; 
        cityInput.value = ""; 
        neighborhoodInput.value = "";
        regionInput.value = "";
