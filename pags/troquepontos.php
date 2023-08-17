<?php 
  require_once('../assets/scripts/iniciarSessao.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Turn Motors | Trocar Pontos</title>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!--ARQUIVOS BOOTSTRAP-->



  <link rel="stylesheet" href="../assets/css/troquepontos.min.css">
  <link rel="stylesheet" href="../assets/css/estilos-importantes.css">

  <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">
  <script type="text/javascript" src="../assets/js/java.js" defer></script>
  <script src="../assets/js/js-bootstrap/bootstrap.bundle.min.js"></script>
</head>

<body id="container__body">

  <?php
  require_once('../assets/components/header.php');
  ?>

  <main>
    <div class="container">

      <section class="banner">
        <div class="banner__textos">
          <h2 class="banner__titulo">Olá, <?= $_SESSION['nomeCliente'] ?>!</h2>
          <p class="pontos__Perfil">Seus pontos: <?= $_SESSION['quantidadePontos'] ?></p>
        </div>
        <img src="../assets/img/perfilPic.svg" class="banner__imagem">
      </section>

      <div class="title__produtos">
        <img src="../assets/img/iconeProdutoTrocarPontos.svg" alt="Imagem Produto">
        <h1 class="mainTitle">Produtos</h1>
      </div>

      <!--TELA GRANDE PRODUTOS-->
      <div class="Bigmain__produtos">
        <div class="Bigsub__produtos">
          <a href="troca-cheirinho.php" class="link__produtos">
            <div class="produto">
              <img src="../assets/img/produtoCheirinho.png" alt="Cheirinho de Carro">
              <p class="texto__produto"><span class="titulo__produto">Cheirinho de Carro</span> <br> <span class="ponto__produto">Pontos: x</span></p>
            </div>
          </a>
          <a href="troca-volante.php" class="link__produtos">
            <div class="produto produtoDireita">
              <img src="../assets/img/produtoCapaVolante.png" alt="Capa de Volante">
              <p class="texto__produto"><span class="titulo__produto">Capa de Volante</span> <br> <span class="ponto__produto">Pontos: x</span></p>
            </div>
          </a>
          <a href="troca-limpador.php" class="link__produtos">
            <div class="produto produtoDireita">
              <img src="../assets/img/produtoLimpadorVidro.svg" alt="Limpador de Vidro">
              <p class="texto__produto"><span class="titulo__produto">Limpador de Vidro</span> <br> <span class="ponto__produto">Pontos: x</span></p>
            </div>
          </a>
        </div>

        <div class="Bigsub__produtos">
          <a href="troca-chaveiro.php" class="link__produtos">
            <div class="produto" id="produto__chaveiro">
              <img src="../assets/img/produtoChaveiroRetrovisor.png" alt="Chaveiro de Retrovisor">
              <p class="texto__produto"><span class="titulo__produto">Chaveiro ⠀ Retrovisor</span> <br> <span class="ponto__produto">Pontos: x</span></p>
            </div>
          </a>
          <a href="troca-tapete.php" class="link__produtos">
            <div class="produto produtoDireita produto__tapete">
              <img src="../assets/img/produtoTapete.png" alt="Tapete de Carro">
              <p class="texto__produto"><span class="titulo__produto">Tapete de Carro</span> <br> <span class="ponto__produto">Pontos: x</span></p>
            </div>
          </a>
          <a href="troca-tapasol.php" class="link__produtos">
            <div class="produto produtoDireita">
              <img src="../assets/img/produtoTapaSol.svg" alt="Tapa-Sol de Carro">
              <p class="texto__produto"><span class="titulo__produto">Tapa-Sol de Carro</span> <br> <span class="ponto__produto">Pontos: x</span></p>
            </div>
          </a>
        </div>
      </div>

      <!--TELA MEDIA PRODUTOS-->
      <div class="main__produtos">
        <div class="sub__produtos">
          <a href="troca-cheirinho.php" class="link__produtos">
            <div class="produto">
              <img src="../assets/img/produtoCheirinho.png" alt="Cheirinho de Carro">
              <p class="texto__produto"><span class="titulo__produto">Cheirinho de Carro</span> <br> <span class="ponto__produto">Pontos: x</span></p>
            </div>
          </a>
          <a href="troca-volante.php" class="link__produtos">
            <div class="produto produtoDireita">
              <img src="../assets/img/produtoCapaVolante.png" alt="Capa de Volante">
              <p class="texto__produto"><span class="titulo__produto">Capa de Volante</span> <br> <span class="ponto__produto">Pontos: x</span></p>
            </div>
          </a>
        </div>

        <div class="sub__produtos">
          <a href="troca-limpador.php" class="link__produtos">
            <div class="produto">
              <img src="../assets/img/produtoLimpadorVidro.svg" alt="Limpador de Vidro">
              <p class="texto__produto"><span class="titulo__produto">Limpador de Vidro</span> <br> <span class="ponto__produto">Pontos: x</span></p>
            </div>
          </a>
          <a href="troca-chaveiro.php" class="link__produtos">
            <div class="produto produtoDireita" id="Mediaproduto__chaveiro">
              <img src="../assets/img/produtoChaveiroRetrovisor.png" alt="Chaveiro de Retrovisor">
              <p class="texto__produto"><span class="titulo__produto">Chaveiro Retrovisor</span> <br> <span class="ponto__produto">Pontos: x</span></p>
            </div>
          </a>
        </div>

        <div class="sub__produtos">
          <a href="troca-tapete.php" class="link__produtos">
            <div class="produto produto__tapete">
              <img src="../assets/img/produtoTapete.png" alt="Tapete de Carro">
              <p class="texto__produto"><span class="titulo__produto">Tapete de⠀⠀ Carro</span> <br> <span class="ponto__produto">Pontos: x</span></p>
            </div>
          </a>
          <a href="troca-tapasol.php" class="link__produtos">
            <div class="produto produtoDireita" id="Mediaproduto__tapaSol">
              <img src="../assets/img/produtoTapaSol.svg" alt="Tapa-Sol automotivo">
              <p class="texto__produto"><span class="titulo__produto">Tapa-Sol de Carro</span> <br> <span class="ponto__produto">Pontos: x</span></p>
            </div>
          </a>
        </div>
      </div>

      <!--MOBILE PRODUTOS-->
      <div class="mainMobile__produtos">
        <div class="Mobilesub__produtos">
          <a href="troca-cheirinho.php" class="link__produtos">
            <div class="produto">
              <img src="../assets/img/produtoCheirinho.png" alt="Cheirinho de Carro">
              <p class="texto__produto"><span class="titulo__produto">Cheirinho de Carro</span> <br> <span class="ponto__produto">Pontos: x</span></p>
            </div>
          </a>
        </div>

        <div class="Mobilesub__produtos">
          <a href="troca-volante.php" class="link__produtos">
            <div class="produto">
              <img src="../assets/img/produtoMobileCapaVolante.svg" alt="Capa de Volante">
              <p class="texto__produto"><span class="titulo__produto">Capa⠀de⠀ Volante</span> <br> <span class="ponto__produto">Pontos: x</span></p>
            </div>
          </a>
        </div>

        <div class="Mobilesub__produtos">
          <a href="troca-limpador.php" class="link__produtos">
            <div class="produto">
              <img src="../assets/img/produtoLimpadorVidro.svg" alt="Limpador de Vidro">
              <p class="texto__produto"><span class="titulo__produto">Limpador de⠀Vidro</span> <br> <span class="ponto__produto">Pontos: x</span></p>
            </div>
          </a>
        </div>

        <div class="Mobilesub__produtos">
          <a href="troca-chaveiro.php" class="link__produtos">
            <div class="produto">
              <img src="../assets/img/produtoMobileChaveiro.svg" alt="Chaveiro de Retrovisor">
              <p class="texto__produto"><span class="titulo__produto">Chaveiro Retrovisor</span> <br> <span class="ponto__produto">Pontos: x</span></p>
            </div>
          </a>
        </div>

        <div class="Mobilesub__produtos">
          <a href="troca-tapete.php" class="link__produtos">
            <div class="produto">
              <img src="../assets/img/produtoTapete.png" alt="Tapete de Carro">
              <p class="texto__produto"><span class="titulo__produto">Tapete de Carro⠀⠀</span> <br> <span class="ponto__produto">Pontos: x</span></p>
            </div>
          </a>
        </div>

        <div class="Mobilesub__produtos">
          <a href="troca-tapasol.php" class="link__produtos">
            <div class="produto">
              <img src="../assets/img/produtoTapaSol.svg" alt="Tapa-Sol de carro">
              <p class="texto__produto"><span class="titulo__produto">Tapa-Sol de carro⠀</span> <br> <span class="ponto__produto">Pontos: x</span></p>
            </div>
          </a>
        </div>
      </div>

      <div class="title__lavagens">
        <div class="img__lavagem">
          <img src="../assets/img/iconeLavagemTrocarPontos.svg" alt="Imagem Lavagem de Carro">
        </div>
        <div class="divTitle__lavagem">
          <h1 class="title__lavagem">Lavagens</h1>
        </div>
      </div>

      <!--TELA GRANDE/MEDIA LAVAGENS-->
      <div class="main__lavagens">
        <div class="sub__produtos">
          <a class="link__produtos" href="troca-lavagemsimples.php">
            <div class="produto">
              <img src="../assets/img/produtoLavagemSimples.svg" alt="">
              <p class="texto__produto"><span class="titulo__produto">Lavagem Simples</span> <br> <span class="ponto__produto">Pontos: x</span></p>
            </div>
          </a>
          <a class="link__produtos" href="troca-lavagemcompleta.php">
            <div class="produto produtoDireita">
              <img src="../assets/img/produtoLavagemCompleta.png" alt="">
              <p class="texto__produto"><span class="titulo__produto">Lavagem Completa</span> <br> <span class="ponto__produto">Pontos: x</span></p>
            </div>
          </a>
        </div>
      </div>

      <!--MOBILE LAVAGENS-->
      <div class="mainMobile__lavagens">
        <div class="subMobile__produtos subMobile__lavagens">
          <a class="link__produtos" href="troca-lavagemsimples.php">
            <div class="produto">
              <img src="../assets/img/produtoLavagemSimples.svg" alt="">
              <p class="texto__produto"><span class="titulo__produto">Lavagem <br> Simples</span> <br> <span class="ponto__produto">Pontos: x</span></p>
            </div>
          </a>
        </div>
        <div class="subMobile__produtos subMobile__lavagens">
          <a class="link__produtos" href="troca-lavagemcompleta.php">
            <div class="produto">
              <img src="../assets/img/produtoLavagemCompleta.png" alt="">
              <p class="texto__produto"><span class="titulo__produto">Lavagem <br> Completa</span> <br> <span class="ponto__produto">Pontos: x</span></p>
            </div>
          </a>
        </div>
      </div>

    </div>
    <br>
  </main>

  <?php
  require_once('../assets/components/footer.php');
  ?>

</body>

</html