<?php 
  require_once('../assets/scripts/iniciarSessao.php');
  if(isset($_SESSION['nomeCliente'])){
    header("Location: ./perfil.php");
  }else if(isset($_SESSION['rf']) || isset($_SESSION['rfMec'])){
    header("Location: ../administrador/dashboard.php");
  }
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Turn Motors | Login</title>

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
          <form action="../assets/scripts/verificarRegistro.php" method="POST">
            <h1>Login</h1>
            <div class="caixa__input">
              <input type="email" name="email" id="email" placeholder="email" required>
              <i class='bx bxs-user'></i>
            </div>
            <div class="caixa__input">
              <input type="password" name="senha" id="senha" placeholder="senha" required pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#*$%^&+=!])(?!.*\s).{8,}$" title="A senha precisa conter pelo menos 8 caractéres, uma letra maiúscula e uma minúscula e um símbolo.">
              <i class='bx bxs-lock-alt'></i>
            </div>
            <div class="lembrar__esquecer">
              <!--<a href="recuperar-senha.php">Esqueceu a Senha?</a>-->
            </div>
            <button type="submit" class="botao__login">Entrar</button>
            
            <!--ARQUIVOS GOOGLE-->
            <script src="https://accounts.google.com/gsi/client" async defer></script>
            <script src="https://unpkg.com/jwt-decode/build/jwt-decode.js"></script>
            <script>
                function handleCredentialResponse(response) {
                  const data = jwt_decode(response.credential)
                  console.log(data)

                  fullName.textContent = data.name
                  sub.textContent = data.sub
                  given_name.textContent = data.given_name
                  family_name.textContent = data.family_name
                  email = data.email
                  verifiedEmail = data.verifiedEmail
                  picture.setAtribute("src", data.picture)
                }
                window.onload = function () {
                  google.accounts.id.initialize({
                    client_id: "758394871681-q3d1absjfou2japab2fgsvlgsqvjqt0s.apps.googleusercontent.com",
                    callback: handleCredentialResponse
                  });
                  google.accounts.id.renderButton(
                    document.getElementById("buttonDiv"),
                    { theme: "filled_black", 
                      size: "large",
                      type: "standard",
                      shape: "pill",
                      text: "continue_with",
                      locale: "pt-BR",
                      logo_alignment: "left",
                      width: "340" }  // customization attributes
                  );
                  google.accounts.id.prompt(); // also display the One Tap dialog
                }
            </script>
            <hr><p class="or">ou</p><hr>
            <div id="buttonDiv"></div>
            <p id="fullName"></p>
            <p id="sub"></p>
            <p id="given_name"></p>
            <p id="family_name"></p>
            <p id="email"></p>
            <p id="verifiedEmail"></p>
            <img id="picture">
            <div class="link__registrar">
              <p>Não tem uma conta?<a href="cadastro.php"> Cadastre-se</a></p>
            </div>
          </form>
        </div>
        <div class="img">
          <img src="../assets/img/loginImg.png" alt="Homem ao Computador">
        </div>
      </div>
      <div class="mobile">
        <div class="texto">
          <form action="../assets/scripts/verificarRegistro.php" method="POST">
            <h1>Login</h1>
            <div class="caixa__input">
              <input type="email" name="email" id="email" placeholder="email" required>
              <i class='bx bxs-user'></i>
            </div>
            <div class="caixa__input">
              <input type="password" name="senha" id="senha" placeholder="senha" required>
              <i class='bx bxs-lock-alt'></i>
            </div>
            <div class="lembrar__esquecer">
              <!--<label for="lembrarConta"><input type="checkbox" name="lembrarConta" id="lembrarConta">Lembrar Conta</label>
              <a href="recuperar-senha.php">Esqueceu a Senha?</a>-->
            </div>
            <button type="submit" class="botao__login">Entrar</button>
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