<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Turn Motors | Funileiro</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


  <link rel="stylesheet" href="../assets/css/estilos-importantes.css">
  <link rel="stylesheet" href="../assets/css/vagas.min.css">


  <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">
  <script type="text/javascript" src="../assets/js/java.js" defer></script>
  <script src="../assets/js/js-bootstrap/bootstrap.bundle.min.js"></script>
</head>

<body>
  <?php
  require_once('../assets/components/header.php');
  ?>
  <br>
  <br>
  <main class="main-vaga">
    <div class="container text-center">
      <div class="row">
        <div class="col">
          <h1 class="title-vaga-mecanico">Funileiro</h1>
        </div>
      </div>
      <hr>
      <br>
      <div class="row">
        <div class="col">
          <h2 class="subtitle-vaga-mecanico">Benefícios</h2>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <img src="../assets/img/assistencia-medica.svg" class="img-fluid" alt="Assistência Médica">
          <p class="p-vaga-mecanico beneficios-vaga beneficio-am"> Assistência Médica</p>
          <img src="../assets/img/carrinho-mercado.svg" class="img-fluid" alt="Carrinho de Super Mercado">
          <p class="p-vaga-mecanico beneficios-vaga">Vale Alimentação</p>
        </div>
        <div class="col">
          <img src="../assets/img/assistencia-dente.svg" class="img-fluid" alt="Assistência Odontológica">
          <p class="p-vaga-mecanico beneficios-vaga"> Assistência Odontológica</p>
          <img src="../assets/img/vale-transporte.svg" class="img-fluid" alt="Carro">
          <p class="p-vaga-mecanico beneficios-vaga"> Vale-Transporte</p>
        </div>
        <div class="col">
          <img src="../assets/img/seguro-vida.svg" class="img-fluid" alt="Seguro de Vida">
          <p class="p-vaga-mecanico beneficios-vaga"> Seguro de Vida</p>
        </div>
      </div>
      <br>
      <hr>
      <br>
      <div class="row">
        <div class="col">
          <h2 class="subtitle-vaga-mecanico subtitle-vaga-mec-v2">Descrição</h2>
          <p class="p-vaga-mecanico">Consertar, restaurar, dar um novo acabamento e substituir carrocerias e quadros de veículos, para-brisas e até vidros de janela, recuperar peças danificadas e, caso não haja conserto, substituir a mesma.</p>
        </div>
      </div>
      <br>
      <br>
      <hr>
      <div class="row">
        <div class="col">
          <h2 class="subtitle-vaga-mecanico subtitle-vaga-mec-v2">Informações Adicionais</h2>
          <div style="text-align: center;">
            <p style="font-size: 1.5em;"><img src="../assets/img/calendario.svg" class="img-fluid" alt="Calendário"> Segunda à sexta das 09 às 18h e sábados das 09h às 13h.</p>
            <p style="font-size: 1.5em;"><img src="../assets/img/vaga.png" class="img-fluid" alt="Vagas"> 3 vagas: CLT (Efetivo)</p>
            <p style="font-size: 1.5em;"><img src="../assets/img/dindin.svg" class="img-fluid" alt="Dinheiro"> De R$2100,00 a R$3200,00</p>
            <p style="font-size: 1.5em;"><img src="../assets/img/localizacao.svg" class="img-fluid" alt="Localização"> São Paulo - SP</p>
          </div>

        </div>
      </div>
      <br>
      <br>
      <hr>
      <div class="row">
        <div class="col">
          <h2 class="subtitle-vaga-mecanico subtitle-vaga-mec-v2">Requisitos</h2>
          <div style="display: flex; justify-content: center;">
            <div style="width: 950px; ">
              <ul>
                <li class="li-vaga-mec">Escolaridade Ensino Médio completo - Diferencial Técnico em Mecânico.</li>
                <li class="li-vaga-mec">Utilizar as ferramentas pneumáticas, considerando a rede de ar comprimido e seus riscos.</li>
                <li class="li-vaga-mec">Identificar os processos de desamassamento de superfície.</li>
                <li class="li-vaga-mec">Identificar o processo de acabamento de superfície.</li>
                <li class="li-vaga-mec">Montar e desmontar componentes móveis da carroceria.</li>
                <li class="li-vaga-mec">Remover e instalar vidros</li>
                <li class="li-vaga-mec">Reparar componentes plásticos automotivos.</li>
                <li class="li-vaga-mec">Soldar com diferentes processos.</li>
              </ul>
            </div>
          </div>


        </div>
      </div>
      <br>
      <div class="row">
        <div class="col">
          <img src="../assets/img/funilaria-carro.jpg" class="img-fluid img-vaga" alt="Funilaria">
        </div>
      </div>
    </div>
    <div class="col">
      <a href="../login.html" style="text-decoration: none; margin: 1rem auto;">
        <p id="botao-concurso">Inscreva-se</p>
      </a>

    </div>
    <br>
  </main>

  <?php
  require_once('../assets/components/footer.php');
  ?>


</body>

</html