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
    require_once("conexao.php");
    require_once("iniciarSessao.php");

    $idEscritor = $_SESSION['id'];
    $idProduto = $_GET['id_produto'];
    $textoComentario = $_POST['comentario'];

    $sqlInsertAvaliacao = $pdo->prepare("INSERT INTO `avaliacao`(`id_escritor`, `id_produto`, `texto`) VALUES ('$idEscritor','$idProduto','$textoComentario') LIMIT 1");



    $sqlComentarios = $pdo->query("SELECT * FROM `avaliacao` WHERE id_escritor=$idEscritor && id_produto=$idProduto");
    $comentarios = $sqlComentarios->fetchAll();

    if (empty($comentarios)) {
        if ($sqlInsertAvaliacao->execute()) {
            $tituloModal = "Obrigado pela avaliação!";
            $textoModal = "Continue comprando conosco e ajudando a fortalecer a comunidade Turn Motors.";
            require_once('../components/modal.php');
        }

    } else {
        $tituloModal = "Você não pode avaliar mais de uma vez o mesmo produto!";
        $textoModal = "Adoramos sua avaliação, mas você não pode avaliar mais de uma vez o mesmo produto, continue avaliando e fortalecendo a comunidade da Turn Motors.";
        require_once('../components/modal.php');
    }

    ?>
</body>

</html>