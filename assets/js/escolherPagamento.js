function gerarQRCode() {
	let qrcodeContainer = document.getElementById("qrcode");
	qrcodeContainer.innerHTML = "";
	new QRCode(
		qrcodeContainer,
		"https://turnmotors.000webhostapp.com/pags/pedido-feito.php"
	);
	document.getElementById("qrcode-container").style.display = "block";
}

const inputPix = document.querySelector("#pix");
const inputCartao = document.querySelector("#cartao");
const divPix = Array.from(document.querySelector("#divPix").children);
const divCartao = Array.from(document.querySelector("#divCartao").children);

if (inputCartao.checked == false && inputPix.checked == false) {
	divCartao.forEach((filho) => {
		filho.style.display = "none";
	});

	divPix.forEach((filho) => {
		filho.style.display = "none";
	});
}

inputCartao.addEventListener("change", () => {
	divPix.forEach((filho) => {
		filho.style.display = "none";
	});
	divCartao.forEach((filho) => {
		filho.style.display = "flex";
	});
});

inputPix.addEventListener("change", () => {
	divCartao.forEach((filho) => {
		filho.style.display = "none";
	});
	divPix.forEach((filho) => {
		filho.style.display = "flex";
	});

	gerarQRCode();
});
