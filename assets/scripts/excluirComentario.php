<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/modal.min.css">
        <title>Turn Motors</title>
    </head>
    <body>
        <?php
            require_once("./conexao.php");

            $idProd = $_GET['mercadoria'];
            $idComprador = $_GET["comprador"];
            $sqlDelete = $pdo->prepare("DELETE FROM `avaliacao` WHERE id_produto=$idProd && id_escritor=$idComprador");

            if ($sqlDelete->execute()) {
                $tituloModal = "Avaliação Excluída";
                $textoModal = "Continue avaliando e ajudando a fortalecer a comunidade Turn Motors.";
                require_once('../components/modal.php');
            }
        ?>
    </body>
</html>