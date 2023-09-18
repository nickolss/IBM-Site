<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Oficina de personalização de carros e venda de peças de alta qualidade. Transformamos veículos em obras de arte com peças exclusivas e instalação meticulosa. Conte conosco para realizar seus sonhos de personalização.">
	<title>Turn Motors | Home</title>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	
	
	<link rel="stylesheet" type="text/css" href="assets/css/home.min.css">
	<link rel="stylesheet" href="assets/css/estilos-importantes.css">

	<link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
	
	<script type="text/javascript" src="assets/js/java.js" defer></script>
	<script src="assets/js/js-bootstrap/bootstrap.bundle.min.js"></script>
	
	

  </head>
</head>
<body >
	
 

<?php 
    require_once('assets/scripts/conexao.php');
    session_start();
?>
<header>
    <div id="header">
        <div class="conj_header_redes">
            <ul id="form_header_redes">
                <li> <a class="cabeca" href="https://www.linkedin.com/in/turn-motors-285988252/"> <img width="35px" height="auto" src="assets/img/linkedin.svg" alt="linkedin"> </a> </li>
                <li> <a class="cabeca" href="https://twitter.com/MotorsTurn"> <img width="35px" height="auto" src="assets/img/twitter2.svg" alt="twitter"> </a> </li>
                <li> <a class="cabeca" href="https://www.instagram.com/turn_motors/"> <img width="35px" height="auto" src="assets/img/instagram2.png" alt="instagram"> </a> </li>
            </ul>
        </div>
        <div class="conj_header_menu">
            <ul id="form_header_menu">
                <li> <a class="cabeca" href="pags/personalizacoes.php">Personalizações</a> </li>
                <li> <a class="cabeca" href="pags/produtos.php">Produtos</a> </li>
                <li> <a class="cabeca" href="index.php"> <img width="90px" src="assets/img/logo-final-finalmesmo.svg" alt="home"> </a> </li>
                <li> <a class="cabeca" href="pags/aboutus.php">Sobre Nós</a> </li>
                <li> <a class="cabeca" href="pags/vagas.php">Vagas</a> </li>
            </ul>
        </div>
        <div class="conj_header_ferramentas">
            <ul id="form_header_ferramentas">
                <li> <img class="lupa" width="40px" height="auto" src="assets/img/lupa.png" alt="Pesquisar"> </li>
                <li> <img id="carrinho" width="40px" src="assets/img/iconeCarrinhoQuantidade.svg" alt="Carrinho"> </li>
                <li> <a class="cabeca" href="pags/login.php"> <img width="60px" src="assets/img/conta5.png" alt="Login"> </a> </li>
            </ul>
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
    <nav id="carrinho__header">
        <img class="seta__header__carrinho" src="assets/img/seta-modal.svg" alt="">
              <?php  if (!empty($_SESSION['carrinho'])) { ?>         
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
                           
                        <tr >    
                        <td class="img__table__header_carrinho" style="width: 40%;"> <img src="<?php echo substr($value['caminho_imagem'], 3) ?>" alt="..."> </td>
                      
                        <td class="info__table__header_carrinho">
                              <div>
                                <h2> <?php echo $value['nome'] ?></h2>
                              </div>
                              <div><h3>R$: <?php echo $value['preco'] ?></h3></div>
                            <div class="table_itens__header__carrinho__config">
                                <div class="table__itens_header_carrinho_botoes">
                                    <form method="POST" action="?subtrair=<?php echo $idProd ?>">
                                        <button id="botaoSubtrair_carrinho_header" type="submit" name="subtrair" value="<?php echo $idProd ?>">-</button>
                                    </form>
                                    
                                    <span id="contador_carrinho_header"> <?php echo $value['quantidade'] ?></span>
                                    <form method="POST" action="?adicionar=<?php echo $idProd ?>">
                                        <button id="botaoAcrescentar_carrinho_header" type="submit" name="adicionar" value="<?php echo $idProd ?>">+</button>
                                    </form>
                                </div>
                                
                                <form method="POST" action="?remover=<?php echo $idProd ?>">
                                    <button style="border: none; color: #003445; background-color: #fff; text-decoration: none" type="submit" name="remover" value="<?php echo $idProd ?>">Excluir</button>
                                </form>
								
								
								<span href="produtos.php"></span>
							
                            </div>
                        </td>
                        </tr>
                       <?php }?>
                    </tbody>
                </table>


            </div>
            <br>
            <br>
            <div class="carrinho__header__finalizacao">
            <p class="fs-2">Total: <?php echo $totalCarrinho ?>R$</p>
                <div class="text-center">
                    <button><a href="pags/carrinho.php"> Ver Carrinho</a> </button>
                    <a style="text-decoration: none; color: #003445" href="">Frete grátis com o Plano Turbinado</a>
                </div>


            </div>
        </div>
        <?php }else{ ?>
     
            <div id="carrinho__header_vazio">
            <img width="100px" src="assets/img/iconeSacolaCompras.svg" alt="">
            <p>Não há produtos ainda</p>
            </div> 
             <?php } ?>     

    </nav>
</header>

<nav id="header_search_aparecer2">
    <nav class="header_search_aparecer ">


        <div class="container  text-center">
            <div class="row align-items-center" style="height: 150px;">
                <div class="col " style="padding: 0px 20px;">
              
                    <div class="header_search" >
                    <form style="width: 100%; " action="produtos-categoria.php" method="GET" class="d-flex" role="search">
                        <button  type="submit"><img width="30px" height="auto" src="assets/img/lupa.png" alt="Pesquisar"></button>
                       
                        <input name="busca" class="form-control input_header_search" type="text" placeholder="Pesquisar...">
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
            <a href="index.php"><img class="img-fluid" width="50px" height="auto" src="assets/img/logo-final-finalmesmo.svg" alt="home"></a>
        </div>

        <div style=" width: 33%;" class="d-flex justify-content-end align-items-center">
            <div style="margin-right: 30px;">
                <img class="lupa img-fluid" width="30px" height="auto" src="assets/img/lupa.svg" alt="Ícone de busca">
            </div>
            <div style="margin-right: 10px;">
                <img class="img-fluid" width="30px" height="auto" src="assets/img/iconeCarrinhoQuantidade.svg" alt="Carrinho">
            </div>


        </div>




        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div style="box-shadow: 0px 2px 5px 0px #888; background-color: hsla(195, 98%, 19%, 0.600);" class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel"><img style="margin-right: 10px;" width="50px" height="auto" src="assets/img/logo-final-finalmesmo.svg" alt="logo"><img width="150px" height="auto" src="assets/img/titulo.svg" alt="titulo"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>

            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <hr>
                    <li class="nav-item">
                        <a class="nav-link" href="pags/login.php">Login</a>
                    </li>
                    <hr>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Opções
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="pags/personalizacoes.php">Personalizações</a></li>
                            <li><a class="dropdown-item" href="pags/produtos.php">Produtos</a></li>
                            <li><a class="dropdown-item" href="pags/vagas.php">Vagas</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="pags/aboutus.php">Sobre Nós</a></li>

                        </ul>
                    </li>
                    <br>
                    <br>
                    <div class="row alinhar">
                        <div class="col">
                            <a class="link" href="https://www.linkedin.com/in/turn-motors-285988252/" aria-label="Acesse nosso Linkedin"><img width="35px" height="auto" src="assets/img/linkedin3.svg" alt="linkedin"></a>


                        </div>
                        <div class="col">
                            <a class="link" href="https://twitter.com/MotorsTurn" aria-label="Acesse nosso Twitter"><img width="35px" height="auto" src="assets/img/twitter2.svg" aria-label="Acesse nosso Twitter" alt="twitter"></a>
                        </div>
                        <div class="col">
                            <a class="link" href="https://www.instagram.com/turn_motors/" aria-label="Acesso nosso Instagram"><img width="35px" height="auto" src="assets/img/instagram2.png" alt="instagram"></a>
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
                    <button  type="submit"><img width="30px" height="auto" src="assets/img/lupa.svg" alt="Pesquisar"></button>
                        <input name="busca" class="form-control input_header_search" type="text" placeholder="Pesquisar...">
                    </form>
                        <div style="display: flex; justify-content: center; align-items: center;"> <button type="button" class="btn-close lupa" aria-label="Close"></button></div>
                    </div>
                </div>
            </div>

        </div>

    </nav>
</nav>
		
		<br >
		<br >
		<br >
		<br >
		<nav class="none">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="texto" >
						 <img width="auto" height="auto" class="img-fluid" src="assets/img/titulo.svg " alt="titulo">
						</div>
						<div class="texto">
						 <p align="justify" >A Turn Motors é uma marca de customização, conserto, e venda de peças para automóveis, focamos na personalização e na criação de uma identidade visual única para o seu veículo.</p>
						</div>
						<div class="alinhar">
							<a href="pags/produtos.php"><button type="button" class="botao">Explore</button></a>

						</div>
					</div>
					<br>
					<br>
					
					
				</div>
				<div class="row">
					<div class="col">
						<img width="auto" height="auto" class="img-fluid" src="assets/img/carro.png" alt="carro">
					</div>
				</div>
				<br>
				<br>
				<br>
				<br>
					<div class="row alinhar">
						<div style="margin-top: 12px" class="col">
							<img width="120px" height="auto" src="assets/img/pneu.svg" alt="pneu">
							<div class="icone">
								Customização
							</div>
						</div>
						<div class="col">
							<img width="100px" height="auto" src="assets/img/pintura-icon.svg" alt="pintura">
							<div class="icone">
								Pintura
							</div>
						</div>
						<div class="col">
							<img width="100px" height="auto" src="assets/img/motor-preenchido--icon.svg" alt="motor">
							<div class="icone">
								Tunagem
							</div>
						</div>
						<div style="margin-top: 58px;" class="col">
							<img width="130px" height="auto" src="assets/img/rebaixado-icon.svg" alt="rebaixado">
							<div class="icone">
								Suspensão
							</div>
						</div>
						<div class="col">
							<img width="100px" height="auto" src="assets/img/conserto.svg" alt="conserto">
							<div class="icone">
								Conserto
							</div>
						</div>
					</div>
			</div>
		</nav>
		<nav class="nonone ">
			<div class="container ">
				<div class="row ">
					<div class="col ">
						<div style="text-align: center;" >
						 <img  width="500px" height="auto" src="assets/img/titulo.svg" alt="titulo">
						</div>
						<div class="texto1">
						 <p align="justify" >A Turn Motors é uma marca de customização, conserto, e venda de peças para automóveis, focamos na personalização e na criação de uma identidade visual única para o seu veículo.</p>
						</div>
						<div>
							<a href="pags/produtos.php"><button type="button" class="botao1">Explore</button></a>
						</div>
					</div>
					<br>
					<br>
					<div class="col ">
						
			             <img width="600px" height="auto" src="assets/img/carro.png" alt="carro">
			            
					</div>
				</div>
				<br>
				<br>
				<br>
				<br>
				<div class="row alinhar">
					<div style="margin-top: 12px" class="col">
						<img width="120px" height="auto" src="assets/img/pneu.svg" alt="pneu">
						<div class="icone">
							Customização
						</div>
					</div>
					<div class="col">
						<img width="100px" height="auto" src="assets/img/pintura-icon.svg" alt="pintura">
						<div class="icone">
							Pintura
						</div>
					</div>
					<div class="col">
						<img width="100px" height="auto" src="assets/img/motor-preenchido--icon.svg" alt="motor">
						<div class="icone">
							Tunagem
						</div>
					</div>
					<div style="margin-top: 58px;" class="col">
						<img width="130px" height="auto" src="assets/img/rebaixado-icon.svg" alt="rebaixado">
						<div class="icone">
							Suspensão
						</div>
					</div>
					<div class="col">
						<img width="100px" height="auto" src="assets/img/conserto--icon.svg" alt="conserto">
						<div class="icone">
							Conserto
						</div>
					</div>
				</div>
			</div>
		</nav>
		<br>
		<hr class="linha">
		<nav class="">
			<div>
				<div class="row" id="correcao">
					
					<div class="col alinhar ">
					 <strong>PASSO A PASSO</strong>
					 <p class="paragrafo">Tutorial para os nossos clientes conhecerem como o Turn Motors opera. Conhecendo as informações basicas antes de nos contratar.</p>
					</div>
					
				</div>

				<br>
				<br>
				<div class="row" id="correcao">
					<div class="col alinhar" style="margin-bottom: 50px;">
						<img width="130px" height="auto" src="assets/img/1.svg" alt="numero1">
						<div class="texto9"><h2>Tunnagem</h2>
							<p >Definas as customizações disponíveis para o seu veículo.</p>
						</div>

					</div>

					<div class="col alinhar"  style="margin-bottom: 50px;">
						<img width="130px" height="auto" src="assets/img/2.svg" alt="numero2">
						<div class="texto9"><h2>Leve até nós</h2>
							<p >Levar o seu automóvel até a oficina Turn Motors.</p>
						</div>
					</div>
					<div class="col alinhar">
						<div >
						<img  width="130px" height="auto" src="assets/img/3.svg" alt="numero3">
						</div>
						<div class="texto9"><h2>Busque seu novo veículo</h2>
							<p>Retornar até a oficina Turn Motors e pegar o seu veículo único, customizado e lavado.</p>
						</div>
					</div>
				</div>
				<hr>
				<div class="row" id="correcao">
					<div class="col">
						
					</div>
					<div class="col alinhar">
						<strong>NOSSAS VANTAGENS</strong>
						<p class="paragrafo">Principais virtudes e benefícios da Turn Motors.</p>
					</div>
					<div class="col">
						
					</div>
				</div>
				<br>
				<br>
				<div class="row alinhar" id="correcao">
					<div class="col"  style="margin-bottom: 50px;">
						<img width="130px" height="auto" src="assets/img/produtividade.svg" alt="produtividade">
						<div><h2>Produtividade</h2>
							<p class="texto9">A Turn Motors se preocupa em entregar o seu veículo o mais rápido para você.</p>
						</div>

					</div>

					<div class="col"  style="margin-bottom: 50px;">
						<img width="130px" height="auto" src="assets/img/chave-inglesa.svg" alt="chave-inglesa">
						<div><h2>Alta customização</h2>
							<p class="texto9">Nós presonalizamos o seu veículo da forma que você escolher em nosso site.</p>
						</div>
					</div>
					<div class="col ">
						<img width="130px" height="auto" src="assets/img/pilha-de-moedas.svg" alt="pilha-de-moedas">
						<div><h2>Baixos Custos</h2>
							<p class="texto9">Customize totalmente o seu carro, por um preço que cabe no seu bolso.</p>
						</div>
					</div>
				</div>
				<hr>
				<div class="row" id="correcao">
					<div class="col">
						
					</div>
					<div class="col alinhar">
						<strong>COMO NÓS TRABALHAMOS</strong>
						<p class="paragrafo">Um passo a passo de como a equipe Turn Motors trabalha para fazermos o melhor trabalho possível.</p>
					</div>
					<div class="col">
						
					</div>
				</div>
				<br>
				<br>
				<div class="row alinhar" id="correcao">
					<div class="col"  style="margin-bottom: 50px;">
						<img width="130px" height="auto" src="assets/img/garagem.svg" alt="garagem">
						<div><h2>Recebemos o automóvel</h2>
							<p class="texto9">Recebemos seu veículo e seu pedido.</p>
						</div>

					</div>
					<div class="col"  style="margin-bottom: 50px;">
						<img width="130px" height="auto" src="assets/img/manutencao.svg" alt="manutencao">
						<div><h2>Verificamos o veículo</h2>
							<p class="texto9">Cuidamos da parte burocrática e analisamos possíveis irregularidades no veículo.</p>
						</div>

					</div>

					<div class="col"  style="margin-bottom: 50px;">
						<img width="130px" height="auto" src="assets/img/chave-inglesa.svg" alt="chave-inglesa">
						<div><h2>Customização</h2>
							<p class="texto9">Personalizamos o seu veiculo conforme foi pedido e seguindo as restrições impostas por lei.</p>
						</div>
					</div>
					<div class="col ">
						<img width="130px" height="auto" src="assets/img/calava.svg" alt="Lavagem">
						<div><h2>Lavagem</h2>
							<p class="texto9">Após a customização, lavamos o veículo. Havendo o resultado final que o cliente espera.</p>
						</div>
					</div>
				</div>
			</div>
		</nav>
		<hr class="linha">
		<nav>
			    <div class="row" id="correcao">
					<div class="col">
						
					</div>
					<div class="col alinhar">
						<strong>RESTRIÇÕES E LIMITES</strong>
						<p class="paragrafo">Nessa área são mostradas as restrições e os limites impostos por lei na hora de personalizar o seu veículo.</p>
					</div>
					<div class="col">
						
					</div>
				</div>
				
				<br>
				<div class="container ">
					<div class="row">
						<div class="col ">
							<div >
								<div>
									<img width="25px" height="25px" class="redondo" src="assets/img/red.svg" alt="ponto">
									<span class="final" class="">Pneu</span>
								</div>
							 <p align="justify" >Aumento ou diminuição do diãmetro externo do conjunto pneu/roda.</p>
							</div>
							<br>
							<div >
								<div >
									<img width="25px" height="25px" class="redondo" src="assets/img/red.svg" alt="ponto">
									<span class="final" >Envelopamento ou Pintura</span>
								</div>
							 <p align="justify" >Proibido alterar área superior a 50% do veículo.
							 Modificações em veículos devem ser precedidas de autorização da autoridade. </p>
							</div>
							<br>
							<div >
								<div >
									<img width="25px" height="25px" class="redondo" src="assets/img/red.svg" alt="ponto">
									<span class="final" class="">Insulfilme</span>
								</div>
							 <p align="justify" >A transmissão luminosa por meio do vidro dianteiro não deve ser inferior a 75% e deve ser incolor, já vidros laterais 70%.</p>
							</div>
							<br>
							<div >
								<div >
									<img width="25px" height="25px" class="redondo" src="assets/img/red.svg" alt="ponto">
									<span class="final" >Sons e DVD</span>
								</div>
							 <p align="justify" >É proibido veículos com som acima de 80 decibéis (medidos a 7 metros).</p>
							</div>
							<br>
							<div >
								<div >
									<img width="25px" height="25px" class="redondo" src="assets/img/red.svg" alt="ponto">
									<span class="final" >Chassis e Monobloco</span>
								</div>
							 <p align="justify" >Proibida a substituição.</p>
							</div>
							<br>
							<div >
								<div >
									<img width="25px" height="25px" class="redondo" src="assets/img/red.svg" alt="ponto">
									<span class="final" >Freio</span>
								</div>
							 <p align="justify" >O sistema de freios não pode ser modificado.</p>
							</div>
						</div>
						<div class="col ">
							<div>
								<div >	
									<img width="25px" height="25px" class="redondo" src="assets/img/red.svg" alt="ponto">
									<span class="final" >Suspensão</span>
								</div>
							 <p align="justify" >A altura mínima permitida para a circulação deve ser maior ou igual a 10cm.</p>
							</div>
							<br>
							<div >
								<div >
									<img width="25px" height="25px" class="redondo" src="assets/img/red.svg" alt="ponto">
									<span class="final" >Faróis Led</span>
								</div>
							 <p align="justify" >É proibida a substituição de lâmpadas dos sistemas de iluminação ou sinalização de veículos por outras que não seja original do fabricante. </p>
							</div>
							<br>
							<div >
								<div >
									<img width="25px" height="25px" class="redondo" src="assets/img/red.svg" alt="ponto">
									<span class="final" >Faróis de Xenon</span>
								</div>
							 <p align="justify" >De acordo com o Artigo 8 da Resolução n° 292 do Contran, fica proibido a implantação de faróis de xénon.</p>
							</div>
							<br>
							<div >
								<div >
									<img width="25px" height="25px" class="redondo" src="assets/img/red.svg" alt="ponto">
									<span class="final" >Motor</span>
								</div>
							 <p align="justify" >A potência original do motor apenas pode ser aumentada em 10%.</p>
							</div>
							<br>
							<div>
								<div>
									<img width="25px" height="25px" class="redondo" src="assets/img/red.svg" alt="ponto">
									<span class="final" >Combustível</span>
								</div>
							 <p align="justify">É concedido trocar o sistema (gasolina etanol ou bicombustível) por gás natural veicular (GNV), mas o kit deve seguir as regulamentações do Inmetro.</p>
							</div>
							
						</div>
					</div >
				</div>
			
			
		</nav>
		<br>
		<br>
		<br>
		<footer>
			<div class="row" id="correcao">
				<div class="col alinhar">
					<div> <img width="100px" height="auto" src="assets/img/logo-luz.svg" loading="lazy" alt="logo"> </div>
					<h4 class="tite ">TURN MOTORS</h4>
					<p id="slogan">Venha conosco. Olha o ronco!</p>
	                <p id="copy">&copy;Turn Motors, 2022</p>

				</div>
				<div class="col">
					<div class="alinhar" style="margin-top: 50px;">
					   <h4>Contate-nos aqui!!!</h4>
	                        <!--form sub-->
	                        
	                            <form>
	                                <div >
	                                    <input type="text" id="mensagem"  placeholder="Nos envie uma mensagem">
	                                    <div class="botaoalinhar">
	                                     <button class="botao3" onclick="apagar()"><img width="24px" height="auto" src="assets/img/enviar-sombra.svg" alt="Foto enviar"></button>
	                                	</div>
	                                </div>
	                                <!--<button>Enviar</button>-->
	                            </form>
	                </div>  
				</div>

				<div class="col">

					<div class="row">

						<div class="col">

							
								<ul class="separar">
									<li> <a href="index.php">Home</a> </li>
									<li> <a href="pags/produtos.php">Produtos</a> </li>
									<li> <a href="pags/personalizacoes.php">Personalizações</a> </li>
								</ul>
							
						</div>
						<div class="col">
							<ul class="separar">
								<li> <a href="pags/aboutus.php">Sobre Nós</a> </li>
								<li> <a href="pags/vagas.php">Vagas</a> </li>
								<li> <a href="pags/desenvolvedores.php">Desenvolvedores</a> </li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col none1">
					<div>
						<div class="midias-sociais">
		                            <a href="https://www.instagram.com/turn_motors/"><img class="rede-social" width="auto" height="auto" src="assets/img/instagram2.png" alt="Logo instagram"></a>
		                </div>
		                <div class="midias-sociais">
		                            <a href="https://twitter.com/MotorsTurn"><img class="rede-social" width="auto" height="auto" src="assets/img/twitter2.svg" alt="Logo Twitter"></a>
		                </div>
		                <div class="midias-sociais">
		                            <a href="https://www.linkedin.com/in/turn-motors-285988252/"><img class="rede-social" width="auto" height="auto" src="assets/img/linkedin3.svg" alt="Logo Linkedin"></a>
		                </div>
	                </div>
				</div>
				<div class="col block" >
					<div class="midias-sociais1">
						<div class="midia midia1" >
		                            <a href="https://www.instagram.com/turn_motors/"><img class="rede-social" width="auto" height="auto" src="assets/img/instagram2.png" alt="Logo instagram"></a>
		                </div>
		                <div class="midia" >
		                            <a href="https://twitter.com/MotorsTurn"><img class="rede-social" width="auto" height="auto" src="assets/img/twitter2.svg" alt="Logo Twitter"></a>
		                </div>
		                <div class="midia" >
		                            <a href="https://www.linkedin.com/in/turn-motors-285988252/"><img class="rede-social" width="auto" height="auto" src="assets/img/linkedin3.svg" alt="Logo Linkedin"></a>
		                </div>
	                </div>
				</div>
			</div>
	    </footer>
 
		
</body>
</html>
