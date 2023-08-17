<?php
require_once('../assets/scripts/iniciarSessao.php');
if ($_SESSION['plano'] != 'turbinado') {
  echo "
  <script>
    alert('Você precisa assinar o plano turbinado.');
    setInterval( function() {
      window.location.href = 'http://localhost/IBM-Site/pags/perfil.php'
    }, 1000)
  </script>";
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Turn Motors | Benefícios</title>

  <!-- Arquivos do Bootstrap -->



  <link rel="stylesheet" href="../assets/css/beneficios.css">
  <link rel="stylesheet" href="../assets/css/estilos-importantes.css">

  <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script type="text/javascript" src="../assets/js/java.js" defer></script>
  <script src="../assets/js/js-bootstrap/bootstrap.bundle.min.js"></script>
</head>

<body>
  <?php
  require_once('../assets/components/header.php');
  ?>

  <main class="principal">
    <section class="banner">
      <div class="banner__textos">
        <h2 class="banner__titulo">Olá, <?= $_SESSION['nomeCliente'] ?>!</h2>
        <a href="troquepontos.html" class="banner__link">Troque seus pontos</a>
      </div>
      <img src="../assets/img/perfilPic.svg" class="banner__imagem">

    </section>

    <section class="informacoes-beneficios">
      <section class="beneficios">
        <div class="beneficios__header">
          <img src="../assets/img/iconeBeneficio.svg" class="beneficios__imagem">
          <h2 class="beneficios__titulo">Benefícios</h2>
        </div>
        <p class="beneficios__texto">Com o Plano Turbinado, você, cliente Turn Motors, tem direito há:</p>
        <ul class="beneficios__lista">
          <li class="lista__item">
            <img src="../assets/img/iconePresente.svg" class="item__imagem">
            <h3 class="item__titulo">Brindes</h3>
            <p class="item__texto">Diversos brindes misteriosos.</p>
          </li>
          <li class="lista__item">
            <img src="../assets/img/iconeCashBack.svg" class="item__imagem">
            <h3 class="item__titulo">Cashback</h3>
            <p class="item__texto">Retorne seu dinheiro em compras Turn Motors</p>
          </li>
          <li class="lista__item">
            <img src="../assets/img/iconeFrete.svg" class="item__imagem">
            <h3 class="item__titulo">Frete Grátis</h3>
            <p class="item__texto">Entrega grátis e tunada em todo o país</p>
          </li>
        </ul>
      </section>
      <section class="como-ganhar">
        <img src="../assets/img/iconeInterrogacao.svg" class="como-ganhar__imagem">
        <h2 class="como-ganhar__titulo">Como ganhar pontos?</h2>
        <p class="como-ganhar__texto">No Plano Turbinado, você acumula pontos ao comprar produtos novos.</p>
      </section>
      <section class="como-trocar">
        <img src="../assets/img/iconeComoTrocar.svg" class="como-trocar__imagem">
        <h2 class="como-trocar__titulo">Como trocar?</h2>
        <p class="como-trocar__texto">Agora que você escolheu o Plano Turbinado, chegou o momento de utilizá-lo. Seus pontos podem ser trocados por:</p>
        <ul class="como-trocar__lista">
          <li class="lista__item">
            <img src="../assets/img/iconeProdutoAzul.svg" class="item__imagem">
            <h3 class="item__titulo">Produtos</h3>
            <p class="item__texto">Troque os seus pontos diretamente pelo produto que você gostou!</p>
          </li>
          <li class="lista__item">
            <img src="../assets/img/iconeLavagem.svg" class="item__imagem">
            <h3 class="item__titulo">Lavagem</h3>
            <p class="item__texto">Troque os seus pontos por lavagens em seu veículo.</p>
          </li>
        </ul>
      </section>
    </section>
  </main>


  <?php
  require_once('../assets/components/footer.php');
  ?>
</body>

</html