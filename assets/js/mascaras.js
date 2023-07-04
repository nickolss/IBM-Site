//Esse código adiciona máscara a inputs HTML

let cpf = document.querySelector("#cpf");
let numeroTelefone = document.querySelector("#telefone");

//Máscara de CPF
cpf.addEventListener("keypress", () => {
	let cpfLength = cpf.value.length;
	if (cpfLength == 3 || cpfLength == 7) {
		cpf.value += ".";
	} else if (cpfLength == 11) {
		cpf.value += "-";
	}
});

//Máscara de Número de Telefone
numeroTelefone.addEventListener("keypress", () => {
	let numeroLength = numeroTelefone.value.length;
    if(numeroLength == 0){
        numeroTelefone.value += "("
    }else if(numeroLength == 3){
        numeroTelefone.value += ")"
    }else if(numeroLength == 9){
        numeroTelefone.value += "-"
    }
});