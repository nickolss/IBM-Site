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
    <title>Turn Motors | Compras Realizadas</title>

    <!--LINK ICONES-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="../assets/css/reset.min.css">
    <link rel="stylesheet" href="../assets/css/cadastro-produto.min.css">
    <link rel="stylesheet" href="../assets/css/itens-personalizacoes.min.css">
    <link rel="stylesheet" href="../assets/css/modificarProdutos.css">
    <link rel="stylesheet" href="../assets/css/estilos-importantes.css">

    <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">
    <script type="text/javascript" src="../assets/js/java.js" defer></script>
    <script src="../assets/js/imagem-prod.js" defer></script>
    <script src="../assets/js/preco.js" defer></script>
    <script src="../assets/js/js-bootstrap/bootstrap.bundle.min.js"></script>
</head>

<body id="container__body">
    <?php
    require_once('../assets/components/header-adm.php');
    ?>

    <main class="principal">
        <div class="titulo">
            <h1 class="mainTitle">Histórico de Compras</h1>
        </div>

        <div class="card-container">
            <?php
            $idComprador = $_SESSION['id'];
            $sqlProdutoComprado = $pdo->query("SELECT * FROM `produtosComprados` WHERE id_comprador=$idComprador");
            $produtosComprados = $sqlProdutoComprado->fetchAll();

            $quantidadeTupla = $sqlProdutoComprado->rowCount();

            foreach ($produtosComprados as $produtoComprado) {
                $idProdutoComprado = $produtoComprado['idProdutos'];
                $sqlProduto = $pdo->query("SELECT * FROM `produto` WHERE codigoProduto=$idProdutoComprado");
                $produtosCompradosComInfo = $sqlProduto->fetchAll();
                if ($quantidadeTupla > 0) {
                    foreach ($produtosCompradosComInfo as $produtoFinal) {



            ?>
                        <form method="post">
                            <div class="card">
                                <div class="card-info">
                                    <img id="produto__img" src="<?= $produtoFinal['caminho_imagem'] ?>" alt=" <?= $produtoFinal['nome'] ?> ">
                                    <p class="text-title"> <?= $produtoFinal['nome'] ?> </p>
                                    <p class="text-body"> <?= $produtoFinal['descricao'] ?> </p>
                                </div>
                            </div>
                        </form>
            <?php
                    }
                } else {
                    echo 'Nenhum produto encontrado. Compre conosco.';
                }
            }


            ?>
        </div>
    </main>

    <?php
    require_once('../assets/components/footer.php');
    ?>


</body>

</html