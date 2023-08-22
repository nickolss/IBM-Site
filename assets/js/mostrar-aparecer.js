const botaoContinuar = document.querySelector("#mostrar-esconder");
const primeira_parte = document.querySelector(".primeira__parte");
const segunda_parte = document.querySelector(".segunda__parte");

botaoContinuar.addEventListener('click', function() {

    primeira_parte.style.display = 'none';
    botaoContinuar.style.display = 'none';
    segunda_parte.style.display = 'block';

});


document.addEventListener('keydown', function(e) {
    
    if(e.key === 'Enter') {
        e.preventDefault();
    }
        
}); 

