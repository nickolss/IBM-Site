$('#tel').on("keydown", (event) => {
    let numeroTelefone = document.querySelector("#tel");
    let numeroLength = numeroTelefone.value.length;

	if(numeroLength == 0){
        numeroTelefone.value += "("
    }else if(numeroLength == 3){
        numeroTelefone.value += ")"
    }else if(numeroLength == 9){
        numeroTelefone.value += "-"
    }
})
