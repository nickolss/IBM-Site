$('#numeroCartao').on("keydown", (event) => {
	let valorCampo = $("#numeroCartao").val()
	let tamanhoCampo = valorCampo.length

	if (tamanhoCampo == 4 || tamanhoCampo == 9 || tamanhoCampo == 14) {
		numeroCartao.value += " ";
	}
})
