<?php
require_once('../assets/scripts/conexao.php');
require_once('../assets/scripts/iniciarSessao.php');
require_once('../assets/scripts/consultaFuncionario.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Turn Motors | Dashboard</title>

  <!--LINK ICONES-->
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  <link rel="stylesheet" href="../assets/css/reset.min.css">
  <link rel="stylesheet" href="../assets/css/cadastro-produto.min.css">
  <link rel="stylesheet" href="../assets/css/dashboard.css">
  <link rel="stylesheet" href="../assets/css/estilos-importantes.css">

  <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">
  <!-- <script type="text/javascript" src="../assets/js/java.js" defer></script> -->
  <script src="../assets/js/js-bootstrap/bootstrap.bundle.min.js"></script>

</head>

<body id="container__body">
  <?php
  require_once('../assets/components/header-adm.php');
  ?>

  <main>
    <div class="container text-center principal">
      <div class="row">
        <div class="col">
          <div class="titulo">
            <h1 class="mainTitle">Olá, <?= $_SESSION['nomeFuncionario'] ?>!</h1>
          </div>
        </div>
      </div>

      <?php
      if (isset($_SESSION['rf'])) {

      ?>
        <div class="row">
          <div class="col">
            <img class="img__administrador" src="../assets/img/img-administrador.svg" alt="Imagem Administrador">
          </div>
        </div>

        <div class="row">
          <div class="col">
            <div class="div__botoes">
              <form action="cadastrar-produto.php">
                <button class="botao__laranja" type="submit">Adicionar Produto</button>
              </form>
              <form action="catalogo.php">
                <button class="botao__laranja" type="submit">Modificar Produto</button>
              </form>
            </div>
            <div class="div__botoes">
              <form action="cadastrar-user-adm.php">
                <button class="botao__laranja" type="submit">Adicionar Administrador</button>
              </form>
              <form action="cadastrar-mecanico.php">
                <button class="botao__laranja" type="submit">Adicionar Mecânico</button>
              </form>
            </div>
          </div>
        </div>

      <?php
      }
      ?>

      <?php
      if (isset($_SESSION['rfMec'])) {

      ?>

        <div class="row">
          <div class="col">
            <img class="img__administrador" src="../assets/img/Car finance.svg" alt="Imagem Administrador">
          </div>
        </div>

        <div class="row">
          <div class="col">
            <div class="div__botoes">
              <form action="cadastrar-orcamento.php">
                <button class="botao__laranja" type="submit">Verificar Orçamentos</button>
              </form>
            </div>
          </div>
        </div>

      <?php
      }
      ?>

      <div class="row">
        <div class="col">
          <form action="../assets/scripts/logout.php">
            <button class="botao__sair__dashboard" type="submit">Sair da Conta</button>
          </form>
        </div>
      </div>

    </div>
  </main>

  <script src="../assets/js/drowdown.js"></script>

  <?php
  require_once('../assets/components/footer.php');
  ?>


</body>

</html