const inputCpf = document.querySelector("#cpf");
const divCpf = document.querySelector("#inputCpf");

const erroLog = document.createElement("p");
erroLog.textContent = "CPF Inválido";
erroLog.classList.add("hidden");
divCpf.appendChild(erroLog);

function validaCPF(cpf) {
	const url = `https://api.invertexto.com/v1/validator?token=5116%7CEzc50pZoryHRrAC702HSzsS3dD2RPhB8&value=${cpf}&type=cpf`;

	fetch(url)
		.then((resp) => resp.json())
		.then((validacao) => {
			if (!validacao.valid) {
				erroLog.classList.remove("hidden");
			} else {
				erroLog.classList.add("hidden");
			}
		});
}

inputCpf.addEventListener("keyup", () => {
	validaCPF(inputCpf.value);
});
