<?php 
	// Importaçao dos arquivos
	require_once('../assets/scripts/conexao.php');
	require_once('../assets/scripts/iniciarSessao.php');
	require_once('../assets/scripts/consultaCliente.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Turn Motors | Meu perfil</title>

        <!-- icones -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Arquivos do Bootstrap -->
        <link rel="stylesheet" href="../assets/css/css-bootstrap/bootstrap.min.css">
        <script src="../assets/js/js-bootstrap/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <link rel="stylesheet" href="../assets/css/estilos-importantes.css" />
        <link rel="stylesheet" href="../assets/css/formCurriculo.min.css">
        <link rel="stylesheet" href="../assets/css/cadastro-produto.min.css">
        
        <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon" />

        <script src="../assets/js/imagem-prod.js" defer></script>
    </head>

    <body id="container__body">

        <?php
            require_once('../assets/components/header.php');
        ?>

        <main>

            <div class="titles">
                <h1 class="main__title">Enviar Currículo</h1>
                <h2 class="sub__title">Carregue seu currículo e venha fazer parte do time Turn Motors</h2>
            </div>

            <div class="formulario">
                <form action="../assets/scripts/cadastrarCurriculo.php" method="post" enctype="multipart/form-data">
                    <label class="picture">
                        <input type="file" class="picture__input" name="imgProd" id="imgProd" required>
                    <span class="picture__image"></span>
                    </label>
                    <div class="div__botoes">
                        <button class="btn__laranja" type="submit" name="btn__enviar">Enviar</button>
                    </div>
                </form>
            </div>

        </main>

        <?php
            require_once('../assets/components/footer.php');
        ?>
    </body>
</html>