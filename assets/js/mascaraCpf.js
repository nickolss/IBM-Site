$('#cpf').on("keydown", (event) => {
	let valorCampo = $("#cpf").val()
	let tamanhoCampo = valorCampo.length

	if (tamanhoCampo == 3 || tamanhoCampo == 7) {
		cpf.value += ".";
	} else if (tamanhoCampo == 11) {
		cpf.value += "-";
	}
})
