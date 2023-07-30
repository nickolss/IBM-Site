<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Turn Motors | Confirmar Compra</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>




  <link rel="stylesheet" href="../assets/css/conf-compra.min.css">
  <link rel="stylesheet" href="../assets/css/estilos-importantes.css">


  <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">
  <script type="text/javascript" src="../assets/js/java.js" defer></script>
  <script src="../assets/js/js-bootstrap/bootstrap.bundle.min.js"></script>
</head>

<body>
  <?php
  require_once('../assets/components/header.php');
  ?>

  <main class="conf-compra">
    <br class="space_maluko2">
    <br class="space_maluko2">
    <section class="garantia">
      <div class="container">
        <div class="garantia__principal">
          <h2 class="garantia__titulo">Garantia Estendida</h2>
          <div class="garantia__especificacoes">
            <p class="especificacoes__texto">Conserto com peças originais</p>
            <p class="especificacoes__texto">Atendimento Exclusivo</p>
            <p class="especificacoes__texto">
              Garante a durabilidade do seu produto por mais tempo
            </p>
          </div>
          <div class="garantia__vantagens-1">
            <div class="vantagens__input">
              <input type="radio" name="garantia" id="semgarantia" /> Sem
              garantia estendida
            </div>
            <hr class="divisao-vantagens">
            <div class="vantagens__imagem">
              <img src="../assets/img/no-check.svg" alt="Não tem garantia">
              <img src="../assets/img/no-check.svg" alt="Não tem garantia">
              <img src="../assets/img/no-check.svg" alt="Não tem garantia">
            </div>

          </div>


          <div class="garantia__vantagens">
            <div class="vantagens__input">
              <input type="radio" name="garantia" id="12meses" /> + 12 meses por
              8x de R$10 sem juros
            </div>
            <hr class="divisao-vantagens">
            <div class="vantagens__imagem">
              <img src="../assets/img/check.svg" alt="Tem garantia">
              <img src="../assets/img/check.svg" alt="Tem garantia">
              <img src="../assets/img/check.svg" alt="Tem garantia">
            </div>
          </div>


          <div class="garantia__vantagens">
            <div class="vantagens__input"><input type="radio" name="garantia" id="24meses" /> + 24 meses por 8x de R$16 sem juros</div>
            <hr class="divisao-vantagens">
            <div class="vantagens__imagem">
              <img src="../assets/img/check.svg" alt="Tem garantia">
              <img src="../assets/img/check.svg" alt="Tem garantia">
              <img src="../assets/img/check.svg" alt="Tem garantia">
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="garantia-principal-mobile">
      <div class="garantia-principal-mobile__container">
        <h2 class="garantia-principal-mobile__titulo">Garantia</h2>
        <div class="opcao-garantia-mobile">
          <label for="sem-garantia" class="opcao-garantia-mobile__titulo"><input type="radio" name="garantia" id="sem-garantia">Sem Garantia Extendida</label>

          <ul class="garantia-vantagens-mobile">
            <li class="sem-vantagem">Conserto com peças originais</li>
            <li class="sem-vantagem">Atendimento Exclusivo</li>
            <li class="sem-vantagem">Garante a durabilidade do seu produto por mais tempo
            </li>
          </ul>
        </div>

        <div class="opcao-garantia-mobile">
          <label for="garantia-12" class="opcao-garantia-mobile__titulo"><input type="radio" name="garantia" id="garantia-12">+ 12 meses por
            8x de R$10 sem juros</label>

          <ul class="garantia-vantagens-mobile">
            <li class="com-vantagem">Conserto com peças originais</li>
            <li class="com-vantagem">Atendimento Exclusivo</li>
            <li class="com-vantagem">Garante a durabilidade do seu produto por mais tempo
            </li>
          </ul>
        </div>

        <div class="opcao-garantia-mobile">
          <label for="garantia-24" class="opcao-garantia-mobile__titulo"><input type="radio" name="garantia" id="garantia-24">+ 24 meses por
            8x de R$16 sem juros</label>

          <ul class="garantia-vantagens-mobile">
            <li class="com-vantagem">Conserto com peças originais</li>
            <li class="com-vantagem">Atendimento Exclusivo</li>
            <li class="com-vantagem">Garante a durabilidade do seu produto por mais tempo
            </li>
          </ul>
        </div>

      </div>
    </section>


    <div class="divisao"></div>

    <nav>
      <div class="row " id="correcao">
        <div class="col">
          <h1 class="vg-titulo1 pagamento__titulo">Metódos de Pagamentos</h1>
        </div>
      </div>
      <br>
      <br>
      <div class="row vg-sumiu1" id="correcao">
        <div class="col">
          <div style="text-align: center;">
            <div style="font-size: 2em">Cartão</div>
            <div style="font-size: 1.3em; margin-right: 230px;">Débito</div>
            <div>
              <img width="100px" src="../assets/img/visa.svg">
              <img width="80px" src="../assets/img/master.svg">
              <img width="100px" src="../assets/img/elo.svg">
            </div>
            <br>
            <div style="font-size: 1.3em; margin-right: 230px;">Crédito</div>
            <div>
              <img width="100px" src="../assets/img/visa.svg">
              <img width="80px" src="../assets/img/master.svg">
              <img width="100px" src="../assets/img/elo.svg">
            </div>
            <div style="margin-top: 10px">
              <p>Até 12x sem juros. </p>
            </div>
          </div>
        </div>
        <div class="col">
          <div style="text-align: center;">
            <div style="font-size: 2em">Boleto</div>
            <img width="150px" src="../assets/img/boleto.svg">
            <p>O boleto será gerado após a finalização de sua compra. Imprima e pague no banco ou pague pela internet utilizando o código de barras do boleto.</p>
          </div>
        </div>
        <div class="col">
          <div style="text-align: center;">
            <div style="font-size: 2em; margin-bottom: 13px;">Pix</div>
            <img style="margin-bottom: 10px;" width="130px" src="../assets/img/pix.svg">
            <p>O pagamento é instantâneo e só pode ser à vista. 10% off.</p>
          </div>
        </div>
      </div>
      <hr class="vg-linha">
    </nav>


    <div class="row" style="margin-right: 0px;">
      <div class="col">
        <h2 class="envio__titulo">Método de Envio</h2>
      </div>
    </div>

    <br>
    <br>
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="agenda">
            <div>
              <h3 class="agenda__titulo">Agende a retirada do produto</h3>
            </div>

            <div class="agenda__form-dia">
              <label for="dia">Dia: </label>
              <input type="date" name="dia" id="dia" class="envio__input">
            </div>

            <div class="agenda__form-hora">
              <label for="hora">Horário: </label>
              <input type="time" name="hora" id="hora" class="envio__input" min="09:00" max="18:00" required>
            </div>
          </div>
        </div>

        <div class="col bordinha_nao_conflita">
          <div class="correios ">
            <h3 class="correios__titulo space_maluko">Correios</h3>
            <div class="correios__container">
              <div class="correios__form-cep">
                <label for="cep">CEP: </label>
                <input style="margin-right: 35px;" type="number" name="cep" id="cep" maxlength="8" minlength="8" required class="envio__input">
              </div>
              <divform class="correios__form-local">
                <div class="opcao-entrega">
                  <input type="radio" name="opcao-entrega" id="entrega-gratis">
                  <label for="entrega-gratis">Entrega Grátis</label>
                </div>

                <div class="opcao-entrega">
                  <input type="radio" name="opcao-entrega" id="entrega-tunada">
                  <label for="entrega-tunada">Entrega Tunada</label>
                </div>
                <div>
                  <a href="pedido-feito.html">
                    <button class="enviar">Receba seu Produto</button>
                  </a>
                </div>

            </div>
          </div>
        </div>
      </div>
    </div>
    </div>


    <br>
    <br>
  </main>

  <?php
  require_once('../assets/components/footer.php');
  ?>
</body>

</html>