
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Turn Motors | Recuperar Senha</title>

  <!--ARQUIVOS BOOTSTRAP-->



  <!--LINK ICONES-->
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  <link rel="stylesheet" href="../assets/css/login.min.css">
  <link rel="stylesheet" href="../assets/css/estilos-importantes.css">


  <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">
  <script type="text/javascript" src="../assets/js/java.js" defer></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../assets/js/js-bootstrap/bootstrap.bundle.min.js"></script>
</head>

<body id="container__body">

  <?php
  require_once('../assets/components/header.php');
  ?>

  <main>
    <div class="container">
      <div class="tela__grande">
        <div class="texto">
          <form action="../assets/scripts/recuperarSenha.php" method="POST">
            <h1>Recuperar Senha</h1>
            <div class="caixa__input">
              <input type="email" name="email" id="email" placeholder="email" required>
              <i class='bx bxs-user'></i>
            </div>
            <button type="submit" class="botao__login">Recuperar</button>
            <div class="link__registrar">
              <p>Não tem uma conta?<a href="cadastro.php">Cadastre-se</a></p>
            </div>
          </form>
        </div>
        <div class="img">
          <img src="../assets/img/loginImg.svg" alt="Homem ao Computador">
        </div>
      </div>
      <div class="mobile">
        <div class="texto">
          <form action="../assets/scripts/verificarRegistro.php" method="POST">
            <h1>Recuperar Senha</h1>
            <div class="caixa__input">
              <input type="email" name="email" id="email" placeholder="email" required>
              <i class='bx bxs-user'></i>
            </div>
            <button type="submit" class="botao__login">Recuperar</button>
            <div class="link__registrar">
              <p>Não tem uma conta?<a href="cadastro.php">Cadastre-se</a></p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>

  <?php
  require_once('../assets/components/footer.php');
  ?>

</body>

</html