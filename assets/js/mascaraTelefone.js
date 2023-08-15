let numeroTelefone = document.querySelector("#tel");
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