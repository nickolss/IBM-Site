<?php
//require_once('../assets/scripts/consultaFuncionario.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Turn Motors | Cadastrar Administrador</title>

  <!--LINK ICONES-->
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  <link rel="stylesheet" href="../assets/css/reset.min.css">
  <link rel="stylesheet" href="../assets/css/cadastro.min.css">
  <link rel="stylesheet" href="../assets/css/dashboard.css">
  <link rel="stylesheet" href="../assets/css/estilos-importantes.css">

  <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../assets/js/mascaraCpf.js" defer></script>
  <script src="../assets/js/mascaraTelefone.js" defer></script>
  <script src="../assets/js/validacaoForm.js" defer></script>
  <script src="../assets/js/validarCpf.js" defer></script>
  <script src="../assets/js/js-bootstrap/bootstrap.bundle.min.js"></script>
</head>

<body id="body">
  <?php
  require_once('../assets/components/header-adm.php');
  ?>

  <main class="principal">
    <div class="titulo">
      <h1 class="mainTitle">Cadastrar Administrador</h1>
    </div>

    <form action="../assets/scripts/cadastrarAdministrador.php" method="POST">
      <div class="cadastro">
        <div class="caixa__input">
          <input type="text" required name="nome" id="nome" autocomplete="off">
          <label for="nome">Nome</label>
        </div>
        <div class="caixa__input">
          <input type="email" required name="email" id="email" autocomplete="off">
          <label for="email">Email</label>
        </div>
        <div class="caixa__input">
          <input type="password" required name="senha" id="senha" autocomplete="off" onchange="conferirSenhas()" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#*$%^&+=!])(?!.*\s).{8,}$" title="A senha precisa conter pelo menos 8 caractéres, uma letra maiúscula e uma minúscula e um símbolo.">
          <label for="senha">Senha</label>
        </div>
        <div class="caixa__input">
          <input type="password" required name="confirmarSenha" id="confirmarSenha" autocomplete="off" onchange="conferirSenhas()">
          <label for="senha">Confirmar Senha</label>
        </div>
        <!-- VALIDAÇÃO EM DESENVOLVIMENTO -->
        <div class="caixa__input">
          <input type="text" required name="tel" id="tel" autocomplete="off" maxlength="14" pattern="^\(\d{2}\)\d{5}-\d{4}$">
          <label for="tel">Telefone</label>
        </div>

        <div class="caixa__input">
          <input type="date" required name="data" id="data" autocomplete="off">
          <label for="data">Data de Nascimento</label>
        </div>
        <div class="caixa__input" id="inputCpf">
          <input type="text" required name="cpf" id="cpf" autocomplete="off" maxlength="14">
          <label for="cpf">CPF</label>
        </div>
        <div class="div__termos">
          <div class="filho__termos"><label for="termos"><input type="checkbox" name="termos" id="termos" required>Aceitar Termos de condições</label></div>
        </div>
      </div>
      <div class="div__botoes">
        <button class="botao__laranja" type="submit">Cadastrar</button>
      </div>
    </form>

  </main>

  <?php
  require_once('../assets/components/footer.php');
  ?>


</body>

</html