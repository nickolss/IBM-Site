<?php
    require_once('../assets/scripts/conexao.php');
    require_once('../assets/scripts/iniciarSessao.php');
    require_once('../assets/scripts/consultaCliente.php');

    $id = (int)$_SESSION['id']; //atribuindo o 'id' da sessão atual para a variável $id
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

  <main>    
    <div class="titulo">
      <h1 class="mainTitle">Orçamentos</h1>
    </div>

    <div class="card-container">

      <?php

          $sql = "SELECT * FROM pedido_orcamento WHERE id_cliente = $id";
          $stmt = $pdo->prepare($sql);
          $stmt->execute();
          $quantidadeTupla = $stmt->rowCount();
          $pedidos = $stmt->fetchAll(PDO::FETCH_ASSOC);

          if ($quantidadeTupla > 0) {
              foreach ($pedidos as $pedido) {
                if($pedido['status'] == "mecânico confirmado"){
                  echo '<form action="../assets/scripts/cadastrarOrcamentoCliente.php" method="POST">';
                  echo '<div class="card" style="height: 270px;">';
                  echo        '<div class="card-info">';
                  echo            '<p class="text-title">' . strtoupper($pedido['personalizacao']) . '</p>';
                  echo            '<p class="text-body" style="margin-top: 30px;">R$' . strtoupper($pedido['preco']) . '</p>';
                  echo        '</div>';
                  echo '<select class="input__data-horario" name="personalizacao" id="personalizacao">';
                  echo    '<option value="'.$pedido['personalizacao'].'" selected>'.$pedido['personalizacao'].'</option>';
                  echo '</select>';
                  echo '<select class="input__data-horario" name="placaCarro" id="placaCarro">';
                  echo    '<option value="'.$pedido['placaCarro'].'" selected>'.$pedido['placaCarro'].'</option>';
                  echo '</select>';
                  echo        '<div class="card-footer" style="margin-top: 15px;">';
                  echo            '<div class="card__linha__botoes">';
                  echo                '<div class="card-button card-button-first">';
                  echo                    '<button class="botao_orcamento" name="btn-pedido-orcamento" id="btn-pedido-orcamento" value="cancelado" type="submit"><i class="bx bx-x"></i></button>';
                  echo                '</div>';
                  echo                '<div class="card-button card-button-second">';
                  echo                    '<button class="botao_orcamento" name="btn-pedido-orcamento" id="btn-pedido-orcamento" value="confirmado"  type="submit"><i class="bx bx-check" ></i></button>';
                  echo                '</div>';
                  echo            '</div>';
                  echo        '</div>';
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
