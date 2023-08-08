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
  <link rel="stylesheet" href="../assets/css/dropdown.min.css">
  <link rel="stylesheet" href="../assets/css/estilos-importantes.css">

  <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">
  <script type="text/javascript" src="../assets/js/java.js" defer></script>
  <script src="../assets/js/imagem-prod.js" defer></script>
  <script src="../assets/js/preco.js" defer></script>
  <script src="../assets/js/js-bootstrap/bootstrap.bundle.min.js"></script>
</head>

<body id="body">
  <?php
  require_once('../assets/components/header.php');
  ?>

  <main class="principal">
    <div class="titulo">
      <h1 class="mainTitle">Cadastrar Produtos</h1>
    </div>
    <form action="" method="post" class="formulario">
      <div class="cadastro">

        <div class="caixa__input">
          <input type="text" required name="nomeProd" id="nomeProd" autocomplete="off">
          <label for="nomeProd">Nome</label>
        </div>

        <div class="caixa__input">
          <input type="number" required name="precoProd" id="precoProd" autocomplete="off">
          <label for="precoProd">Preço</label>
        </div>

        <div class="caixa__input">
          <textarea required name="descricaoProd" id="descricaoProd" cols="30" rows="3" class="formulario__campo"></textarea>
          <label for="descricaoProd">Descrição</label>
        </div>
        
        <div class="caixa__input">
          <div class="select-menu">
            <div class="select-btn">
              <span class="sBtn-text">Selecione a Categoria</span>
              <i id="icone__seta" class="bx bx-chevron-down"></i> <!--ICONE BOXICONS SETINHA PARA BAIXO-->
            </div>

            <ui class="options">
              <i class="option">
                <span class="option-text">Rebaixamento Dropped</span>
              </i>
              <i class="option">
                <span class="option-text">Rebaixamento Slammed</span>
              </i>
              <i class="option">
                <span class="option-text">Rebaixamento HellaFlush</span>
              </i>
              <i class="option">
                <span class="option-text">Pintura Sólida</span>
              </i>
              <i class="option">
                <span class="option-text">Pintura Metálica</span>
              </i>
              <i class="option">
                <span class="option-text">Pintura Perolizada</span>
              </i>
              <i class="option">
                <span class="option-text">Pneu Sólido</span>
              </i>
              <i class="option">
                <span class="option-text">Pneu Personalizado</span>
              </i>
              <i class="option">
                <span class="option-text">Pneu Duas Cores</span>
              </i>
              <i class="option">
                <span class="option-text">Adesivos Pequenos</span>
              </i>
              <i class="option">
                <span class="option-text">Adesivos Médios</span>
              </i>
              <i class="option">
                <span class="option-text">Adesivos Grandes</span>
              </i>
              <i class="option">
                <span class="option-text">Aerofólio</span>
              </i>
              <i class="option">
                <span class="option-text">Vidro</span>
              </i>
              <i class="option">
                <span class="option-text">Bancos</span>
              </i>
              <i class="option">
                <span class="option-text">Tunagem Reformulada</span>
              </i>
              <i class="option">
                <span class="option-text">Tunagem Remanufaturada</span>
              </i>
              <i class="option">
                <span class="option-text">Pneu de Carro</span>
              </i>
              <i class="option">
                <span class="option-text">Som, multimídia e eletrônicos</span>
              </i>
              <i class="option">
                <span class="option-text">Acessórios para Automóveis</span>
              </i>
              <i class="option">
                <span class="option-text">Cuidados Automotivos</span>
              </i>
              <i class="option">
                <span class="option-text">óleos e fluidos</span>
              </i>
              <i class="option">
                <span class="option-text">Baterias e acessórios</span>
              </i>
              <i class="option">
                <span class="option-text">Reboque e Transporte</span>
              </i>
              <i class="option">
                <span class="option-text">Peças para automóveis</span>
              </i>
              <i class="option">
                <span class="option-text">Equipamentos de Proteção</span>
              </i>
              <i class="option">
                <span class="option-text">Pneus de Moto</span>
              </i>
              <i class="option">
                <span class="option-text">Acessórios e peças para motos</span>
              </i>
              <i class="option">
                <span class="option-text">Ferramentas e Equipamentos</span>
              </i>
            </ui>

          </div>
        </div>

        <label class="picture" tabIndex="0">
            <input type="file" accept="image/*" class="picture__input" name="imgProd" id="imgProd">
            <span class="picture__image"></span>
        </label>

      </div>

      <div class="div__formulario__botao"><button type="submit" value="turbinado" class="formulario__botao formulario__botao--turbinado" name="plano">Cadastrar</button></div>
    </form>
  </main>

  <script src="../assets/js/drowdown.js"></script>

  <?php
  require_once('../assets/components/footer.php');
  ?>


</body>

</html