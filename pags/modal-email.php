<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../assets/css/modal-email.min.css">
        <link rel="stylesheet" href="../assets/css/estilos-importantes.css">
        <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script type="text/javascript" src="../assets/js/java.js" defer></script>
        <script src="../assets/js/js-bootstrap/bootstrap.bundle.min.js"></script>
        <title>Turn Motors | Email não encontrado</title>
    </head>

    <?php
        require_once('../assets/components/header.php');
    ?>

    <body id="container__body">
        <main>
            <div class="email__container">
                <div class="box">
                    <h1 id="box__titulo">Email não cadastrado</h1>
                    <p id="box__texto">Por favor tente novamente</p>
                    <a id="box__botao" href="recuperar-senha.php">Voltar</a>
                </div>
            </div>
        </main>
    </body>

    <?php
        require_once('../assets/components/footer.php');
    ?>
</html>
