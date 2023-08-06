//Conferere se as senhas estão iguais
const conferirSenhas = () => {
	const senha = document.querySelector("input[name=senha]");
	const confirma = document.querySelector("input[name=confirmarSenha]");

	if (confirma.value == senha.value) {
		confirma.setCustomValidity("");
	} else {
		confirma.setCustomValidity("As senhas não são iguais");
	}
};

//Verifica se o telefone atende o formado esperado
const regexTel = /^\(\d{2}\)\d{5}-\d{4}$/;
const telefone = document.querySelector("input[name=tel]");

telefone.addEventListener("keypress", () => {
	if(regexTel.test(telefone.value)){
		console.log("FUNCIONA")
		telefone.setCustomValidity('')
	}else{
		console.log("N FUNCIONA")
		telefone.setCustomValidity("Formato de telefone não esperado.")
	}
});


//Verifica se o cpf atende o formato esperado
const regexCpf = /^\d{3}\.\d{3}\.\d{3}\-\d{2}$/;
const cpfForm = document.querySelector('input[name=cpf]')

cpfForm.addEventListener("keypress", () => {
	if(regexCpf.test(cpfForm.value)){
		cpfForm.setCustomValidity('')
	}else{
		cpfForm.setCustomValidity("O CPF digitado não atende o padrão esperado.")
	}
});
