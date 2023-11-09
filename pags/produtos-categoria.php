<?php

require_once('../assets/scripts/conexao.php');

//variaveis de controle de paginção
$pagina = 1;

if (isset($_GET['pagina']))
    $pagina = filter_input(INPUT_GET, "pagina", FILTER_VALIDATE_INT);

if (!$pagina)
    $pagina = 1;

$limite = 5;
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

        $calcPag = $pdo->query("SELECT COUNT(codigoProduto) count FROM produto")->fetch()["count"];
        $paginas = ceil($calcPag / $limite);

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
    <script type="text/javascript" src="../assets/js/paginacao.js" defer></script>
    <script src="../assets/js/js-bootstrap/bootstrap.bundle.min.js"></script>
    <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">
</head>

<body id="container__body">
    <?php
    require_once('../assets/components/header.php');

    ?>



    <?php
    if (!empty($pesquisa)) { ?>

        <div class="container">
            <br>
            <div>
                <h5>Busca por: '<?= $pesq ?>'</h5>
            </div>
        </div>
        <?php
        if (empty($idsProdutos)) { ?>
            <div style="margin-top: 0px" class="container">
                <br>
                <div>
                    <h5 style="font-weight: bold">Nenhum produto encontrado!</h5>
                </div>
            </div>
        <?php    } else {
        }
    } else { ?>

        <div class="container">
            <div class='main__title'>Navegue pelos produtos <?= $msgNav ?></div>
            <br>
            <br class="espaco_invisivel2">
            <br class="espaco_invisivel2">
            <br class="espaco_invisivel2">
            <br class="espaco_invisivel2">
            <br class="espaco_invisivel2">
            <br class="espaco_invisivel2">
        </div>
    <?php   } ?>

    <?php if (!empty($chunksProdutos)) {
        foreach ($chunksProdutos as $chunk) { ?>

            <div style="margin-top: 0px" class="container">
                <div class="row ">

                    <?php foreach ($chunk as $idsProdutos) {

                        $sql = "SELECT * FROM produto WHERE codigoProduto = :idsProdutos";

                        $stmt = $pdo->prepare($sql);
                        $stmt->bindParam(':idsProdutos', $idsProdutos, PDO::PARAM_INT);
                        $stmt->execute();

                        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $nomeProduto = $row['nome'];
                            $precoProduto = $row['preco'];
                            $marcaProduto = $row['marca'];
                            $descricaoProduto = $row['descricao'];
                            $imagemProduto = $row['caminho_imagem'];
                        }

                    ?>

                        <div class="col-lg-3 col-md-4 col-sm-6  col-12" style="padding: 10px; ">

                            <div class="d-flex justify-content-center">

                                <a class="link__produto card card-produto-dinamico" style="width: 18rem;" href="mercadoria.php?nomeProduto=<?= $nomeProduto ?>">
                                    <div >
                                        <div class="text-center">
                                            <img class="card-img-top imagens-prod" src="<?= $imagemProduto ?>" alt="...">
                                        </div>
                                        <div class="card-body " style="display: flex; flex-direction: column; ">
                                            <div class="card-produto-dinamico-titulo">
                                                <h5 class="card-title"><?= $nomeProduto ?></h5>
                                            </div>
                                            <div>
                                                <div class="card-text"><?= $marcaProduto ?></div>
                                                <div class="card-text"><?= $descricaoProduto ?></div>
                                            </div>
                                            <hr class="card-produto-dinamico-linha">
                                            <div class="card-produto-dinamico-preco-button">
                                                <div class="card-produto-dinamico-preco-button-texto">R$:<?= number_format($precoProduto, 2, ',', '.') ?></div>
                                                <form action="../assets/scripts/cadastrarFavorito.php" method="POST">
                                                    <input type="hidden" name="idProduto" id="idProduto" value="<?= $idsProdutos; ?>">
                                                    <input type="hidden" name="url" id="url" value="<?= $currentURI2 ?>">
                                                    <?php
                                                    if (!empty($_SESSION['id'])) {
                                                        require_once("../assets/scripts/iniciarSessao.php");
                                                        $idCliente = $_SESSION['id'];
                                                        $sqlFav = "SELECT * FROM `favoritos` WHERE `id_produto`='$idsProdutos' AND `id_cliente` = '$idCliente'";
                                                        $stmt = $pdo->query($sqlFav);
                                                        $stmt->execute();
                                                        $favoritos = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                                        $quantidadeTupla = $stmt->rowCount();
                                                        if ($quantidadeTupla > 0) {
                                                            echo '<button ><img class="fav__heart__icon" src="../assets/img/icone-favorito-preenchido.svg" alt=""></button>';
                                                        } else {
                                                            echo '<button ><img class="fav__heart__icon" src="../assets/img/icone-favorito.svg" alt=""></button>';
                                                        }
                                                    }
                                                    ?>
                                                </form>
                                                <?php
                                                $currentURI2 = $_SERVER['REQUEST_URI'];
                                              
                                                ?>
                                                <form method="POST" action="<?= $currentURI2 ?>&adicionar=<?= $idsProdutos ?>">
                                                    <input type="hidden" name="idsProdutosPermitidos" value="<?= $idsProdutosPermitidos ?>">
                                                    <button type="submit" name="adicionar" value="<?= $idsProdutos ?>">
                                                        <img class="carrinho__icone" src="../assets/img/icone-carrinho-vermelho.svg" alt="">
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                            </div>

                        </div>

            <?php }
                }
            } ?>

                </div>
            </div>





            <?php if (!empty($pesquisa)) {
                if (!empty($idsProdutos) && $paginas > 1) {
            ?>
                    <div style="margin-top: 10px" class="container text-center">
                        <div class="row">
                            <div class="col">
                                <div style="display: flex; justify-content: center;">
                                    <div class="pagination">
                                        <?php if ($pagina > 1) {
                                            $desabilitar = null;
                                        } else {
                                            $desabilitar = "disable";
                                        } 
                                        
                                        
                                        
                                        ?>
                                        <a class="control next text-respon <?= $desabilitar ?> " href="?pagina=<?= ($pagina - 1) ?>&busca=<?= urlencode($pesquisa); ?>"><- Anterior</a>
                                            <?php 
                                            $pagBP = null;
                                            $pagBS = null;
                                            $pagBT = null;
                                            if($paginas == 3){
                                                $pagBP = 2;
                                                $pagBS = null;
                                                $pagBT = null;
                                                
                                            }elseif($paginas == 4){
                                                $pagBP = 2;
                                                $pagBS = 3;
                                                $pagBT = null;
                                           
                                            }elseif($paginas == 5){
                                                $pagBP = 2;
                                                $pagBS = 3;
                                                $pagBT = 4;
                                           
    
                                            }elseif(($paginas > 5) && (($pagina+2) >= $paginas) ){
                                                $pagBP = $paginas - 3;
                                                $pagBS = $paginas -2;
                                                $pagBT = $paginas - 1;
    
                                            
    
                                            }elseif(($paginas > 5) && (($pagina-2) <= 2) ){
                                                $pagBP = 2;
                                                $pagBS = 3;
                                                $pagBT = 4;
    
                                            
    
                                            }elseif(($paginas > 5)){
                                                $pagBP = $pagina - 1;
                                                $pagBS = $pagina;
                                                $pagBT = $pagina + 1;
                                                
                                            }

                                            if($pagina == 1){
                                                $active1 = "active";
                                            }elseif(($pagina == 2) && ($pagina != $paginas)){
                                                $active2 = "active";
                                            }elseif(($pagina == 3) && ($pagina != $paginas)){
                                                $active3 = "active";
                                            }elseif(($pagina == 4) && ($pagina != $paginas)){
                                                $active4 = "active";
                                            }elseif($pagina == $pagBP){
                                                $active2 = "active";
                                            }elseif($pagina == $pagBS){
                                                $active3 = "active";
                                            }elseif($pagina == $pagBT){
                                                $active4 = "active";
                                            }elseif($pagina == $paginas){
                                                $active5 = "active";
                                            }
                                            
                                            ?>

                                            
                                        <a class="page  <?= $active1 ?>" href="?pagina=1&busca=<?= urlencode($pesquisa); ?>">1</a>
                                                
                                                <?php if($paginas == 3){ ?>
                                                     <a id="responsividade" class="page <?= $active2 ?>" href="?pagina=<?= $pagBP ?>&busca=<?= urlencode($pesquisa); ?>"><?= $pagBP ?></a>
                                                <?php }elseif($paginas == 4){?>
                                                    <a id="responsividade" class="page <?= $active2 ?>" href="?pagina=<?= $pagBP ?>&busca=<?= urlencode($pesquisa); ?>"><?= $pagBP ?></a>
                                                    <a id="responsividade" class="page <?= $active3 ?>" href="?pagina=<?= $pagBS ?>&busca=<?= urlencode($pesquisa); ?>"><?= $pagBS ?></a>
                                                <?php }elseif(($paginas >= 5) ){?>
                                                    <a id="responsividade" class="page <?= $active2 ?>" href="?pagina=<?= $pagBP ?>&busca=<?= urlencode($pesquisa); ?>"><?= $pagBP ?></a>
                                                    <a id="responsividade" class="page <?= $active3 ?>" href="?pagina=<?= $pagBS ?>&busca=<?= urlencode($pesquisa); ?>"><?= $pagBS ?></a>
                                                    <a id="responsividade" class="page <?= $active4 ?>" href="?pagina=<?= $pagBT ?>&busca=<?= urlencode($pesquisa); ?>"><?= $pagBT ?></a>
                                                    <?php } ?>


                                                <a class="page <?= $active5 ?>" href="?pagina=<?= $paginas; ?>&busca=<?= urlencode($pesquisa); ?>"><?= $paginas ?></a>
                                                <?php if ($pagina < $paginas) {
                                                   
                                                    $desabilitar = null;
                                                } else {
                                                    $desabilitar = "disable";
                                                }
                                                ?>

                                                <a class="control  prev text-respon <?= $desabilitar ?> " href="?pagina=<?= ($pagina + 1) ?>&busca=<?= urlencode($pesquisa); ?>">Próximo -></a>

                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>

            <?php }
            } ?>

            <?php
            if (!empty($pesquisa)) {

            ?>

                <div style="margin-top: 0px" class="container">
                    <br>
                    <div>
                        <h5>Outras Opções:</h5>
                    </div>
                </div>
                <?php if (empty($naoEncontrados)) { ?>
                    <div style="margin-top: 0px" class="container">
                        <br>
                        <div>
                            <h5 style="font-weight: bold">Sem Sugestões!</h5>
                        </div>
                    </div>
                <?php } else { ?>

                    <?php if (!empty($chunksProdutos2)) {
                        foreach ($chunksProdutos2 as $chunk2) { ?>

                            <div style="margin-top: 0px" class="container">
                                <div class="row ">

                                    <?php foreach ($chunk2 as $naoEncontrados) {

                                        $sql2 = "SELECT nome, preco, marca, descricao, customizacoes, caminho_imagem FROM produto WHERE codigoProduto = :naoEncontrados";

                                        $stmt2 = $pdo->prepare($sql2);
                                        $stmt2->bindParam(':naoEncontrados', $naoEncontrados, PDO::PARAM_INT);
                                        $stmt2->execute();

                                        if ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                                            $nomeProduto2 = $row2['nome'];
                                            $precoProduto2 = $row2['preco'];
                                            $marcaProduto2 = $row2['marca'];
                                            $descricaoProduto2 = $row2['descricao'];
                                            $customizacaoProduto2 = $row2['customizacoes'];
                                            $imagemProduto2 = $row2['caminho_imagem'];
                                        }

                                    ?>

                                        <div class="col-lg-3 col-md-4 col-sm-6  col-12" style="padding: 10px; ">

                                            <div class="d-flex justify-content-center">

                                                <div class="card card-produto-dinamico" style="width: 18rem;">

                                                    <div class="text-center">

                                                        <img class="card-img-top imagens-prod" src="<?= $imagemProduto2 ?>" alt="...">

                                                    </div>

                                                    <div class="card-body " style="display: flex; flex-direction: column; ">

                                                        <div class="card-produto-dinamico-titulo">

                                                            <h5 class="card-title"><?= $nomeProduto2 ?></h5>

                                                        </div>

                                                        <div>

                                                            <div class="card-text"><?= $marcaProduto2 ?></div>

                                                            <div class="card-text"><?= $descricaoProduto2 ?></div>

                                                            <div class="card-text"><?= $customizacaoProduto2 ?></div>

                                                        </div>

                                                        <hr class="card-produto-dinamico-linha">

                                                        <div class="card-produto-dinamico-preco-button">

                                                            <div class="card-produto-dinamico-preco-button-texto">R$:<?= number_format($precoProduto2, 2, ',', '.') ?></div>

                                                        <?php 
                                                        $currentURI2 = $_SERVER['REQUEST_URI'];
                                                        ?>

                                                            <form action="../assets/scripts/cadastrarFavorito.php" method="POST">
                                                                <input type="hidden" name="idProduto" id="idProduto" value="<?= $naoEncontrados; ?>">
                                                                <input type="hidden" name="url" id="url" value="<?= $currentURI2 ?>">
                                                                <?php
                                                                if (!empty($_SESSION['id'])) {
                                                                    require_once("../assets/scripts/iniciarSessao.php");
                                                                    $idCliente = $_SESSION['id'];
                                                                    $sqlFav = "SELECT * FROM `favoritos` WHERE `id_produto`='$idsProdutos' AND `id_cliente` = '$idCliente'";
                                                                    $stmt = $pdo->query($sqlFav);
                                                                    $stmt->execute();
                                                                    $favoritos = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                                                    $quantidadeTupla = $stmt->rowCount();
                                                                    if ($quantidadeTupla > 0) {
                                                                        echo '<button ><img class="fav__heart__icon" src="../assets/img/icone-favorito-preenchido.svg" alt=""></button>';
                                                                    } else {
                                                                        echo '<button ><img class="fav__heart__icon" src="../assets/img/icone-favorito.svg" alt=""></button>';
                                                                    }
                                                                }
                                                                ?>
                                                            </form>

                                                            <form method="POST" action="<?= $_SERVER['REQUEST_URI'] ?>&adicionar=<?= $naoEncontrados ?>">


                                                                <button type="submit" name="adicionar" value="<?= $naoEncontrados ?>">
                                                                    <img class="carrinho__icone" src="../assets/img/icone-carrinho-vermelho.svg" alt="">
                                                                </button>
                                                            </form>

                                                        </div>



                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                    <?php }
                                }
                            }
                        }
                    } ?>

                                </div>
                            </div>
                            <div style="margin-top: 10px" class="container text-center">
                                <div class="row">
                                    <div class="col">
                                        <div style="display: flex; justify-content: center;">
                                            <?php if (empty($pesquisa) && $paginas > 1 && $categoria === null) { ?>
                                                <div class="pagination">
                                                    <?php if ($pagina > 1) {
                                                        $desabilitar = null;
                                                    } else {
                                                        $desabilitar = "disable";
                                                    } ?>
                                                    <a class="control next text-respon <?= $desabilitar ?> " href="?pagina=<?= $pagina - 1 ?>"><- Anterior</a>
                                                    <?php 
                                                
                                               
                                                $pagBP = null;
                                                $pagBS = null;
                                                $pagBT = null;
                                                if($paginas == 3){
                                                    $pagBP = 2;
                                                    $pagBS = null;
                                                    $pagBT = null;
                                                    
                                                }elseif($paginas == 4){
                                                    $pagBP = 2;
                                                    $pagBS = 3;
                                                    $pagBT = null;
                                               
                                                }elseif($paginas == 5){
                                                    $pagBP = 2;
                                                    $pagBS = 3;
                                                    $pagBT = 4;
                                               
        
                                                }elseif(($paginas > 5) && (($pagina+2) >= $paginas) ){
                                                    $pagBP = $paginas - 3;
                                                    $pagBS = $paginas -2;
                                                    $pagBT = $paginas - 1;
        
                                                
        
                                                }elseif(($paginas > 5) && (($pagina-2) <= 2) ){
                                                    $pagBP = 2;
                                                    $pagBS = 3;
                                                    $pagBT = 4;
        
                                                
        
                                                }elseif(($paginas > 5)){
                                                    $pagBP = $pagina - 1;
                                                    $pagBS = $pagina;
                                                    $pagBT = $pagina + 1;
                                                    
                                                }
    
                                                if($pagina == 1){
                                                    $active1 = "active";
                                                }elseif(($pagina == 2) && ($pagina != $paginas)){
                                                    $active2 = "active";
                                                }elseif(($pagina == 3) && ($pagina != $paginas)){
                                                    $active3 = "active";
                                                }elseif(($pagina == 4) && ($pagina != $paginas)){
                                                    $active4 = "active";
                                                }elseif($pagina == $pagBP){
                                                    $active2 = "active";
                                                }elseif($pagina == $pagBS){
                                                    $active3 = "active";
                                                }elseif($pagina == $pagBT){
                                                    $active4 = "active";
                                                }elseif($pagina == $paginas){
                                                    $active5 = "active";
                                                }
                                                
                                                ?>
                                            
                                                            <a class="page <?= $active1 ?>" href="?pagina=1">1</a>

                                                            <?php if($paginas == 3){ ?>
                                                                    <a id="responsividade" class="page <?= $active2 ?>" href="?pagina=<?= $pagBP ?>"><?= $pagBP ?></a>
                                                                <?php }elseif($paginas == 4){?>
                                                                    <a id="responsividade" class="page <?= $active2 ?>" href="?pagina=<?= $pagBP ?>"><?= $pagBP ?></a>
                                                                    <a id="responsividade" class="page <?= $active3 ?>" href="?pagina=<?= $pagBS ?>"><?= $pagBS ?></a>
                                                                <?php }elseif(($paginas >= 5) ){?>
                                                                    <a id="responsividade" class="page <?= $active2 ?>" href="?pagina=<?= $pagBP ?>"><?= $pagBP ?></a>
                                                                    <a id="responsividade" class="page <?= $active3 ?>" href="?pagina=<?= $pagBS ?>"><?= $pagBS ?></a>
                                                                    <a id="responsividade" class="page <?= $active4 ?>" href="?pagina=<?= $pagBT ?>"><?= $pagBT ?></a>
                                                                    <?php } ?>

                                                            <a class="page <?= $active5 ?>" href="?pagina=<?= $paginas ?>"><?= $paginas ?></a>
                                                            <?php if ($pagina < $paginas) {
                                                                $desabilitar = null;
                                                            } else {
                                                                $desabilitar = "disable";
                                                            }
                                                            ?>

                                                            <a class="control prev text-respon <?= $desabilitar ?> " href="?pagina=<?= $pagina + 1 ?>">Próximo -></a>



                                                        <?php } else {

                                                        $currentURI = $_SERVER['REQUEST_URI'];

                                                        // Use a função parse_url para dividir a URL em partes
                                                        $urlParts = parse_url($currentURI);

                                                        if (isset($urlParts['path'])) {
                                                            $path = $urlParts['path'];
                                                            $query = isset($urlParts['query']) ? '?' . $urlParts['query'] : '';

                                                            // Encontre a posição de ?categoria=
                                                            $position = strpos($query, '?categoria=' . $categoria);

                                                            if ($position !== false) {
                                                                // Mantenha o caminho da URI e a parte da consulta até ?categoria=
                                                                $currentURI = $path . substr($query, 0, $position + strlen('?categoria=' . $categoria));
                                                            }
                                                        }

                                                        // Agora $currentURI conterá a parte do caminho da URI e a parte da consulta até ?categoria=

                                                        ?>


                                                            <div>

                                                                <?php if (empty($pesquisa) && $paginas > 1) { ?>
                                                                    <div class="pagination">
                                                                        <?php if ($pagina > 1) {
                                                                            $desabilitar = null;
                                                                        } else {
                                                                            $desabilitar = "disable";
                                                                        } ?>
                                                                        <a class="control next text-respon <?= $desabilitar ?> " href="<?= $currentURI ?>&pagina=<?= $pagina - 1 ?>"><- Anterior</a>

                                                                        <?php 
                                                                                
                                                                            
                                                
                                               
                                                                                $pagBP = null;
                                                                                $pagBS = null;
                                                                                $pagBT = null;
                                                                                if($paginas == 3){
                                                                                    $pagBP = 2;
                                                                                    $pagBS = null;
                                                                                    $pagBT = null;
                                                                                    
                                                                                }elseif($paginas == 4){
                                                                                    $pagBP = 2;
                                                                                    $pagBS = 3;
                                                                                    $pagBT = null;
                                                                               
                                                                                }elseif($paginas == 5){
                                                                                    $pagBP = 2;
                                                                                    $pagBS = 3;
                                                                                    $pagBT = 4;
                                                                               
                                        
                                                                                }elseif(($paginas > 5) && (($pagina+2) >= $paginas) ){
                                                                                    $pagBP = $paginas - 3;
                                                                                    $pagBS = $paginas -2;
                                                                                    $pagBT = $paginas - 1;
                                        
                                                                                
                                        
                                                                                }elseif(($paginas > 5) && (($pagina-2) <= 2) ){
                                                                                    $pagBP = 2;
                                                                                    $pagBS = 3;
                                                                                    $pagBT = 4;
                                        
                                                                                
                                        
                                                                                }elseif(($paginas > 5)){
                                                                                    $pagBP = $pagina - 1;
                                                                                    $pagBS = $pagina;
                                                                                    $pagBT = $pagina + 1;
                                                                                    
                                                                                }
                                    
                                                                                if($pagina == 1){
                                                                                    $active1 = "active";
                                                                                }elseif(($pagina == 2) && ($pagina != $paginas)){
                                                                                    $active2 = "active";
                                                                                }elseif(($pagina == 3) && ($pagina != $paginas)){
                                                                                    $active3 = "active";
                                                                                }elseif(($pagina == 4) && ($pagina != $paginas)){
                                                                                    $active4 = "active";
                                                                                }elseif($pagina == $pagBP){
                                                                                    $active2 = "active";
                                                                                }elseif($pagina == $pagBS){
                                                                                    $active3 = "active";
                                                                                }elseif($pagina == $pagBT){
                                                                                    $active4 = "active";
                                                                                }elseif($pagina == $paginas){
                                                                                    $active5 = "active";
                                                                                }
                                                                                
                                                                                
                                                                                ?>

                                                                                <a class="page <?= $active1 ?>" href="<?= $currentURI ?>&pagina=1">1</a>
                                                                                <?php if($paginas == 3){ ?>
                                                                                    <a id="responsividade" class="page <?= $active2 ?>" href="<?= $currentURI ?>&pagina=<?= $pagBP ?>"><?= $pagBP ?></a>
                                                                                <?php }elseif($paginas == 4){?>
                                                                                    <a id="responsividade" class="page <?= $active2 ?>" href="<?= $currentURI ?>&pagina=<?= $pagBP ?>"><?= $pagBP ?></a>
                                                                                    <a id="responsividade" class="page <?= $active3 ?>" href="<?= $currentURI ?>&pagina=<?= $pagBS ?>"><?= $pagBS ?></a>
                                                                                <?php }elseif(($paginas >= 5) ){?>
                                                                                    <a id="responsividade" class="page <?= $active2 ?>" href="<?= $currentURI ?>&pagina=<?= $pagBP ?>"><?= $pagBP ?></a>
                                                                                    <a id="responsividade" class="page <?= $active3 ?>" href="<?= $currentURI ?>&pagina=<?= $pagBS ?>"><?= $pagBS ?></a>
                                                                                    <a id="responsividade" class="page <?= $active4 ?>" href="<?= $currentURI ?>&pagina=<?= $pagBT ?>"><?= $pagBT ?></a>
                                                                                    <?php } ?>

                                                                                <a class="page <?= $active5 ?>" href="<?= $currentURI ?>&pagina=<?= $paginas ?>"><?= $paginas ?></a>
                                                                                <?php if ($pagina < $paginas) {
                                                                                    $desabilitar = null;
                                                                                } else {
                                                                                    $desabilitar = "disable";
                                                                                }
                                                                                ?>

                                                                                <a class="control prev text-respon <?= $desabilitar ?> " href="<?= $currentURI ?>&pagina=<?= $pagina + 1 ?>">Próximo -></a>
                                                                              
                                                                               
                                                                    </div>
                                                            <?php } else {
                                                                }
                                                            } ?>
                                                            </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>



                                <hr class="pro-linn">

                                <div style="margin-top: 0px" class="container">

                                    <div class="row">

                                        <div class="col">

                                            <h1 class="pro-promo">Sobre nosso produtos</h1>

                                            <p class="pro-formatar">Nossa oficina preza por produtos de altíssima qualidade, buscando sempre o que está em ascêndencia no mercado, tudo licenciado e atestado, com qualidade assegurado pela Anvisa. Produtos fornecidos e distribuídos pela Giancar Distribuidora Auto Peças.</p>

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

                                                                <div style="font-size: 1.2em; margin-top: 15px; margin-bottom: 30px;">Garantia</div>

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

                                                                <div style="font-size: 1.2em; margin-top: 15px; margin-bottom: 30px;">Atendimento especial</div>

                                                                <div style="margin-bottom: 30px;"> <img width="150px" src="../assets/img/atendimento.png"> </div>

                                                                <div style="font-size: 1.1em;">Você se sentirá em casa</div>

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
