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
            <h1 class="mainTitle">Modificar Produtos</h1>
        </div>

        <div class="card-container">
            <?php

            $sql = "SELECT * FROM produto";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $quantidadeTupla = $stmt->rowCount();
            $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($quantidadeTupla > 0) {
                foreach ($produtos as $produto) {
            
            ?>
                    
                    <form method="post">
                        <div class="card">
                                <div class="card-info">
                                    <img id="produto__img" src="<?= $produto['caminho_imagem'] ?>" alt=" <?= $produto['nome'] ?> ">
                                    <p class="text-title"> <?= $produto['nome'] ?> </p>
                                    <p class="text-body"> <?= $produto['descricao'] ?> </p>
                                </div>
                                <div class="card-footer">
                                    <label for="preco">R$ <?= $produto["preco"] ?> </label>
                                    <div class="footer__botoes">
                                        <button class="botao__funcao" value= <?= $produto['codigoProduto'] ?> formaction="../assets/scripts/excluirProduto.php" name="btn-pedido-orcamento" id="btn-pedido-orcamento" type="submit"><i class="icones__modificar-produto bx bx-trash"></i></button>
                                        <button class="botao__funcao" value= <?= $produto['codigoProduto'] ?> formaction="./modificar-produto.php" name="btn-pedido-orcamento" id="btn-pedido-orcamento"  type="submit" ><i class="icones__modificar-produto bx bx-edit-alt"></i></button>
                                    </div>
                                </div>
                        </div>
                    </form>
                    <?php
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