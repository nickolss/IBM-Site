<?php
require_once('../assets/scripts/conexao.php');
require_once('../assets/scripts/iniciarSessao.php');
//require_once('../assets/scripts/consultaFuncionario.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Turn Motors | Cadastrar Orçamento</title>

  <!--LINK ICONES-->
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  <link rel="stylesheet" href="../assets/css/reset.min.css">
  <link rel="stylesheet" href="../assets/css/cadastro-produto.min.css">
  <link rel="stylesheet" href="../assets/css/personalizacoes.min.css">
  <link rel="stylesheet" href="../assets/css/itens-personalizacoes.min.css">
  <link rel="stylesheet" href="../assets/css/estilos-importantes.css">
  <link rel="stylesheet" href="../assets/css/cadastrar-orcamento.min.css">

  <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">
  <script type="text/javascript" src="../assets/js/java.js" defer></script>
  <script src="../assets/js/imagem-prod.js" defer></script>
  <script src="../assets/js/preco.js" defer></script>
  <script src="../assets/js/js-bootstrap/bootstrap.bundle.min.js"></script>
</head>

<body id="container__body">
  <?php
  require_once('../assets/components/header.php');
  ?>

  <main class="principal">
    <div class="titulo">
      <h1 class="mainTitle">Cadastrar Orçamento</h1>
    </div>

    <div class="card-container">
      <?php

      $sql = "SELECT * FROM pedido_orcamento";
      $stmt = $pdo->prepare($sql);
      $stmt->execute();
      $quantidadeTupla = $stmt->rowCount();
      $pedidos = $stmt->fetchAll(PDO::FETCH_ASSOC);

      if ($quantidadeTupla > 0) {
        foreach ($pedidos as $pedido) {
          if ($pedido['status'] == 'em avaliação') {

            $dataAtual = date("Y-m-d"); //atribui a data atual do sistema para a variável $dataAtual
            $dataAgendamento = $pedido['data']; //atribui a data do agendamento para a variável $dataAgendamento

            $dataHoraSp = new DateTime('now', new DateTimeZone('America/Sao_Paulo')); // Cria um objeto DateTime com o fuso horário de São Paulo
            $horaAtual = (int)$dataHoraSp->format('H'); //atribui a variavel $horaAtual apenas a hora formatada do DateTime 
            $horaAgendamento = (int)$pedido['horario']; //atribui a hora do agendamento para a variável $horaAgendamento

            $placa = $pedido['placaCarro'];
            $dataFormatada = date_format(date_create($dataAtual), 'd/m/Y');

      ?>


            <form action="../assets/scripts/cadastrarOrcamento.php?placa=<?= $placa ?>" method="post">
              <div class="card">
                <div class="card-info">
                  <p class="text-title"><?= strtoupper($pedido['personalizacao']) ?></p>
                  <p class="text-body">Placa: <?= strtoupper($pedido['placaCarro']) ?></p>
                  <p class="text-body">Data: <?= $dataFormatada ?></p>
                  <p class="text-body">Horário: <?= strtoupper($pedido['horario']) ?></p>
                </div>
                <div class="card-footer">
                  <div class="caixa__input">
                    <?php
                    //se a data e hora atuais forem menor que a data e hora do agendamento, o input estará desabilitado, caso contrário estará habilitado
                    if (
                      $dataAtual <= $dataAgendamento && $horaAtual < $horaAgendamento ||  $dataAtual < $dataAgendamento && $horaAtual <= $horaAgendamento ||
                      $dataAtual < $dataAgendamento
                    ) {
                    ?>
                      <input type="number" required name="preco" id="preco" autocomplete="off" disabled>
                    <?php
                    } else if ($dataAtual >= $dataAgendamento) {
                    ?>
                      <input type="number" required name="preco" id="preco" autocomplete="off">
                    <?php
                    }
                    ?>
                    <label for="preco">Preço</label>
                    <select class="input__data-horario" name="dataOrcamento" id="dataOrcamento">
                      <option value="<?= $pedido['data'] ?>" selected> <?= $dataFormatada ?> </option>
                    </select>
                    <select class="input__data-horario" name="horarioOrcamento" id="horarioOrcamento">
                      <option value="<?= $pedido['horario'] ?>" selected><?= $pedido['horario'] ?></option>
                    </select>
                  </div>
                  <div class="card__linha__botoes">
                    <div class="card-button card-button-first">
                      <button class="botao_orcamento" name="btn-pedido-orcamento" id="btn-pedido-orcamento" value="cancelado" type="submit"><i class="bx bx-x"></i></button>
                    </div>
                    <div class="card-button card-button-second">
                      <button class="botao_orcamento" name="btn-pedido-orcamento" id="btn-pedido-orcamento" value="confirmado" type="submit"><i class="bx bx-check"></i></button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
      <?php
          }
        }
      } else {
        echo 'Nenhum produto encontrado.';
      }
      ?>
    </div>

  </main>

  <?php
  require_once('../assets/components/footer.php');
  ?>


</body>

</html