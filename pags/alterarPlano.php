<?php
  require_once('../assets/scripts/conexao.php');
  require_once('../assets/scripts/iniciarSessao.php');
  require_once('../assets/scripts/consultaCliente.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Turn Motors | Alterar Plano</title>

  <!--LINK ICONES-->
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  <link rel="stylesheet" href="../assets/css/reset.min.css">
  <link rel="stylesheet" href="../assets/css/cadastro.min.css">
  <link rel="stylesheet" href="../assets/css/estilos-importantes.css">

  <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">
  
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../assets/js/js-bootstrap/bootstrap.bundle.min.js"></script>
  <!-- O atributo DEFER espera a página carregar para executar o Script -->

</head>

<body id="container__body">
  <?php
    require_once('../assets/components/header.php');
  ?>

  <main class="principal">
    <form action="../assets/scripts/alterarPlano.php" method="POST">
      <div class="titulo">
        <h1 class="mainTitle">Alterar Plano</h1>
        <h2 class="subTitle">Venha para o plano turbinado e conheça todos os benefícios da velocidade Turn Motors!</h2>
      </div>

        <section class="planos">
          <div class="plano__background-azul">
            <div class="plano-comum">
              <div class="plano__cabecalho">
                <img class="plano__img-velocimetro" src="../assets/img/velocimetroDevagar.svg">
                <h2 class="plano-comum__titulo">Plano Comum</h2>
              </div>
              <ul class="plano-comum__lista">
                <li class="lista__itens-comum">Entrega segura e em todo país</li>
                <li class="lista__itens-comum">Melhores preços entre as lojas</li>
                <li class="lista__itens-comum">Fornecedores confiáveis</li>
              </ul>
               <?php
                  if($_SESSION['plano'] == 'comum'){
               ?> 
                    <button type="submit" value="comum" class="formulario__botao formulario__botao--comum" name="plano" disabled>Alterar Plano</button>
              <?php
                }else if($_SESSION['plano'] == 'turbinado'){
              ?>
                    <button type="submit" value="comum" class="formulario__botao formulario__botao--comum" name="plano">Alterar Plano</button>
              <?php
                }
              ?>
            </div>
          </div>

          <div class="plano__background-rosa">
            <div class="plano-turbinado">
              <div class="plano__cabecalho">
                <img class="plano__img-velocimetro" src="../assets/img/velocimetro.svg">
                <h2 class="plano-turbinado__titulo">Plano Turbinado</h2>
              </div>
              <ul class="plano-turbinado__lista">
                <li class="lista__itens-turbinado">Pontos para utilizar em descontos</li>
                <li class="lista__itens-turbinado">Frete grátis e entregas mais rápidas</li>
                <li class="lista__itens-turbinado">Atendimento personalizado para esclarecer suas dúvidas</li>
                <li class="lista__itens-turbinado">Brindes mensais para personalizar seu carro</li>
                <li class="lista__itens-turbinado">Ofertas exclusivas</li>
                <li class="lista__itens-turbinado">Entrega segura e em todo país </li>
                <li class="lista__itens-turbinado">Melhores preços entre as lojas</li>
                <li class="lista__itens-turbinado">Fornecedores confiáveis</li>
              </ul>
              <p class="plano-turbinado__preco">apenas <span class="preco">R$29,90</span></p>
              <?php
                  if($_SESSION['plano'] == 'comum'){
               ?> 
                  <button type="submit" value="turbinado" class="formulario__botao formulario__botao--turbinado" name="plano">Alterar Plano</button>
              <?php
                }else if($_SESSION['plano'] == 'turbinado'){
              ?>
                   <button type="submit" value="turbinado" class="formulario__botao formulario__botao--turbinado" name="plano" disabled>Alterar Plano</button>
              <?php
                }
              ?>
            </div>
          </div>
        </section>

    </form>

  </main>

  <?php
  require_once('../assets/components/footer.php');
  ?>


</body>

</html