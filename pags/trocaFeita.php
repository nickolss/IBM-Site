<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Turn Motors | Troca</title>



  <link rel="stylesheet" href="../assets/css/pedido-confirmado.min.css">
  <link rel="stylesheet" href="../assets/css/trocaFeita.min.css">
  <link rel="stylesheet" href="../assets/css/estilos-importantes.css">
  <script type="text/javascript" src="../assets/js/java2.js" defer></script>

  <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script type="text/javascript" src="../assets/js/java.js" defer></script>
  <script src="../assets/js/js-bootstrap/bootstrap.bundle.min.js"></script>
</head>

<body id="container__body" onload="gerarNumeropedido() , dataPedido()">
  <?php
  require_once('../assets/components/header.php');
  ?>


  <main class="pedido-confirmado">

    <div class="container">
      <div class="row">
        <div class="col">
          <div style="display: flex; justify-content: center; margin-top: 90px;">
            <div>
              <h2 class="principal__titulo">Olá!</h2>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="principal__informacoes">
            <h3 class="informacoes__titulo">Informações do Pedido</h3>
            <p class="informacoes__texto" id="numero-pedido">
              Número da Encomenda: #
            </p>
            <p class="informacoes__texto" id="data-atual">Data da Encomenda:</p>
            <p class="informacoes__texto">Total de Encomenda:</p>
          </div>
        </div>
      </div>

      <hr>

      <div class="mid__text">
        <div class="textos">
          <p class="paragrafoMid__text">Temos o prazer de o informar que recebemos seu pedido.</p>
          <p class="paragrafoMid__text">Venha para nossa oficina Turn Motors para que seu veículo tenha o melhor cuidado e tratamento na hora da lavagem.</p>
        </div>
        <div class="img__lavagem">
          <img src="../assets/img/iconesMangueiraDucha.svg" class="img-fluid" alt="Imagem Lavagem">
        </div>
      </div>

      <hr>

      <h2 id="title__exp">Diga sua Experiência</h2>
      <div class="paiComentario">
        <div class="comentario">
          <textarea name="coment" id="coment" class="campoComentario" cols="30" rows="10" placeholder="Digite como foi sua experiência com a Turn Motors"></textarea>
        </div>
        <form action="efetuarComentario.php" method="POST">
          <button class="botao__troca" type="submit">Enviar</button>
        </form>
      </div>

    </div>
  </main>

  <?php
  require_once('../assets/components/footer.php');
  ?>

</body>

</html>