<?php
require_once('../assets/scripts/conexao.php');
require_once('../assets/scripts/iniciarSessao.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho</title>
    <link rel="stylesheet" href="../assets/css/carrinho.min.css">
    <link rel="stylesheet" href="../assets/css/estilos-importantes.css">
    <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">
    <script type="text/javascript" src="../assets/js/java.js" defer></script>
    <script src="../assets/js/js-bootstrap/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body id="container__body">
    <?php
    require_once('../assets/components/header.php');


    if (isset($_POST['carrinho'])) {
        $carrinhoData = $_POST['carrinho'];
        $carrinho = [];
        parse_str($carrinhoData, $carrinho);
    }
    
   
    
    $totalCarrinho = 0; // Variável para calcular o preço total
    $totalItens = 0; // Variável para calcular a quantidade total de itens
    
    if (isset($_SESSION['carrinho'])) {
    }
        foreach ($_SESSION['carrinho'] as $idProd => $value) {
            $subtotal = $value['preco'] * $value['quantidade'];
            $totalCarrinho += $subtotal;
    }
    
    
    $idsProdutos = [];
    
    $sql = "SELECT codigoProduto FROM produto";
    
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute()) {
    
        $idsProdutos = [];
    
    
        while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $idsProdutos[] = $linha['codigoProduto'];
        }
    } else {
    
        echo "Erro na consulta: " . $stmt->errorInfo()[2];
    }
    ?>
    <br>

    <main class="p-2">
        <div class="container" id="area__carrinho_pag_produtos">
            <div class="row">
                <div class="col">
                    <h1 id="main__title">Carrinho de Compras</h1>
                    <form method="POST" action="?limpar_carrinho=1">
                        <button class="btn__limpar-carrinho" type="submit" name="limpar_carrinho_btn">Limpar Carrinho</button>
                    </form>
                </div>
            </div>
            <hr>
            <?php foreach ($_SESSION['carrinho'] as $idProd => $value) { ?>
                <div class="row">
                    <div class="col">
                        <div class="carrinho__organizar__produtos">
                            <div class="carrinho__img__produtos">
                                <img src="<?php echo $value['caminho_imagem']; ?>" alt="">
                            </div>
                            <div class="carrinho__info__produtos">
                                <h2 id="titulo-produto__carinho"><?php echo $value['nome']; ?></h2>
                                <h5>R$: <?php echo number_format($value['preco'], 2, ',', '.'); ?></h5>
                                <div class="d-flex">
                                    <div class="grupo__botoes__carrinho_pag_ubfo_produtos" style="margin-right: 10px">
                                        <form method="POST" action="?subtrair=<?php echo $idProd; ?>">
                                            <button class="botao__subtrair__carrinho__pag__info__produtos" type="submit" name="subtrair" value="<?php echo $idProd; ?>">-</button>
                                        </form>
                                        <span><?php echo $value['quantidade']; ?></span>
                                        <form method="POST" action="?adicionar=<?php echo $idProd; ?>">
                                            <button class="botao__somar__carrinho__pag__info__produtos" type="submit" name="adicionar" value="<?php echo $idProd; ?>">+</button>
                                        </form>
                                    </div>
                                    <div>
                                        <form method="POST" action="?remover=<?php echo $idProd; ?>">
                                            <button class="btn__excluir-carrinho" type="submit" name="remover" value="<?php echo $idProd; ?>">Excluir</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <hr>
            <?php $totalItens += $value['quantidade'];
            } ?>
            <div class="row">
                <div class="col">
                    <h6 class="texto__total-preco text-end">SubTotal (<?php echo $totalItens; ?> itens): <strong>R$: <?php echo number_format($totalCarrinho, 2, ',', '.'); ?></strong></h6>
                </div>
            </div>

            <?php
            if (!empty($_SESSION['carrinho'])) {

            ?>
                <div class="row">
                    <div class="col text-end">
                        <form action="finalizarCompra.php" method="POST">
                            <button id="btn__finalizar" type="submit">Finalizar Compra</button>
                        </form>
                    </div>
                </div>

            <?php
            }
            ?>
        </div>
        <br>
    </main>

    <?php
    require_once('../assets/components/footer.php');
    ?>
</body>

</html>