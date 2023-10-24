<?php
require_once('../assets/scripts/conexao.php');
require_once('../assets/scripts/iniciarSessao.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--LINK ICONES-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

    <header>

        <div class="pai__header">
            <div class="filho__header">
                <div class="logotipo">
                    <a class="logo" href="../index.php">
                        <figure class="figure-container">
                            <img class="img__logo" src="../assets/img/logo-turnmotors.png" alt="Logo Turn Motors" />
                            <figcaption class="legenda__icones__atividade" id="title__header">TURN MOTORS</figcaption>
                        </figure>
                    </a>
                </div>
                <div>
                    <ul class="paginas">
                        <li class="opcoes__paginas"><a class="hyperlink__paginas" href="../pags/personalizacoes.php">Personalizações</a></li>
                        <li class="opcoes__paginas"><a class="hyperlink__paginas" href="../pags/produtos.php">Produtos</a></li>
                        <li class="opcoes__paginas"><a class="hyperlink__paginas" href="../pags/aboutus.php">Sobre Nós</a></li>
                    </ul>
                </div>
                <div class="icones__direita">
                    <ul class="icones">
                        <li> <img class="lupa icone__header" src="../assets/img/icone-search.svg" alt="Pesquisar"> </li>
                        <li class="pai-carrinho">
                            <nav id="carrinho__header">
                                <img class="seta__header__carrinho" src="../assets/img/seta-modal.png" alt="">
                                <?php if (!empty($_SESSION['carrinho'])) { ?>
                                    <div id="itens__header__modal_carrinho">
                                        <div class="table__itens_header_carrinho">
                                            <table style="border-collapse: separate;border-spacing: 0 10px ; ">
                                                <tbody>
                                                    <?php
                                                    $totalCarrinho = 0; // Variável para calcular o total do carrinho
                                                    foreach ($_SESSION['carrinho'] as $idProd => $value) {
                                                        $subtotal = $value['preco'] * $value['quantidade'];
                                                        $totalCarrinho += $subtotal;
                                                    ?>

                                                        <tr>
                                                            <td class="img__table__header_carrinho" style="width: 40%;"> <img src="<?= $value['caminho_imagem'] ?>" alt="..."> </td>

                                                            <td class="info__table__header_carrinho">
                                                                <div>
                                                                    <h2> <?= $value['nome'] ?></h2>
                                                                </div>
                                                                <div>
                                                                    <h3>R$: <?= $value['preco'] ?></h3>
                                                                </div>
                                                                <div class="table_itens__header__carrinho__config">
                                                                    <div class="table__itens_header_carrinho_botoes">
                                                                        <form method="POST" action="?subtrair=<?= $idProd ?>">
                                                                            <button id="botaoSubtrair_carrinho_header" type="submit" name="subtrair" value="<?= $idProd ?>">-</button>
                                                                        </form>

                                                                        <span id="contador_carrinho_header"> <?= $value['quantidade'] ?></span>
                                                                        <form method="POST" action="?adicionar=<?= $idProd ?>">
                                                                            <button id="botaoAcrescentar_carrinho_header" type="submit" name="adicionar" value="<?= $idProd ?>">+</button>
                                                                        </form>
                                                                    </div>

                                                                    <form method="POST" action="?remover=<?= $idProd ?>">
                                                                        <button style="border: none; color: #003445; background-color: #fff; text-decoration: none" type="submit" name="remover" value="<?= $idProd ?>">Excluir</button>
                                                                    </form>


                                                                    <span href="produtos.php"></span>

                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>


                                        </div>
                                        <br>
                                        <br>
                                        <div class="carrinho__header__finalizacao">
                                            <p class="fs-2">Total: <?= $totalCarrinho ?>R$</p>
                                            <div class="text-center">
                                                <button id="btn__ver-carrinho"><a href="../pags/carrinho.php"> Ver Carrinho</a> </button>
                                            </div>


                                        </div>
                                    </div>
                                <?php } else { ?>

                                    <div id="carrinho__header_vazio">
                                        <img width="100px" src="../assets/img/iconeSacolaCompras.png" alt="">
                                        <p>Não há produtos ainda</p>
                                    </div>
                                <?php } ?>

                            </nav>
                            <img class="icone__header" id="carrinho" src="../assets/img/icone-carrinho.svg" alt="Carrinho">
                        </li>
                        <li> <a class="cabeca" href="../pags/login.php"> <img class="icone__header" src="../assets/img/icone-perfil.svg" alt="Login"> </a> </li>
                    </ul>
                </div>
            </div>
        </div>

        <?php

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['adicionar'])) {
                $idProd = (int)$_POST['adicionar'];

                $idProd--;

                // Verifique se o ID do produto existe no array de IDs de produtos
                if (isset($idsProdutos[$idProd])) {
                    $idProd++;
                    $codigoProdutoAdd = $idProd;


                    // Consulta ao banco de dados para obter as informações do produto
                    $sqlProduto = "SELECT nome, preco, caminho_imagem FROM produto WHERE codigoProduto = :codigoProdutoAdd";
                    $stmtProduto = $pdo->prepare($sqlProduto);
                    $stmtProduto->bindParam(':codigoProdutoAdd', $codigoProdutoAdd, PDO::PARAM_INT);

                    if ($stmtProduto->execute()) {
                        $rowProduto = $stmtProduto->fetch(PDO::FETCH_ASSOC);

                        if ($rowProduto) {
                            $nomeProduto = $rowProduto['nome'];
                            $precoProduto = $rowProduto['preco'];
                            $imagemProdutoCart = $rowProduto['caminho_imagem'];

                            // Verifique se o produto já está no carrinho
                            if (isset($_SESSION['carrinho'][$idProd])) {
                                $_SESSION['carrinho'][$idProd]['quantidade']++;
                            } else {
                                $_SESSION['carrinho'][$idProd] = array(
                                    'quantidade' => 1,
                                    'nome' => $nomeProduto,
                                    'preco' => $precoProduto,
                                    'caminho_imagem' => $imagemProdutoCart
                                );
                            }
                        } else {
                            die('Produto não encontrado no banco de dados.');
                        }
                    } else {
                        die('Erro ao executar a consulta.');
                    }
                } else {
                    echo 'ID do produto inválido.';

                    $totalCarrinho -= $subtotal;
                }
            } elseif (isset($_POST['subtrair'])) {
                $idProdutoRemover = (int)$_POST['subtrair'];

                // Verifique se o produto está no carrinho antes de removê-lo
                if (isset($_SESSION['carrinho'][$idProdutoRemover])) {
                    // Verifique se a quantidade é maior do que 1 antes de subtrair
                    if ($_SESSION['carrinho'][$idProdutoRemover]['quantidade'] > 1) {
                        $_SESSION['carrinho'][$idProdutoRemover]['quantidade']--;
                    } else {
                        // Se a quantidade for 1, remova o produto do carrinho
                        unset($_SESSION['carrinho'][$idProdutoRemover]);
                    }
                }
            } elseif (isset($_POST['remover'])) {
                $idProdutoRemover = (int)$_POST['remover'];

                // Verifique se o produto está no carrinho antes de removê-lo

                if (isset($_SESSION['carrinho'][$idProdutoRemover])) {

                    // Remova o produto do carrinho

                    unset($_SESSION['carrinho'][$idProdutoRemover]);
                } else {

                    echo '<script>alert("O item não está no carrinho");</script>';
                }
            }
        }




        ?>

        <div id="fade"></div>
    </header>

    <nav id="header_search_aparecer2">
        <nav class="header_search_aparecer ">


            <div class="container  text-center">
                <div class="row align-items-center" style="height: 150px;">
                    <div class="col " style="padding: 0px 20px;">

                        <div class="header_search">
                            <form style="width: 100%; " action="../pags/produtos-categoria.php" method="GET" class="d-flex" role="search">
                                <button type="submit"><img width="30px" height="auto" src="../assets/img/icone-search-vermelho.png" alt="Pesquisar"></button>

                                <input name="busca" class="form-control input_header_search" type="text" placeholder="Pesquisar...">
                            </form>
                            <div style="display: flex; justify-content: center; align-items: center; "> <button type="button" class="btn-close__fechar__navbar lupa" aria-label="Close"><i class='bx bx-x' style='color:#db162f'></i></button></div>

                        </div>
                    </div>
                </div>

            </div>

        </nav>
    </nav>

    <nav style="box-shadow: 0px 5px 5px 0px #888;" class="navbar  fixed-top" id="menu">
        <div class="d-flex justify-content-between " style="height: 100%;">
            <div style=" width: 33%;" class="d-flex ">
                <button style="border: none; margin-left: 10px;" class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" data-bs-theme="light" aria-controls="offcanvasNavbar" aria-label="Menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div style=" width: 33%;" class="d-flex justify-content-center">
                <a class="logotipo__header__mobile" href="../index.php">
                    <figure class="figure-container">
                        <img width="50px" src="../assets/img/logo-turnmotors.png" alt="Logo Turn Motors" />
                        <figcaption class="legenda__icones__atividade" id="title__header">TURN MOTORS</figcaption>
                    </figure>
                </a>
            </div>

            <div style=" width: 33%;" class="d-flex justify-content-end align-items-center">
                <div style="margin-right: 30px;">
                    <img class="lupa img-fluid" width="30px" height="auto" src="../assets/img/icone-search.svg" alt="Ícone de busca">
                </div>
                <div style="margin-right: 10px;">
                    <img class="img-fluid" width="30px" height="auto" src="../assets/img/icone-carrinho.svg" alt="Carrinho">
                </div>


            </div>




            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div id="header__menu__hamburguer" class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel"><img style="margin-right: 10px;" width="50px" height="auto" src="../assets/img/logo-turnmotors.png" alt="logo">TURN MOTORS</h5>
                    <button type="button" class="btn-close__fechar__navbar" data-bs-dismiss="offcanvas" aria-label="Close"><i class='bx bx-x' style='color:#ffc857'></i></button>
                </div>

                <div class="offcanvas-body" id="corpo__navbar__mobile">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                        </li>
                        <hr class="divisao__linha__branca">
                        <li class="nav-item">
                            <a class="nav-link" href="../pags/login.php">Login</a>
                        </li>
                        <hr class="divisao__linha__branca">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Opções
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../pags/personalizacoes.php"><span class="opcao__navbar__mobile">Personalizações</span></a></li>
                                <li><a class="dropdown-item" href="../pags/produtos.php"><span class="opcao__navbar__mobile">Produtos</span></a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="../pags/aboutus.php"><span class="opcao__navbar__mobile">Sobre Nós</span></a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="../pags/perfil.php"><span class="opcao__navbar__mobile">Perfil</span></a></li>
                                <li><a class="dropdown-item" href="../pags/favoritos.php"><span class="opcao__navbar__mobile">Favoritos</span></a></li>

                            </ul>
                        </li>
                        <br>
                        <br>
                        <div class="row alinhar">
                            <div class="col">
                                <a class="link" target="_blank" href="https://twitter.com/MotorsTurn" aria-label="Acesse nosso Twitter"><img width="35px" height="auto" src="../assets/img/icone-twitter.svg" aria-label="Acesse nosso Twitter" alt="twitter"></a>
                            </div>
                            <div class="col">
                                <a class="link" target="_blank" href="https://www.instagram.com/turn_motors/" aria-label="Acesso nosso Instagram"><img width="35px" height="auto" src="../assets/img/icone-instagram.svg" alt="instagram"></a>
                            </div>
                        </div>
                    </ul>

                </div>
            </div>
        </div>
        <nav class="header_search_aparecer ">


            <div class="container  text-center">
                <div class="row align-items-center" style="height: 150px;">
                    <div class="col " style="padding: 0px 20px;">
                        <div class="header_search">
                            <form style="width: 100%; " action="produtos-categoria.php" method="GET" class="d-flex" role="search">
                                <button type="submit"><img width="30px" height="auto" src="../assets/img/icone-search-vermelho.png" alt="Pesquisar"></button>
                                <input name="busca" class="form-control input_header_search" type="text" placeholder="Pesquisar...">
                            </form>
                            <div style="display: flex; justify-content: center; align-items: center;"> <button type="button" class="btn-close__fechar__navbar lupa" aria-label="Close"><i class='bx bx-x' style='color:#db162f'></i></button></div>
                        </div>
                    </div>
                </div>

            </div>

        </nav>
    </nav>
</body>

</html>