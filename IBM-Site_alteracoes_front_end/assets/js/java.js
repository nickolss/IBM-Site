function apagar(){
    var txtresp = document.querySelector('input#mensagem')
    var mensagem = txtresp.value
    mensagem = ""
    mensagem.innerHTML = ""
}

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
