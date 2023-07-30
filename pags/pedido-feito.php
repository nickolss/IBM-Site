<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Turn Motors | Equipe 2023</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <link rel="stylesheet" href="../assets/css/pedido-confirmado.min.css">
  <link rel="stylesheet" href="../assets/css/estilos-importantes.css">



  <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">

  <script src="../assets/js/js-bootstrap/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="../assets/js/java.js" defer></script>
  <script src="../assets/js/pedido-info.js"></script>

</head>

<body onload="gerarNumeropedido() , dataPedido()">
  <?php
  require_once('../assets/components/header.php');
  ?>


  <main class="pedido-confirmado">

    <div class="container">
      <div class="row">
        <div class="col">
          <div style="display: flex; justify-content: center; margin-top: 90px;">
            <div>
              <h2 class="principal__titulo">Olá!</h2>
            </div>
          </div>


        </div>
        <div class="col">
          <div class="principal__informacoes">
            <h3 class="informacoes__titulo">Informações do Pedido</h3>
            <p class="informacoes__texto" id="numero-pedido">
              Número da Encomenda: #
            </p>
            <p class="informacoes__texto" id="data-atual">Data da Encomenda:</p>
            <p class="informacoes__texto">Total de Encomenda:</p>
          </div>
        </div>
      </div>
    </div>




    <hr class="divisao" />
    <br>
    <br>

    <div class="container">
      <div class="row">
        <div class="col" style="display: flex; justify-content: center;">
          <div style="width: 500px;">
            <p class="agradecimentos__texto">
              Temos o prazer de o informar que recebemos a sua encomenda!
            </p>
            <p class="agradecimentos__texto">
              Assim que a sua encomenda for enviada, enviaremos um e-mail com um
              número de rastreio e um link para que possa ver o movimento da sua
              encomenda.
            </p>
            <p class="agradecimentos__texto">
              Se tiver alguma dúvida, contate-nos aqui no <a href="">Instagram.</a>
            </p>
          </div>

        </div>
      </div>

    </div>

    <br>
    <br>

    <hr class="divisao" />
    <br>
    <br>
    <div class="container">
      <div class="row">
        <div class="col">
          <div style="text-align: center;">
            <h2 class="outros-itens__titulo">Você também pode adorar estes:</h2>
          </div>


          <div class="produtos">
            <!-- 1 Linha -->
            <img src="../assets/img/manopla-cambio-automatico-200x200.png" alt="Manopla de Cambio de Automático" class="produtos__item" />

            <img src="../assets/img/palhetas 200x200.svg" alt="Palhetas de limpar vidro" class="produtos__item" />

            <img src="../assets/img/volante-personalizado-200x200.png" alt="Volantes Personalizado" class="produtos__item" />

            <!-- 2 Linha -->

            <img src="../assets/img/pneu 200x200.png" alt="Pneu" class="produtos__item" />

            <img src="../assets/img/bateria-de-carro 200x200.svg" alt="Baterria de Carro" class="produtos__item" />

            <img src="../assets/img/oleo de motor 200x200.svg" alt="Óleo de motor" class="produtos__item" />
          </div>
        </div>
      </div>
    </div>




    <hr class="divisao" />

    <div class="container">
      <div class="row">
        <div class="col">
          <div style="text-align: center;">
            <h2 class="formulario__titulo">Diga a sua experiência</h2>
          </div>


          <div class="conteudo-form">
            <div class="inputs">

              <textarea name="coment" id="coment" cols="30" rows="10" placeholder="Digite seu comentário sobre como deseja seu veículo"></textarea>
            </div>

            <img src="../assets/img/logo-final-finalmesmo 300x300.svg" alt="Logo da Turn Motors" class="conteudo-form__imagem">
          </div>
        </div>
      </div>
    </div>


  </main>

  <?php
  require_once('../assets/components/footer.php');
  ?>

</body>

</html>