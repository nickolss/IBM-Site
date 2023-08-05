const conferirSenhas = () => {
	const senha = document.querySelector("input[name=senha]");
	const confirma = document.querySelector("input[name=confirmarSenha]");

	if (confirma.value == senha.value) {
		confirma.setCustomValidity("");
	} else {
		confirma.setCustomValidity("As senhas não são iguais");
	}
};


//EM CONSTRUÇÂO
const regex = /^\(\d{2}\)\d{5}-\d{4}$/;
const telefone = document.querySelector("input[name=tel]");

telefone.addEventListener("keypress", () => {
	if (regex.test(telefone)) {
		//telefone.setCustomValidity("");
	} else {
		// telefone.setCustomValidity(
		// 	"O número digitado não atende o padrão esperado."
		// );
	}
	console.log(telefone.value)
	console.log(regex.test(telefone))
});
