<?php
require_once('../assets/scripts/conexao.php');
require_once('../assets/scripts/iniciarSessao.php');
require_once('../assets/scripts/consultaFuncionario.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Turn Motors | Dashboard</title>

  <!--LINK ICONES-->
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  <link rel="stylesheet" href="../assets/css/reset.min.css">
  <link rel="stylesheet" href="../assets/css/cadastro-produto.min.css">
  <link rel="stylesheet" href="../assets/css/dashboard.css">
  <link rel="stylesheet" href="../assets/css/estilos-importantes.css">

  <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">
  <script type="text/javascript" src="../assets/js/java.js" defer></script>
  <script src="../assets/js/js-bootstrap/bootstrap.bundle.min.js"></script>

  <!-- Gráficos -->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {
      'packages': ['corechart']
    });

    google.charts.setOnLoadCallback(graficoEstoque);
    google.charts.setOnLoadCallback(graficoClientes);
    google.charts.setOnLoadCallback(graficoVendas);

    function graficoEstoque() {

      var data = google.visualization.arrayToDataTable([
        ['Produtos', 'Estoque'],
        ['Work', 11],
        ['Eat', 2],
        ['Commute', 2],
        ['Watch TV', 2],
        ['Sleep', 7]
      ]);

      let options = {
        backgroundColor: 'transparent',

        legend: 'none',

        pieSliceText: 'value',

        titleTextStyle: {
          color: 'black'
        },

        pieSliceTextStyle: {
          color: 'white',
          fontSize: 16
        },

        chartArea: {
          width: '100%',
          height: '100%',
          left: 10,
          top: 20
        }
      };

      var chart = new google.visualization.PieChart(document.getElementById('graficoEstoque'));

      chart.draw(data, options);
    }

    function graficoClientes() {
      <?php
      $sqlClienteComum = $pdo->query("SELECT * FROM ");
      ?>
      var data = google.visualization.arrayToDataTable([
        ['Clientes', 'Turninados e Comuns'],
        ['Comum', 11],
        ['Turbinado', 2]
      ]);

      let options = {
        backgroundColor: 'transparent',

        pieSliceText: 'value',

        legend: 'none',

        titleTextStyle: {
          color: 'black'
        },

        pieSliceTextStyle: {
          color: 'white',
          fontSize: 16
        },

        chartArea: {
          width: '100%',
          height: '100%',
          left: 10,
          top: 20
        }
      };

      var chart = new google.visualization.PieChart(document.getElementById('graficoClientes'));

      chart.draw(data, options);
    }

    function graficoVendas() {
      var data = google.visualization.arrayToDataTable([
        ['Produtos', 'Mais Vendidos'],
        ['Comum', 11],
        ['Turbinado', 2]
      ]);

      let options = {
        backgroundColor: 'transparent',

        titleTextStyle: {
          "text-align": "center"
        },

        pieSliceText: 'value',

        legend: 'none',

        titleTextStyle: {
          color: 'black'
        },

        pieSliceTextStyle: {
          color: 'white',
          fontSize: 16
        },

        chartArea: {
          width: '100%',
          height: '100%',
          left: 10,
          top: 20
        }
      };

      var chart = new google.visualization.PieChart(document.getElementById('graficoVendas'));

      chart.draw(data, options);
    }
  </script>

</head>

<body id="container__body">
  <?php
  require_once('../assets/components/header.php');
  ?>

  <div class="container text-center principal">


    <div class="row">
      <div class="col">
        <div class="titulo">
          <h1 class="mainTitle">Olá, <?= $_SESSION['nomeFuncionario'] ?>!</h1>
        </div>
      </div>
    </div>

    <div class="div__grande__graficos row">
      <div class="div__grafico col">
        <div id="graficoEstoque"></div>
      </div>
      <div class="div__grafico col">
        <div id="graficoClientes"></div>
      </div>
      <div class="div__grafico col">
        <div id="graficoVendas"></div>
      </div>

    </div>

    <div class="row">
      <div class="col">
        <div class="div__botoes">
          <form action="cadastrar-produto.php">
            <button class="botao__laranja" type="submit">Adicionar Produto</button>
          </form>
          <form action="catalogo.php">
            <button class="botao__laranja" type="submit">Modificar Produto</button>
          </form>
        </div>
        <div class="div__botoes">
          <form action="cadastrar-user-adm.php">
            <button class="botao__laranja" type="submit">Adicionar Administrador</button>
          </form>
          <form action="cadastrar-mecanico.php">
            <button class="botao__laranja" type="submit">Adicionar Mecânico</button>
          </form>
          <form action="../assets/scripts/logout.php">
            <button class="botao__laranja" type="submit">Sair da Conta</button>
          </form>
        </div>
      </div>
    </div>


  </div>

  <script src="../assets/js/drowdown.js"></script>

  <?php
  require_once('../assets/components/footer.php');
  ?>


</body>

</html