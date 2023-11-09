<?php
require_once('../assets/scripts/conexao.php');
require_once('../assets/scripts/iniciarSessao.php');
require_once('../assets/scripts/consultaCliente.php');

$dataAtual = date("Y-m-d");

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Turn Motors | Agendamento</title>

  <!--CSS-->
  <link rel="stylesheet" href="../assets/css/agendamento.min.css">
  <link rel="stylesheet" href="../assets/css/pagamento-cartao.min.css">
  <link rel="stylesheet" href="../assets/css/estilos-importantes.css">

  <!--LINK ICONES-->
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  <!--FAVICON-->
  <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">

  <script type="text/javascript" src="../assets/js/java.js" defer></script>
  <script type="text/javascript" src="../assets/js/mascaraCartao.js" defer></script>
  <script src="../assets/js/js-bootstrap/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body id="container__body">

  <!--HEADER-->
  <?php
  require_once('../assets/components/header.php');
  $id = (int)$_SESSION['id']; //atribuindo o 'id' da sessão atual para a variável $id
  $sql = "SELECT * FROM pedido_orcamento WHERE `id_cliente`=$id AND `status`='cliente confirmado'";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $quantidadeTupla = $stmt->rowCount();
  $pedidos = $stmt->fetchAll(PDO::FETCH_ASSOC);

  if ($quantidadeTupla > 0) {
    foreach ($pedidos as $pedido) {
      if ($pedido['status'] == 'cliente confirmado') {

        $placa = $pedido['placaCarro'];
        $personalizacao = $pedido['personalizacao'];
        $preco = (string)$pedido['preco'];
  ?>

        <main>
          <div class="titulo">
            <h1 class='mainTitle'>Agendar <?= $personalizacao ?></h1>
          </div>

          <div class="cadastro">

            <form action="../assets/scripts/cadastrarAgendamentoPersonalizacao.php" method="POST">

              <!--PARTE DA DATA E HORÁRIO DO AGENDAMENTO-->
              <div class="subTitulo">
                <h2 class="subTitle">Agende sua data e horário para realizarmos a personalização</h2>
                <p class="paragrafo__subTitle">Avenida Turbo Nº1</p>
              </div>

              <div class="caixa__input">
                <input type="date" required name="data" id="data" autocomplete="off">
                <label for="data">Data</label>
              </div>

              <div class="caixa__input">
                <div class="dropdown-categorias">
                  <label id="label__dropdown__categoria" for="horario">Horário:</label>
                  <select required id="horario" name="horario">
                    <option class="opcao__categoria" value="8h">8h</option>
                    <option class="opcao__categoria" value="10h">10h</option>
                    <option class="opcao__categoria" value="12h">12h</option>
                    <option class="opcao__categoria" value="14h">14h</option>
                    <option class="opcao__categoria" value="16h">16h</option>
                    <option class="opcao__categoria" value="18h">18h</option>
                  </select>
                </div>
                <br>
              </div>

              <?php

              ?>
              <div class="caixa__input-info">
                <select class="input__placa-personalizacao" name="placaCarro" id="placaCarro">
                  <option value=" <?= $pedido['placaCarro'] ?> " selected> <?= $pedido['placaCarro'] ?> </option>
                </select>

                <select class="input__placa-personalizacao" name="personalizacao" id="personalizacao">
                  <option value=" <?= $pedido['personalizacao'] ?> " selected><?= $pedido['personalizacao'] ?> </option>
                </select>
              </div>

              <!--PARTE DE PAGAMENTO DO AGENDAMENTO-->
              <div style="margin-top: 50px;" class="subTitulo">
                <h2 class="subTitle">Informe os dados do seu cartão</h2>
                <p class="paragrafo__subTitle">Pagamento para a personalização desejada.</p>
                <p class="paragrafo__subTitle">Após pagar a personalização, no dia indicado por você, cliente Turn Motors, venha para nossa oficina para realizarmos a personalização em seu veículo.</p>
              </div>

              <div id="div__inputCartao">

                <div class="input__endereco">

                  <div class="caixa__input">
                    <input style="height: 52px;" type="date" name="dataValidade" id="dataValidade" autocomplete="off" min="<?= $dataAtual ?>" required>
                    <label for="data">Data de Validade</label>
                  </div>

                  <div class="caixa__input caixa__input__margin">
                    <input type="text" required name="numeroCartao" id="numeroCartao" autocomplete="off" maxlength="19">
                    <label for="numeroCartao">Número do Cartão</label>
                  </div>

                </div>

                <div class="input__endereco">
                  <div class="caixa__input">
                    <input class="inputCartao" type="text" id="cvv" name="cvvCartao" id="cvvCartao" size="4" maxlength="4" pattern="\d{3,3}" title="O CVV deve ter 3 digitos numéricos." required>
                    <label for="address">CVV</label>
                  </div>

                  <div class="caixa__input caixa__input__margin">
                    <input type="text" required name="nomeCartao" id="nomeCartao" autocomplete="off" minlength="1">
                    <label for="numero">Nome Completo</label>
                  </div>
                </div>



                <div id="div__forma__pagamento__title">
                  <h2 id="forma__pagamento__title">Escolha sua forma de pagamento preferida:</h2>
                </div>

                <div class="opcao__cartao">
                  <div class="opcao__radio__cartao">
                    <input class="inputRadio" type="radio" id="credito" name="opcao_cartao" value="credito">
                    <label class="labelRadio" id="labelCredito" for="credito">Crédito</label>
                  </div>
                  <div class="opcao__radio__cartao opcao__radio__cartao__margin">
                    <input class="inputRadio" type="radio" id="debito" name="opcao_cartao" value="debito">
                    <label class="labelRadio" for="debito">Débito</label>
                  </div>
                  <br>


                </div>
                <div class="div__preco">
                  <?= "<p id='preco'>R$$preco</p>"; ?>
                  <?= "<p id='preco'>$personalizacao</p>"; ?>
                </div>

                <div class="botoes">
                  <div class="botao">
                    <button class="botao__laranja" type="submit" name="btn-pedido-orcamento" id="btn-pedido-orcamento" value="confirmado">Agendar</button>
                  </div>
                  <div class="botao">
                    <button class="botao__laranja" type="submit" name="btn-pedido-orcamento" id="btn-pedido-orcamento" value="cancelado">Cancelar</button>
                  </div>
                </div>

            </form>
            <hr>
          </div>
        </main>

    <?php
        //fechamento das chaves do começo do arquivo
        //if($pedido['status'] == 'mecânico confirmado')
      }
      //foreach ($pedidos as $pedido)
    }
    //if ($quantidadeTupla > 0)
  } else { //caso a quantidade de registros seja 0, exibirá a mensagem

    ?>
    <main>
      <h1 class='mainTitle'>Nenhum agendamento registrado.</h1>
    </main>

  <?php
  }
  ?>

  <!--FOOTER-->
  <?php
  require_once('../assets/components/footer.php');
  ?>

</body>

</html