<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Turn Motors | Mecanico</title>
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
          <h1 class="title-vaga-mecanico">Mecânico de Automóveis</h1>
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
          <p class="p-vaga-mecanico">Executar tarefas de revisões e repardos preventivos e corretivos de veículos. Troca de fluídos, reapertos, montagem e desmontagens de suspensões , partes do motor de veículos e estruturas do painel. Leiuras de sensores e emissão de relatório técnico de serviços executados em veículos.</p>
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
            <p style="font-size: 1.5em;"><img src="../assets/img/dindin.svg" class="img-fluid" alt="Dinheiro"> De R$2500,00 a R$4500,00</p>
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
                <li class="li-vaga-mec">Escolaridade Ensino Médio completo - Diferencial Técnico em Mecânico</li>
                <li class="li-vaga-mec">Experiência com concessionária</li>
                <li class="li-vaga-mec">Experiência em mecânica em geral, suspensão, freio, embreagem, caixa de marcha, desmontagem e montagem de motores. Saber manusear scanner veicular e fazer diagnóstico de falhas, conhecimento em eletrônica dos veículos modernos.</li>

              </ul>
            </div>
          </div>


        </div>
      </div>
      <br>
      <div class="row">
        <div class="col">
          <img style="width: 650px;" src="../assets/img/mecanica.png" class="img-fluid img-vaga" alt="Funilaria">
        </div>
      </div>
    </div>
    <div class="col">
      <a href="login.php" style="text-decoration: none; margin: 1rem auto;">
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