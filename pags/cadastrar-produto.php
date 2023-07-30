<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Turn Motors | Cadastrar Produto</title>

  <!-- Arquivos do Bootstrap -->



  <link rel="stylesheet" href="../assets/css/reset.min.css">
  <link rel="stylesheet" href="../assets/css/cadastro-produto.min.css">
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
    <h2 class="principal__titulo">Cadastrar Produtos</h2>
    <form action="" method="post" class="formulario">
      <div class="formulario__inputs">
        <label for="nomeProd" class="formulario__nome-campo">Nome</label>
        <input type="text" name="nomeProd" id="nomeProd" class="formulario__campo">
      </div>

      <div class="formulario__inputs">
        <label for="precoProd" class="formulario__nome-campo">Preço</label>
        <input type="text" name="precoProd" id="preco" class="formulario__campo">
      </div>

      <div class="formulario__inputs">
        <label for="descricaoProd" class="formulario__nome-campo">Descricao</label>
        <textarea name="descricaoProd" id="descricaoProd" cols="30" rows="10" class="formulario__campo"></textarea>
      </div>

      <div class="formulario__inputs">
        <label for="fotoProd" class="formulario__nome-campo">Foto</label>

        <label class="formulario__img">
          <input type="file" name="fotoProd" id="fotoProd" accept="image/*" class="img__input">
          <span class="img__foto">
            <p class="img__texto">Escolha uma Imagem: </p>
            <img src="../assets/img/iconeImagem.svg" class="foto__img">
            <img class="img__conteudo">
          </span>
        </label>
      </div>

      <button type="submit" value="turbinado" class="formulario__botao formulario__botao--turbinado" name="plano">Cadastrar</button>
    </form>
  </main>

  <?php
  require_once('../assets/components/footer.php');
  ?>


</body>

</html