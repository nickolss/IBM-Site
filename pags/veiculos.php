<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../assets/css/personalizacoes.min.css">
    <link rel="stylesheet" href="../assets/css/itens-personalizacoes.min.css">
    <link rel="stylesheet" href="../assets/css/estilos-importantes.css">

    <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">
    <script type="text/javascript" src="../assets/js/java.js" defer></script>
    <script src="../assets/js/js-bootstrap/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>Turn Motors | Meus Veículos</title>
</head>

<body>
    <?php
    require_once('../assets/components/header.php');
    ?>
    
    <main>
        <?php 

            require_once('../assets/scripts/consultaVeiculos.php');
            echo verificaCarros($_SESSION['id']);
        ?>
    </main>

    <?php
    require_once('../assets/components/footer.php');
    ?>
</body>