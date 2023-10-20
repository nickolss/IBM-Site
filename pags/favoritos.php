<?php
require_once('../assets/scripts/conexao.php');
require_once('../assets/scripts/iniciarSessao.php');
require_once('../assets/scripts/consultaCliente.php');

$id = (int)$_SESSION['id'];

// Consulta SQL para obter os itens favoritados pelo usuário.
$sqlFavoritos = "SELECT p.codigoProduto, p.nome AS nome_produto, p.preco, p.marca, p.descricao, p.customizacoes, p.caminho_imagem
                FROM favoritos AS f
                INNER JOIN produto AS p ON f.id_produto = p.codigoProduto
                WHERE f.id_cliente = :idCliente";

$stmtFavoritos = $pdo->prepare($sqlFavoritos);
$stmtFavoritos->bindParam(':idCliente', $id, PDO::PARAM_INT);
$stmtFavoritos->execute();
$resultadoFavoritos = $stmtFavoritos->fetchAll(PDO::FETCH_ASSOC);

//variaveis de controle de paginção
$pagina = 1;

if (isset($_GET['pagina']))
    $pagina = filter_input(INPUT_GET, "pagina", FILTER_VALIDATE_INT);

if (!$pagina)
    $pagina = 1;

$limite = 20;
$inicio = ($pagina * $limite) - $limite;

$categoria = null;
$msgNav = null;
$pesquisa = null;
$pesq = "";

if (isset($_GET['busca'])) {

    $pesquisa = ($_GET['busca']);
    $sql = "SELECT codigoProduto FROM produto WHERE nome LIKE :pesquisa OR preco LIKE :pesquisa OR marca LIKE :pesquisa OR descricao LIKE :pesquisa OR customizacoes LIKE :pesquisa LIMIT $inicio, $limite";

    $calcPag = $pdo->query("SELECT COUNT(codigoProduto) count FROM produto WHERE nome LIKE '%$pesquisa%' OR preco LIKE '%$pesquisa%' OR marca LIKE '%$pesquisa%' OR descricao LIKE '%$pesquisa%' OR customizacoes LIKE '%$pesquisa%'")->fetch()["count"];

    $paginas = ceil($calcPag / $limite);

    $pesq = $pesquisa;

    $stmt = $pdo->prepare($sql);


    $pesquisaParam = '%' . $pesquisa . '%';
    $stmt->bindParam(':pesquisa', $pesquisaParam, PDO::PARAM_STR);


    if ($stmt->execute()) {

        $idsProdutos = [];


        while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $idsProdutos[] = $linha['codigoProduto'];
        }
    }




    //controle para exibição dos outros produtos
    $sqlCont = "SELECT codigoProduto FROM produto WHERE nome LIKE :pesquisa OR preco LIKE :pesquisa OR marca LIKE :pesquisa OR descricao LIKE :pesquisa OR customizacoes LIKE :pesquisa";

    $stmtCont = $pdo->prepare($sqlCont);


    $pesquisaParamCont = '%' . $pesquisa . '%';
    $stmtCont->bindParam(':pesquisa', $pesquisaParamCont, PDO::PARAM_STR);


    if ($stmtCont->execute()) {

        $idsProdutosCont = [];


        while ($linhaCont = $stmtCont->fetch(PDO::FETCH_ASSOC)) {
            $idsProdutosCont[] = $linhaCont['codigoProduto'];
        }
    }
    //fim



    if (!empty($idsProdutos)) {
        $sqlTodosNaoEncontrados = "SELECT codigoProduto FROM produto WHERE codigoProduto NOT IN (" . implode(",", $idsProdutosCont) . ") LIMIT 0, 20";


        $stmt2 = $pdo->query($sqlTodosNaoEncontrados);


        $naoEncontrados = [];

        while ($linha2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
            $naoEncontrados[] = $linha2['codigoProduto'];
        }
    } else {
        $sqlTodosNaoEncontrados = "SELECT codigoProduto FROM produto LIMIT 0, 20";

        $stmt2 = $pdo->query($sqlTodosNaoEncontrados);


        $naoEncontrados = [];


        while ($linha2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
            $naoEncontrados[] = $linha2['codigoProduto'];
        }
    }
    $chunksProdutos2 = array_chunk($naoEncontrados, ceil(count($naoEncontrados) / 1));
} else {


    if (isset($_GET['categoria'])) {

        $categoria = $_GET['categoria'];

        $msgNav = "da categoria!";

        if (!empty($categoria)) {

            $sql = "SELECT codigoProduto FROM produto WHERE TG_categoria = :categoria LIMIT $inicio, $limite";

            $calcPag = $pdo->query("SELECT COUNT(codigoProduto) count FROM produto WHERE TG_categoria = '$categoria'")->fetch()["count"];
            $paginas = ceil($calcPag / $limite);


            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':categoria', $categoria, PDO::PARAM_STR);


            if ($stmt->execute()) {

                $idsProdutos = [];


                while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $idsProdutos[] = $linha['codigoProduto'];
                }
            } else {

                echo "Erro na consulta: " . $stmt->errorInfo()[2];
            }
        }
    } else {

        $idsProdutos = [];

        $sql = "SELECT codigoProduto FROM produto LIMIT $inicio, $limite";



        $stmt = $pdo->prepare($sql);



        if ($stmt->execute()) {

            $idsProdutos = [];


            while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $idsProdutos[] = $linha['codigoProduto'];
            }
        } else {

            echo "Erro na consulta: " . $stmt->errorInfo()[2];
        }
    }
}

if (!empty($idsProdutos)) {
    $chunksProdutos = array_chunk($idsProdutos, ceil(count($idsProdutos) / 1));
}


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Produtos</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../assets/css/estilos-importantes.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/produtos-categoria.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/carrinho.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script type="text/javascript" src="../assets/js/java.js" defer></script>
    <script src="../assets/js/js-bootstrap/bootstrap.bundle.min.js"></script>
    <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">
</head>

<body id="container__body">
    <?php
    require_once('../assets/components/header.php');
    ?>
    <br class="espaco_invisivel">
    <br class="espaco_invisivel">
    <br class="espaco_invisivel">

    <?php
    if (!empty($pesquisa)) {

    ?>
        <div class="container">
            <br>
            <div>
                <h5>Busca por: <?= $pesq ?></h5>
            </div>
        </div>

        <?php
        if (empty($idsProdutos)) {

        ?>

            <div class="container">
                <br>
                <div>
                    <h5 style="font-weight: bold">Nenhum produto encontrado!</h5>
                </div>
            </div>
        <?php
        } else {
        }
    } else {

        ?>

        <div class="container">
            <div class='main__title'>Navegue pelos produtos favoritados! <?= $msgNav ?></div>
            <br>
        </div>
    <?php
    } ?>

    <?php if (!empty($chunksProdutos)) { ?>
        <div class="container">
            <div class="row ">

                <?php if (!empty($resultadoFavoritos)) { ?>
                    <?php foreach ($resultadoFavoritos as $produtoFavoritado) {

                        $sql = "SELECT nome, preco, marca, descricao, customizacoes, caminho_imagem FROM produto WHERE codigoProduto = :idsProdutos";

                        $stmt = $pdo->prepare($sql);
                        $idsProdutosImploded = implode(",", $idsProdutos);
                        $stmt->bindParam(':idsProdutos', $idsProdutosImploded, PDO::PARAM_INT);
                        $stmt->execute();

                        $nomeProduto = $produtoFavoritado['nome_produto'];
                        $precoProduto = $produtoFavoritado['preco'];
                        $marcaProduto = $produtoFavoritado['marca'];
                        $descricaoProduto = $produtoFavoritado['descricao'];
                        $customizacaoProduto = $produtoFavoritado['customizacoes'];
                        $imagemProduto = $produtoFavoritado['caminho_imagem'];

                    ?>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-12" style="padding: 10px;">
                            <div class="d-flex justify-content-center">
                                <div class="card card-produto-dinamico" style="width: 18rem;">
                                    <div class="text-center">
                                        <img class="card-img-top imagens-prod" src="<?= $imagemProduto ?>" alt="...">
                                    </div>
                                    <div class="card-body" style="display: flex; flex-direction: column;">
                                        <div class="card-produto-dinamico-titulo">
                                            <h5 style="color: #014961; font-weight: bold" class="card-title"> <?= $nomeProduto ?> </h5>
                                        </div>
                                        <div>
                                            <div class="card-text"> <?= $marcaProduto ?></div>
                                            <div class="card-text"> <?= $descricaoProduto ?></div>
                                            <div class="card-text"> <?= $customizacaoProduto ?></div>
                                        </div>
                                        <hr class="card-produto-dinamico-linha">
                                        <div class="card-produto-dinamico-preco-button">
                                            <div class="card-produto-dinamico-preco-button-texto"><?= "R$ $precoProduto,00" ?></div>
                                            <button><img class="fav__heart__icon" src="../assets/img/icone-favorito-preenchido.svg" alt=""></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php
                    }
                } else {
                    ?>
                    <p>Nenhum item favoritado encontrado.</p>
            <?php
                }
            }
            ?>
            </div>
        </div>
        </div>
        </div>

        <div class="container">
            <br>
            <div>
                <h5>Outras Opções:</h5>
            </div>
        </div>
        <?php if (empty($naoEncontrados)) {

        ?>

            <div class="container">
                <br>
                <div>
                    <h5 style="font-weight: bold">Sem Sugestões!</h5>
                </div>
            </div>

        <?php
        } else { ?>

            <?php if (!empty($chunksProdutos2)) { ?>

                <div class="container">
                    <div class="row ">
                        <?php if (!empty($resultadoFavoritos)) { ?>
                            <div class="col-lg-3 col-md-4 col-sm-6 col-12" style="padding: 10px;">
                                <div class="d-flex justify-content-center">
                                    <div class="card card-produto-dinamico" style="width: 18rem;">
                                        <div class="text-center">
                                            <img class="card-img-top imagens-prod" src=" <?= $imagemProduto2 ?>" alt="...">
                                        </div>
                                        <div class="card-body" style="display: flex; flex-direction: column;">
                                            <div class="card-produto-dinamico-titulo">
                                                <h5 style="color: #014961; font-weight: bold" class="card-title"> <?= $nomeProduto ?> </h5>
                                            </div>
                                            <div>
                                                <div class="card-text"> <?= $marcaProduto ?> </div>
                                                <div class="card-text"> <?= $descricaoProduto ?> </div>
                                                <div class="card-text"> <?= $customizacaoProduto ?> </div>
                                            </div>
                                            <hr class="card-produto-dinamico-linha">
                                            <div class="card-produto-dinamico-preco-button">
                                                <div class="card-produto-dinamico-preco-button-texto"><?= "R$ $precoProduto,00" ?></div>
                                                <button><img class="fav__heart__icon" src="../assets/img/heart-filled.png" alt=""></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                <?php
                        }
                    }
                } ?>

                    </div>
                </div>
                <hr class="pro-linn">

                <div class="container">

                    <div class="row">

                        <div class="col">

                            <h1 class="pro-promo">Sobre nosso produtos</h1>

                            <p class="pro-formatar">Nossa oficina preza por produtos de altíssima qualidade,

                                buscando sempre o que está em ascêndencia no mercado, tudo licenciado e atestado, com qualidade assegurado pela Anvisa. Produtos fornecidos e distribuídos pela Giancar Distribuidora Auto Peças.</p>

                        </div>

                    </div>

                    <br>

                    <br>

                    <div class="row forte">

                        <div class="col">

                            <div class="legal" style="display: flex; justify-content: center;">

                                <div class="pro-aumentar">

                                    <div class="pro-pro-pro-card1">

                                        <div class="pro-pro-pro-card2">

                                            <div style="text-align: center;">

                                                <div style="font-size: 1.2em; color: #014961; margin-top: 15px; margin-bottom: 30px;">Embalagem e Envio</div>

                                                <div style="margin-top: 60px;"> <img width="150px" src="../assets/img/entrega.svg"> </div>

                                                <div style="font-size: 1.1em; color: #014961; margin-top: 50px;">Envio seguro e rápido</div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="col">

                            <div class="legal" style="display: flex; justify-content: center;">

                                <div class="pro-aumentar">

                                    <div class="pro-pro-pro-card1">

                                        <div class="pro-pro-pro-card2">

                                            <div style="text-align: center;">

                                                <div style="font-size: 1.2em; color: #014961; margin-top: 15px; margin-bottom: 30px;">Qualidade das peças</div>

                                                <div style="margin-bottom: 30px;"> <img width="150px" src="../assets/img/qualidade.png"> </div>

                                                <div style="font-size: 1.1em; color: #014961">Peças de primeira linha</div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="col">

                            <div class="legal" style="display: flex; justify-content: center;">

                                <div class="pro-aumentar">

                                    <div class="pro-pro-pro-card1">

                                        <div class="pro-pro-pro-card2">

                                            <div style="text-align: center;">

                                                <div style="font-size: 1.2em; color: #014961; margin-top: 15px; margin-bottom: 30px;">Teste e Certificação</div>

                                                <div style="margin-bottom: 30px;"> <img width="150px" src="../assets/img/produto.svg"> </div>

                                                <div style="font-size: 1.1em; color: #014961">Selo de aprovação</div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="col">

                            <div class="legal" style="display: flex; justify-content: center;">

                                <div class="pro-aumentar">

                                    <div class="pro-pro-pro-card1">

                                        <div class="pro-pro-pro-card2">

                                            <div style="text-align: center;">

                                                <div style="font-size: 1.2em; color: #014961; margin-top: 15px; margin-bottom: 30px;">Garantia</div>

                                                <div style="margin-bottom: 30px;"> <img width="150px" src="../assets/img/garantia.png"> </div>

                                                <div style="font-size: 1.1em; color: #014961">Garantia estendida</div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="col">

                            <div style="display: flex; justify-content: center;">

                                <div class="pro-aumentar">

                                    <div class="pro-pro-pro-card1">

                                        <div class="pro-pro-pro-card2">

                                            <div style="text-align: center;">

                                                <div style="font-size: 1.2em; color: #014961; margin-top: 15px; margin-bottom: 30px;">Atendimento especial</div>

                                                <div style="margin-bottom: 30px;"> <img width="150px" src="../assets/img/atendimento.png"> </div>

                                                <div style="font-size: 1.1em; color: #014961">Você se sentirá em casa</div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>



                </div>



                </nav>

                <br>
                <br>
                <?php
                require_once('../assets/components/footer.php');
                ?>
</body>

</html>