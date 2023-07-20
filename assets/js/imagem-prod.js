const fotoInput = document.querySelector("#fotoProd");
const foto = document.querySelector(".img__foto");
const textoFoto = "Escolha sua Imagem: ";
fotoInput.innerHTML = textoFoto;
const fotoGaleria = document.querySelector('.foto__img')

fotoInput.addEventListener("change", (event) => {
	const inputTarget = event.target;

	const arquivo = inputTarget.files[0];

    if(arquivo){
        foto.innerHTML = ""
        const reader = new FileReader()
        reader.readAsDataURL(arquivo);

        reader.addEventListener('load' , (event)=>{
            const readerTarget = event.target
            const imagem = document.createElement('img')
            imagem.classList.add("img__conteudo")
            imagem.src = reader.result;
            foto.appendChild(imagem)

            
        })
    }else{
        foto.innerHTML = textoFoto
    }
});
