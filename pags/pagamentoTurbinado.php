<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Turn Motors | Pagamento</title>

  <!--ARQUIVOS BOOTSTRAP-->
  <link rel="stylesheet" href="../assets/css/css-bootstrap/bootstrap.min.css">
  <script src="../assets/js/js-bootstrap/bootstrap.bundle.min.js"></script>

  <link rel="stylesheet" href="../assets/css/pagamentoTurbinado.min.css">
  <link rel="stylesheet" href="../assets/css/estilos-importantes.css">

  <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script type="text/javascript" src="../assets/js/java.js" defer></script>
</head>

<body id="container__body">

  <?php
  require_once('../assets/components/header.php');
  ?>

  <main>
    <div class="container">
      <div class="main__div">
        <div class="div__img">
          <img src="../assets/img/iconeCadeado.svg" class="img-fluid" id="img__Cadeado" alt="Cadeado">
        </div>
        <div class="div__text">
          <h1 id="mainTitle">Escolha como voce quer pagar</h1>
          <p id="subtitle">Sua forma de pagamento está criptografada e você pode mudá-la quando quiser.</p>
          <p class="paragrafo__bold">Segurança e tranquilidade.</p>
          <p class="paragrafo__bold">Cancele online com facilidade.</p>
        </div>
      </div>
      <div id="right__card">
        <div id="text__criptografia">
          <p>Criptografia de ponta a ponta</p>
        </div>
        <div id="img__criptografia">
          <img src="../assets/img/iconeCadeadoCriptografia.svg" class="img-fluid" id="img__Cadeado" alt="Cadeado">
        </div>
      </div>
      <a style="text-decoration: none;" id="link__div" href="pagamentoTurbinadoCartao.html">
        <div class="card__pagamento">
          <div id="text__cartao">
            <p>Cartão de crédito ou débito</p>
          </div>
          <div id="bandeiras__cartao">
            <img src="../assets/img/visa_pagamentoCartao.svg" class="img-fluid" alt="Visa">
            <img src="../assets/img/mastercard_pagamentoCartao.svg" class="img-fluid img__bandeira" alt="Mastercard">
            <img src="../assets/img/elo.svg" class="img-fluid img__bandeira" alt="Elo">
          </div>
        </div>
      </a>
    </div>
    <br>
  </main>

  <?php
  require_once('../assets/components/footer.php');
  ?>

</body>

</html