function apagar(){
  var txtresp = document.querySelector('input#mensagem')
  var mensagem = txtresp.value
  mensagem = ""
  mensagem.innerHTML = ""
}


//Cmportamento Lupa
$(document).ready(function() {
  $('.lupa').click(function() {
    if ($('.header_search_aparecer').height() == 0) {
      
      $('.header_search_aparecer').css('display', 'block').animate({ height: '150px' }, 500);
    } else {
      
      $('.header_search_aparecer').animate({ height: '0' }, 500, function() {
        $(this).css('display', 'none');
      });
     
    }
  });
});



//Comportamento do carrinho
const iconeCarrinho = document.getElementById('carrinho');
const fade = document.getElementById('fade');

const modal = document.getElementById('carrinho__header');

let isMouseOverIcon = false;

let isMouseOverModal = false;


const showModal = () => {
  modal.style.display = 'block';
  fade.style.display = 'block';
  setTimeout(() => {
    modal.style.opacity = '1';
    fade.style.opacity = '1';
    
  }, 100);
};


const hideModal = () => {
  if (!isMouseOverIcon && !isMouseOverModal) {
    
    modal.style.opacity = '0';
    setTimeout(() => {
      fade.style.opacity = '0';
      
    }, 100);
    modal.style.display = 'none';
    fade.style.display = 'none';
  }
};


iconeCarrinho.addEventListener('mouseover', () => {
  isMouseOverIcon = true;
  showModal();
});

iconeCarrinho.addEventListener('mouseleave', () => {
  isMouseOverIcon = false;
  setTimeout(hideModal, 200); 
});


modal.addEventListener('mouseover', () => {
  isMouseOverModal = true;
  showModal();
});


modal.addEventListener('mouseleave', () => {
  isMouseOverModal = false;
  hideModal();
});

//carrinho mobile

var botaoCarrinho = document.getElementById('botaoCarrinho__mobile');

  // Adiciona um ouvinte de evento de clique à imagem
  botaoCarrinho.addEventListener('click', function() {
    // Envia o formulário quando a imagem é clicada
    document.getElementById('icone-carrinho-funcional__Mobile').submit();
  });



