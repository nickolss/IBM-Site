<?php 
   require_once('../assets/scripts/conexao2.php');
   // Inicia a sessão
   if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


// Verifica se o formulário foi enviado
if (isset($_GET['busca'])) {
    // Consulta SQL para buscar os IDs dos produtos que correspondem à pesquisa
    $pesquisa = ($_GET['busca']);
    $sql = "SELECT codigoProduto FROM produto WHERE nome LIKE '%$pesquisa%' OR preco LIKE '%$pesquisa%' OR marca LIKE '%$pesquisa%' OR descricao LIKE '%$pesquisa%' OR customizações LIKE '%$pesquisa%' ";
    
    
    $resultado = mysqli_query($conexao, $sql);

    // Array para armazenar os IDs dos produtos encontrados
   
    $idsProdutos = [];
    

    // Verificar se a consulta retornou resultados
    if ($resultado) {
        while ($linha = mysqli_fetch_assoc($resultado)) {
            $idsProdutos[] = $linha['codigoProduto'];
        }
       
    }
    if(!empty($idsProdutos)){
        print_r ($idsProdutos);
    // Armazenar os IDs dos produtos na sessão
    $_SESSION['idsProdutos'] = $idsProdutos;
    $_SESSION['buscaFeita'] = $pesquisa;
   

    // Redirecionar para a página de resultados
    if (!empty($idsProdutos)) {
        header("Location: produtos.php");
        exit();
    }  }else{
        $idsProdutos = 0;
        $_SESSION['buscaFeita'] = $pesquisa;
        $_SESSION['idsProdutos'] = $idsProdutos;
        header("Location: produtos.php");
    }        
}
?>
<header>
    <div id="header">
        <div class="conj_header_redes">
            <ul id="form_header_redes">
                <li> <a class="cabeca" href="https://www.linkedin.com/in/turn-motors-285988252/"> <img width="35px" height="auto" src="../assets/img/linkedin.svg" alt="linkedin"> </a> </li>
                <li> <a class="cabeca" href="https://twitter.com/MotorsTurn"> <img width="35px" height="auto" src="../assets/img/twitter2.svg" alt="twitter"> </a> </li>
                <li> <a class="cabeca" href="https://www.instagram.com/turn_motors/"> <img width="35px" height="auto" src="../assets/img/instagram2.png" alt="instagram"> </a> </li>
            </ul>
        </div>
        <div class="conj_header_menu">
            <ul id="form_header_menu">
                <li> <a class="cabeca" href="../pags/personalizacoes.php">Personalizações</a> </li>
                <li> <a class="cabeca" href="../pags/produtos.php">Produtos</a> </li>
                <li> <a class="cabeca" href="../index.php"> <img width="90px" src="../assets/img/logo-final-finalmesmo.svg" alt="home"> </a> </li>
                <li> <a class="cabeca" href="../pags/aboutus.php">Sobre Nós</a> </li>
                <li> <a class="cabeca" href="../pags/vagas.php">Vagas</a> </li>
            </ul>
        </div>
        <div class="conj_header_ferramentas">
            <ul id="form_header_ferramentas">
                <li> <img class="lupa" width="40px" height="auto" src="../assets/img/lupa.png" alt="Pesquisar"> </li>
                <li> <img id="carrinho" width="40px" src="../assets/img/iconeCarrinhoQuantidade.svg" alt="Carrinho"> </li>
                <li> <a class="cabeca" href="../pags/login.php"> <img width="60px" src="../assets/img/conta5.png" alt="Login"> </a> </li>
            </ul>
        </div>
    </div>
    <div id="fade"></div>
    <nav id="carrinho__header">
        <img class="seta__header__carrinho" src="../assets/img/seta-modal.svg" alt="">
        <div id="carrinho__header_vazio">
            <img width="100px" src="../assets/img/iconeSacolaCompras.svg" alt="">
            <p>Não há produtos ainda</p>
        </div>
        <div id="itens__header__modal_carrinho">
            <div class="table__itens_header_carrinho">
                <table style="border-collapse: separate;border-spacing: 0 10px ; ">
                    <tbody>
                        <tr >    
                        <td class="img__table__header_carrinho" style="width: 40%;"> <img src="" alt=""> </td>
                      
                        <td class="info__table__header_carrinho">
                              
                           
                            
                            
                            <div class="table_itens__header__carrinho__config">
                                <div class="table__itens_header_carrinho_botoes">
                                    <button id="botaoSubtrair_carrinho_header">-</button>
                                    <span id="contador_carrinho_header">1</span>
                                    <button id="botaoAcrescentar_carrinho_header" href="?adicionar=<?php echo $item['id'] ?>">+</button>
                                </div>
                                <?php if (isset($_SESSION['carrinho'][$item['id']])) { ?>
								<a style="border: none; color: #003445; background-color: #fff; text-decoration: none" href="?remover=<?php echo $item['id'] ?>">Excluir</a>
								<?php } else { ?>
								<span href="produtos.php"></span>
								<?php } ?>
                            </div>
                        </td>
                        
                        </tr>
                       
                        <?php }                     
                        function getTotalPurchaseAmount($array) {
                        $totalAmount = 0.0;
                        foreach ($array as $item) {
                            $totalAmount += $item['quantidade'] * $item['preco'];
                        }
                        return $totalAmount;
                        }?>
                    </tbody>
                </table>


            </div>
            <br>
            <br>
            <div class="carrinho__header__finalizacao">
            <p class="fs-2">Total: R$<?php echo getTotalPurchaseAmount($_SESSION['carrinho']); ?></p>
                <div class="text-center">
                    <button><a href="../pags/carrinho.php"> Ver Carrinho</a> </button>
                    <a style="text-decoration: none; color: #003445" href="">Frete grátis com o Plano Turbinado</a>
                </div>


            </div>
        </div>

    </nav>
</header>

<nav id="header_search_aparecer2">
    <nav class="header_search_aparecer ">


        <div class="container  text-center">
            <div class="row align-items-center" style="height: 150px;">
                <div class="col " style="padding: 0px 20px;">
              
                    <div class="header_search" >
                    <form style="width: 100%; " action="" method="GET" class="d-flex" role="search">
                        <button  type="submit"><img width="30px" height="auto" src="../assets/img/lupa.png" alt="Pesquisar"></button>
                       
                        <input name="busca" class="form-control input_header_search" type="search" placeholder="Pesquisar...">
                        </form>
                        <div style="display: flex; justify-content: center; align-items: center; "> <button type="button" class="btn-close lupa" aria-label="Close"></button></div>
                     
                    </div>
                </div>
            </div>

        </div>

    </nav>
</nav>

<nav style="box-shadow: 0px 5px 5px 0px #888;" class="navbar  fixed-top" id="menu">
    <div class="d-flex justify-content-between " style="height: 100%;">
        <div style=" width: 33%;" class="d-flex ">
            <button style="border: none; margin-left: 10px;" class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Menu">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div style=" width: 33%;" class="d-flex justify-content-center">
            <a href="../index.php"><img class="img-fluid" width="50px" height="auto" src="../assets/img/logo-final-finalmesmo.svg" alt="home"></a>
        </div>

        <div style=" width: 33%;" class="d-flex justify-content-end align-items-center">
            <div style="margin-right: 30px;">
                <img class="lupa img-fluid" width="30px" height="auto" src="../assets/img/lupa.svg" alt="Ícone de busca">
            </div>
            <div style="margin-right: 10px;">
                <img class="img-fluid" width="30px" height="auto" src="../assets/img/iconeCarrinhoQuantidade.svg" alt="Carrinho">
            </div>


        </div>




        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div style="box-shadow: 0px 2px 5px 0px #888; background-color: hsla(195, 98%, 19%, 0.600);" class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel"><img style="margin-right: 10px;" width="50px" height="auto" src="../assets/img/logo-final-finalmesmo.svg" alt="logo"><img width="150px" height="auto" src="../assets/img/titulo.svg" alt="titulo"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>

            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                    </li>
                    <hr>
                    <li class="nav-item">
                        <a class="nav-link" href="../pags/login.php">Login</a>
                    </li>
                    <hr>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Opções
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../pags/personalizacoes.php">Personalizações</a></li>
                            <li><a class="dropdown-item" href="../pags/produtos.php">Produtos</a></li>
                            <li><a class="dropdown-item" href="../pags/vagas.php">Vagas</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="../pags/aboutus.php">Sobre Nós</a></li>

                        </ul>
                    </li>
                    <br>
                    <br>
                    <div class="row alinhar">
                        <div class="col">
                            <a class="link" href="https://www.linkedin.com/in/turn-motors-285988252/" aria-label="Acesse nosso Linkedin"><img width="35px" height="auto" src="../assets/img/linkedin3.svg" alt="linkedin"></a>


                        </div>
                        <div class="col">
                            <a class="link" href="https://twitter.com/MotorsTurn" aria-label="Acesse nosso Twitter"><img width="35px" height="auto" src="../assets/img/twitter2.svg" aria-label="Acesse nosso Twitter" alt="twitter"></a>
                        </div>
                        <div class="col">
                            <a class="link" href="https://www.instagram.com/turn_motors/" aria-label="Acesso nosso Instagram"><img width="35px" height="auto" src="../assets/img/instagram2.png" alt="instagram"></a>
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
                    <form style="width: 100%; " action="" method="GET" class="d-flex" role="search">
                    <button  type="submit"><img width="30px" height="auto" src="../assets/img/lupa.svg" alt="Pesquisar"></button>
                        <input name="busca" class="form-control input_header_search" type="search" placeholder="Pesquisar...">
                    </form>
                        <div style="display: flex; justify-content: center; align-items: center;"> <button type="button" class="btn-close lupa" aria-label="Close"></button></div>
                    </div>
                </div>
            </div>

        </div>

    </nav>
</nav>