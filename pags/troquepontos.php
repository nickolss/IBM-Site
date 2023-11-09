<?php 
  require_once('../assets/scripts/iniciarSessao.php');
  require_once("../assets/scripts/verificaPontos.php");
  if($_SESSION['plano'] != 'turbinado'){
      $tituloModal = "Função apenas para clientes turbinados!";
      $textoModal = "Aprimore seu plano para acessar essa área.";
      require_once('../assets/components/modal.php');
  }
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
          <p class="pontos__Perfil">Seus pontos: <?php if(!empty($pontos[0])){
            echo $pontos[0];
          }else{
            echo 0;
          }  ?></p>
        </div>
      </section>

      <!--PRODUTOS-->
      <div class="title__produtos">
        <img src="../assets/img/icone-carrinho-vermelho.svg" alt="Imagem Produto">
        <h1 class="mainTitle">Produtos</h1>
      </div>

      <div class="container__produtos">

        <div class="linha__produtos">
            <a href="./trocasDisponiveis.php?produtoTroca=capa-volante" class="link__produto">
              <div class="produto">
                  <div class="img__produto">
                      <img src="../assets/img/trocaCapaVolante.png" alt="Capa de Volante ">
                  </div>
                  <div class="texto__produto">
                      <h3>Capa de Volante</h3>
                      
                  </div>
              </div>
            </a>

            <a href="./trocasDisponiveis.php?produtoTroca=cheirinho-carro" class="link__produto">
              <div class="produto">
                  <div class="img__produto">
                      <img src="../assets/img/trocaCheirinho.png" alt="Cheirinho de carro">
                  </div>
                  <div class="texto__produto">
                      <h3>Cheirinho de Carro</h3>
                      
                  </div>
              </div>
            </a>
        </div>

        <div class="linha__produtos">
            <a href="./trocasDisponiveis.php?produtoTroca=chaveiro" class="link__produto">
              <div class="produto">
                  <div class="img__produto">
                      <img src="../assets/img/trocaChaveiro.png" alt="Chaveiro">
                  </div>
                  <div class="texto__produto">
                      <h3>Chaveiro</h3>
                  </div>
              </div>
            </a>

            <a href="./trocasDisponiveis.php?produtoTroca=limpador" class="link__produto">
              <div class="produto">
                  <div class="img__produto">
                      <img src="../assets/img/trocaLimpador.png" alt="Limpador de Parabrisa">
                  </div>
                  <div class="texto__produto">
                      <h3>Limpador de Parabrisa</h3>
                      
                  </div>
              </div>
            </a>
        </div>

        <div class="linha__produtos">
            <a href="./trocasDisponiveis.php?produtoTroca=tapa-sol" class="link__produto">
              <div class="produto">
                  <div class="img__produto">
                      <img src="../assets/img/trocaTapaSol.png" alt="Tapa Sol">
                  </div>
                  <div class="texto__produto">
                      <h3>Tapa Sol</h3>
                      
                  </div>
              </div>
            </a>

            <a href="./trocasDisponiveis.php?produtoTroca=tapete-carro" class="link__produto">
              <div class="produto">
                  <div class="img__produto">
                      <img src="../assets/img/trocaTapete.png" alt="Tapete de Carro">
                  </div>
                  <div class="texto__produto">
                      <h3>Tapete de Carro</h3>
                      
                  </div>
              </div>
            </a>
        </div>
      </div>

      <!--LAVAGEM-->
      <div class="title__lavagens">
        <div class="img__lavagem">
          <img id="img__lavagem-carro" src="../assets/img/icone-lavagem-carro.svg" alt="Imagem Lavagem de Carro">
        </div>
        <div class="divTitle__lavagem">
          <h1 class="title__lavagem">Lavagens</h1>
        </div>
      </div>

      <div class="linha__produtos">
            <a href="./troca.php?nomeProd=Lavagem Simples" class="link__produto">
              <div class="produto">
                  <div class="img__produto">
                      <img src="../assets/img/produtoLavagemSimples.png" alt="Lavagem Simples">
                  </div>
                  <div class="texto__produto">
                      <h3>Lavagem Simples</h3>
                      
                  </div>
              </div>
            </a>

            <a href="./troca.php?nomeProd=Lavagem Completa" class="link__produto">
              <div class="produto">
                  <div class="img__produto">
                      <img src="../assets/img/produtoLavagemCompleta.png" alt="Lavagem Completa">
                  </div>
                  <div class="texto__produto">
                      <h3>Lavagem Completa</h3>
                      
                  </div>
              </div>
            </a>
        </div>

    </div>
    <br>
  </main>

  <?php
  require_once('../assets/components/footer.php');
  ?>

</body>

</html