<?php
// require_once('../assets/scripts/consultaCliente.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Turn Motors | Cadastrar Veículo</title>

    <!--LINK ICONES-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="../assets/css/reset.min.css">
    <link rel="stylesheet" href="../assets/css/cadastro-produto.min.css">
    <link rel="stylesheet" href="../assets/css/dropdown.min.css">
    <link rel="stylesheet" href="../assets/css/estilos-importantes.css">

    <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">
    <script type="text/javascript" src="../assets/js/java.js" defer></script>
    <script src="../assets/js/js-bootstrap/bootstrap.bundle.min.js"></script>
</head>

<body id="body">
    <?php
    require_once('../assets/components/header.php');
    ?>

    <main class="principal">
        <div class="titulo">
            <h1 class="mainTitle">Cadastrar Veículo</h1>
        </div>
        <form action="../assets/scripts/cadastrarVeiculo.php" method="POST" class="formulario">
            <div class="cadastro">

                <div class="caixa__input">
                    <input type="text" required name="apelidoProd" id="apelidoProd" autocomplete="off">
                    <label for="apelidoProd">Apelido</label>
                </div>

                <div class="caixa__input">
                    <input type="text" required name="placaProd" id="placaProd" autocomplete="off">
                    <label for="placaProd">Placa</label>
                </div>

                <div class="caixa__input">
                    <input type="text" required name="modeloProd" id="modeloProd" autocomplete="off">
                    <label for="modeloProd">Modelo</label>
                </div>

                <div class="caixa__input">
                    <input type="text" required name="corProd" id="corProd" autocomplete="off">
                    <label for="corProd">Cor</label>
                </div>

            </div>

            <div class="div__formulario__botao"><button type="submit" class="formulario__botao formulario__botao--turbinado" name="plano">Cadastrar</button></div>
        </form>
    </main>

    <script src="../assets/js/drowdown.js"></script>

    <?php
    require_once('../assets/components/footer.php');
    ?>


</body>

</html