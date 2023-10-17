<?php
  require_once('../assets/scripts/iniciarSessao.php');
  require_once('../assets/scripts/consultaCliente.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Turn Motors | Equipe 2023</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <link rel="stylesheet" href="../assets/css/pedido-confirmado.min.css">
  <link rel="stylesheet" href="../assets/css/estilos-importantes.css">



  <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">

  <script src="../assets/js/js-bootstrap/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="../assets/js/java.js" defer></script>
  <script src="../assets/js/pedido-info.js"></script>

</head>

<body id="container__body" onload="gerarNumeropedido() , dataPedido()">
  <?php
    require_once('../assets/components/header.php');
  ?>


  <main>
    <div class="container__img-pedido">
      <div class="img">
          <img id="img__embalar-produtos" src="../assets/img/pedido-feito.svg" alt="Embalando Produtos">
      </div>

      <div class="pedido">
          <h3 class="pedido__titulo">Informações do Pedido</h3>
          <p class="pedido__texto" id="numero-pedido">
            Número da Encomenda: #
          </p>
          <p class="pedido__texto" id="data-atual">Data da Encomenda:</p>
          <p class="pedido__texto">Obrigado pela preferência!</p>
      </div>
    </div>

    <form action="../assets/scripts/cadastrarExperiencia.php" method="POST">
      <div class="container__experiencia">
          <div class="experiencia__titulo">
              <h2>Diga sua experiência</h2>
          </div>
          <div class="experiencia-logo">
            <div class="div__input">
                <textarea name="experiencia" id="experiencia" cols="40" rows="7" placeholder="Digite sua experiência em nosso site" required></textarea>
            </div>
          </div>
          <div class="div__botao">
              <button type="submit" id="btn__enviar">Enviar</button>
          </div>
      </div>
    </form>
  </main>

  <?php
    require_once('../assets/components/footer.php');
  ?>

</body>

</html>