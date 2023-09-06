<?php
  require_once('../assets/scripts/conexao.php'); 
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
              if($pedido['status'] == 'em avaliação'){

                $dataAtual = date("Y-m-d"); //atribui a data atual do sistema para a variável $dataAtual
                $dataAgendamento = $pedido['data']; //atribui a data do agendamento para a variável $dataAgendamento
                
                $dataHoraSp = new DateTime('now', new DateTimeZone('America/Sao_Paulo')); // Cria um objeto DateTime com o fuso horário de São Paulo
                $horaAtual = (int)$dataHoraSp->format('H'); //atribui a variavel $horaAtual apenas a hora formatada do DateTime 
                $horaAgendamento = (int)$pedido['horario']; //atribui a hora do agendamento para a variável $horaAgendamento

                $placa = $pedido['placaCarro'];

                //EXIBE O CARD DOS PEDIDOS DE ORÇAMENTOS NA TELA
                echo '<form action="../assets/scripts/cadastrarOrcamento.php?placa='.$placa.'" method="post">';
                echo '<div class="card">';
                echo        '<div class="card-info">';
                echo            '<p class="text-title">' . strtoupper($pedido['personalizacao']) . '</p>';
                echo            '<p class="text-body">Placa: ' . strtoupper($pedido['placaCarro']) . '</p>';
                echo            '<p class="text-body">Data: ' . strtoupper($pedido['data']) . '</p>';
                echo            '<p class="text-body">Horário: ' . strtoupper($pedido['horario']) . 'h</p>';
                echo        '</div>';
                echo        '<div class="card-footer">';
                echo            '<div class="caixa__input">';
                
                //se a data e hora atuais forem menor que a data e hora do agendamento, o input estará desabilitado, caso contrário estará habilitado
                if ($dataAtual <= $dataAgendamento && $horaAtual < $horaAgendamento ||  $dataAtual < $dataAgendamento && $horaAtual <= $horaAgendamento || 
                $dataAtual < $dataAgendamento && $horaAtual >= $horaAgendamento) {
                    echo        '<input type="number" required name="preco" id="preco" autocomplete="off" disabled>';
                }else if($dataAtual >= $dataAgendamento){
                    echo       '<input type="number" required name="preco" id="preco" autocomplete="off" >';
                }
                echo                '<label for="preco">Preço</label>';
                echo '<select class="input__data-horario" name="dataOrcamento" id="dataOrcamento">';
                echo    '<option value="'.$pedido['data'].'" selected>'.$pedido['data'].'</option>';
                echo '</select>';
                echo '<select class="input__data-horario" name="horarioOrcamento" id="horarioOrcamento">';
                echo    '<option value="'.$pedido['horario'].'" selected>'.$pedido['horario'].'</option>';
                echo '</select>';
                echo            '</div>';
                echo        '<div class="card__linha__botoes">';
                echo        '<div class="card-button card-button-first">';
                echo            '<button class="botao_orcamento" name="btn-pedido-orcamento" id="btn-pedido-orcamento" value="cancelado" type="submit"><i class="bx bx-x"></i></button>';
                echo        '</div>';
                echo        '<div class="card-button card-button-second">';
                echo            '<button class="botao_orcamento" name="btn-pedido-orcamento" id="btn-pedido-orcamento" value="confirmado"  type="submit"><i class="bx bx-check" ></i></button>';
                echo        '</div>';
                echo    '</div>';
                echo    '</div>';
                echo '</div>';
                echo '</form>';
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