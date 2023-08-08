<?php 
  require_once('../assets/scripts/consultaFuncionario.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Turn Motors | Cadastrar Produto</title>

  <!--LINK ICONES-->
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  <link rel="stylesheet" href="../assets/css/reset.min.css">
  <link rel="stylesheet" href="../assets/css/cadastro-produto.min.css">
  <link rel="stylesheet" href="../assets/css/dashboard.css">
  <link rel="stylesheet" href="../assets/css/estilos-importantes.css">

  <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">
  <script type="text/javascript" src="../assets/js/java.js" defer></script>
  <script src="../assets/js/js-bootstrap/bootstrap.bundle.min.js"></script>
</head>

<body id="body">
  <?php
  require_once('../assets/components/header.php');
  ?>

  <main class="principal">
    <div class="titulo">
      <h1 class="mainTitle">Olá, {nome funcionário}!</h1>
    </div>

    <div class="div__grande__graficos">
        <div class="div__grafico">
            <img class="img__grafico" id="grafico1" src="#" alt="Gráfico 1">
        </div>
        <div class="div__grafico">
            <img class="img__grafico" id="grafico2" src="#" alt="Gráfico 2">
        </div>
        <div class="div__grafico">
            <img class="img__grafico" id="grafico3" src="#" alt="Gráfico 3">
        </div>
    </div>

    <div class="div__medio__graficos">
        <div class="linha">
            <div class="div__grafico">
                <img class="img__grafico" id="grafico1" src="#" alt="Gráfico 1">
            </div>
            <div class="div__grafico">
                <img class="img__grafico" id="grafico2" src="#" alt="Gráfico 2">
            </div>
        </div>
        <div class="linha">
            <div class="div__grafico">
                <img class="img__grafico" id="grafico3" src="#" alt="Gráfico 3">
            </div>
        </div>
    </div>
    
    <div class="botoes">
        <div class="linha">
            <div class="botao">
                <form action="cadastrar-produto.php">
                    <button class="botao__laranja" type="submit">Adicionar Produto</button>
                </form>
            </div>
            <div class="botao">
                <form action="cadastrar-funcionario.html">
                    <button class="botao__laranja" type="submit">Adicionar Funcionário</button>
                </form>
            </div>
        </div>
    </div>

    <div class="dropdown">
        <div class="select-menu">
            <div class="select-btn">
              <span class="sBtn-text">Selecione a Categoria</span>
              <i id="icone__seta" class="bx bx-chevron-down"></i> <!--ICONE BOXICONS SETINHA PARA BAIXO-->
            </div>

            <ui class="options">
              <i class="option">
                <span class="option-text">Funcionário 1</span>
              </i>
              <i class="option">
                <span class="option-text">Funcionário 2</span>
              </i>
              <i class="option">
                <span class="option-text">Funcionário 3</span>
              </i>
            </ui>
        </div>
    </div>

  </main>

  <script src="../assets/js/drowdown.js"></script>

  <?php
  require_once('../assets/components/footer.php');
  ?>


</body>

</html