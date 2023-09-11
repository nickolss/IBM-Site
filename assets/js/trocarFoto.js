

// Atribuindo os elementos HTML para variáveis
const inputArquivo = document.getElementById("fileImg");
const imagem = document.getElementById("image");
const iconeCancelar = document.getElementById("cancel");
const iconeConfirmar = document.getElementById("confirm");
const iconeCamera = document.getElementById("upload");


inputArquivo.onchange = function () { //Função para atualizar a interface do usuário quando um arquivo é selecionado.

  if (inputArquivo.files.length > 0) {  //Verifica se há um arquivo selecionado.
    imagem.src = URL.createObjectURL(inputArquivo.files[0]); // Cria uma URL temporária para o arquivo selecionado e atualiza a imagem.

    // Exibe os botões de cancelar e confirmar e oculte o botão de upload.
    iconeCancelar.style.display = "block";
    iconeConfirmar.style.display = "block";
    iconeCamera.style.display = "none";
  }

};

const userImage = imagem.src; // Armazena a imagem atual do usuário quando a página é carregada.

iconeCancelar.onclick = function () { // Define uma função para cancelar a seleção de arquivo.
  
  imagem.src = userImage; // Restaura a imagem original do usuário.

  //Oculta os botões de cancelar e confirmar e exiba o botão de upload.
  iconeCancelar.style.display = "none";
  iconeConfirmar.style.display = "none";
  iconeCamera.style.display = "block";
};
