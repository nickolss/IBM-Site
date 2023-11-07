<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Oficina de personalização de carros e venda de peças de alta qualidade. Transformamos veículos em obras de arte com peças exclusivas e instalação meticulosa. Conte conosco para realizar seus sonhos de personalização.">
	<title>Turn Motors | Home</title>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

	<!--LINK ICONES-->
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

	<link rel="stylesheet" type="text/css" href="assets/css/home.min.css">
	<link rel="stylesheet" href="assets/css/estilos-importantes.css">

	<link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">

	<script type="text/javascript" src="assets/js/java.js" defer></script>
	<script src="assets/js/js-bootstrap/bootstrap.bundle.min.js"></script>
</head>

<body id="container__body">

	<?php
	require_once('assets/scripts/conexao.php');
	session_start();
	?>

	<?php
	if (!isset($_SESSION['carrinho'])) {
		$_SESSION['carrinho'] = array(); // Inicialize o carrinho como um array vazio
	}

	if (isset($_POST['limpar_carrinho_btn'])) {
		// Limpar todos os itens do carrinho
		$_SESSION['carrinho'] = array();
	}

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		if (isset($_POST['adicionar'])) {
			$idProd = (int)$_POST['adicionar'];

			$sql = "SELECT codigoProduto FROM produto";
			$stmt = $pdo->prepare($sql);
			if ($stmt->execute()) {

				$idsProdutosPermitidos = [];
				while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
					$idsProdutosPermitidos[] = $linha['codigoProduto'];
				}
			} else {
				echo "Erro na consulta: " . $stmt->errorInfo()[2];
			}



			// Verifique se o ID do produto existe no array de IDs de produtos
			if (in_array($idProd, $idsProdutosPermitidos)) {



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
								'caminho_imagem' => $imagemProdutoCart,

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

	<header>
		<div class="pai__header">
			<div class="filho__header">
				<div class="logotipo">
					<a class="logo" href="index.php">
						<figure class="figure-container">
							<img class="img__logo" src="assets/img/logo-turnmotors.png" alt="Logo Turn Motors" />
							<figcaption class="legenda__icones__atividade" id="title__header">TURN MOTORS</figcaption>
						</figure>
					</a>
				</div>
				<div>
					<ul class="paginas">
						<li class="opcoes__paginas"><a class="hyperlink__paginas" href="pags/personalizacoes.php">Personalizações</a></li>
						<li class="opcoes__paginas"><a class="hyperlink__paginas" href="pags/produtos.php">Produtos</a></li>
						<li class="opcoes__paginas"><a class="hyperlink__paginas" href="pags/aboutus.php">Sobre Nós</a></li>
					</ul>
				</div>
				<div class="icones__direita">
					<ul class="icones">
						<li> <img class="lupa icone__header" src="assets/img/icone-search.svg" alt="Pesquisar"> </li>
						<li class="pai-carrinho">
							<nav id="carrinho__header">
								<img class="seta__header__carrinho" src="assets/img/seta-modal.png" alt="">
								<?php if (!empty($_SESSION['carrinho'])) { ?>
									<div id="itens__header__modal_carrinho">
										<div class="table__itens_header_carrinho">
											<table style="border-collapse: separate;border-spacing: 0 10px ; ">
												<tbody>
													<?php
													$totalCarrinho = 0; // Variável para calcular o total do carrinho
													$totalPR = 0;


													$url = $_SERVER['REQUEST_URI'];


													$textoAlvo = "carrinho.php";
													$textoAlvo2 = "index.php";


													if ((strpos($url, $textoAlvo) !== false) || (strpos($url, $textoAlvo2) !== false)) {

														$SomaDeParametroURL = "?";
													} else {

														$SomaDeParametroURL = "&";
													}


													foreach ($_SESSION['carrinho'] as $idProd => $value) {
														$subtotal = $value['preco'] * $value['quantidade'];
														$totalCarrinho += $subtotal;
														$caminhoCompleto = $value['caminho_imagem'];
														$caminhoSemOsTresPrimeiros = substr($caminhoCompleto, 3);
													?>

														<tr>
															<td class="img__table__header_carrinho" style="width: 40%;"> <img src="<?php echo $caminhoSemOsTresPrimeiros ?>" alt="..."> </td>

															<td class="info__table__header_carrinho">
																<div>
																	<h2> <?php echo $value['nome'] ?></h2>
																</div>
																<div>
																	<h3>R$: <?php echo number_format($value['preco'], 2, ',', '.')  ?></h3>
																</div>
																<div class="table_itens__header__carrinho__config">
																	<div class="table__itens_header_carrinho_botoes">
																		<form method="POST" action="<?php echo $_SERVER['REQUEST_URI'] ?><?php echo $SomaDeParametroURL ?>subtrair=<?php echo $idProd ?>">
																			<button id="botaoSubtrair_carrinho_header" type="submit" name="subtrair" value="<?php echo $idProd ?>">-</button>
																		</form>

																		<span id="contador_carrinho_header"> <?php echo $value['quantidade'] ?></span>
																		<form method="POST" action="<?php echo $_SERVER['REQUEST_URI'] ?><?php echo $SomaDeParametroURL ?>adicionar=<?php echo $idProd ?>">
																			<button id="botaoAcrescentar_carrinho_header" type="submit" name="adicionar" value="<?php echo $idProd ?>">+</button>
																		</form>
																	</div>

																	<form method="POST" action="<?php echo $_SERVER['REQUEST_URI'] ?><?php echo $SomaDeParametroURL ?>remover=<?php echo $idProd ?>">
																		<button style="border: none; color: #003445; background-color: #fff; text-decoration: none" type="submit" name="remover" value="<?php echo $idProd ?>">Excluir</button>
																	</form>


																	<span href="pags/produtos.php"></span>

																</div>
															</td>
														</tr>
													<?php $totalPR += $value['quantidade'];
													} ?>
												</tbody>
											</table>


										</div>
										<br>
										<br>
										<div class="carrinho__header__finalizacao">
											<p class="fs-2">Total: R$<?php echo number_format($totalCarrinho, 2, ',', '.') ?></p>
											<div class="text-center">
												<form method="POST" action="pags/carrinho.php">
													<input type="hidden" name="carrinho" value="<?php echo http_build_query($_SESSION['carrinho']); ?>">
													<button type="submit"> Ver Carrinho</button>
												</form>
												<a style="text-decoration: none; color: #003445" href="">Frete grátis com o Plano Turbinado</a>
											</div>


										</div>
									</div>
								<?php } else { ?>

									<div id="carrinho__header_vazio">
										<img width="100px" src="assets/img/iconeSacolaCompras.png" alt="">
										<p>Não há produtos ainda</p>
									</div>
								<?php } ?>

							</nav>
							<div class="cont-valor__sobreposto">
								<img class="icone__header" id="carrinho" src="assets/img/icone-carrinho.svg" alt="Carrinho">

								<div class="valor-sobreposto">

									<?= isset($totalPR) ? $totalPR : '0'; ?>

								</div>
							</div>
						</li>
						<li> <a class="cabeca" href="pags/login.php"> <img class="icone__header" src="assets/img/icone-perfil.svg" alt="Login"> </a> </li>
					</ul>
				</div>
			</div>
		</div>

		<div id="fade"></div>
	</header>

	<nav id="header_search_aparecer2">
		<nav class="header_search_aparecer ">


			<div class="container  text-center">
				<div class="row align-items-center" style="height: 150px;">
					<div class="col " style="padding: 0px 20px;">

						<div class="header_search">
							<form style="width: 100%; " action="pags/produtos-categoria.php" method="GET" class="d-flex" role="search">
								<button type="submit"><img width="30px" height="auto" src="assets/img/icone-search-vermelho.png" alt="Pesquisar"></button>

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
				<a class="logotipo__header__mobile" href="index.php">
					<figure class="figure-container">
						<img width="50px" src="assets/img/logo-turnmotors.png" alt="Logo Turn Motors" />
						<figcaption class="legenda__icones__atividade" id="title__header">TURN MOTORS</figcaption>
					</figure>
				</a>
			</div>

			<div style=" width: 33%;" class="d-flex justify-content-end align-items-center">
				<div style="margin-right: 30px;">
					<img class="lupa img-fluid" width="30px" height="auto" src="assets/img/icone-search.svg" alt="Ícone de busca">
				</div>
				<div style="margin-right: 10px;">
					<div class="cont-valor__sobreposto">
						<form method="POST" action="pags/carrinho.php" id="icone-carrinho-funcional__Mobile">
							<input type="hidden" name="carrinho" value="<?php echo http_build_query($_SESSION['carrinho']); ?>">
							<img class="img-fluid" width="30px" height="auto" alt="Carrinho" src="assets/img/icone-carrinho.svg" id="botaoCarrinho__mobile"> </img>
						</form>


						<div class="valor-sobreposto">

							<?= isset($totalPR) ? $totalPR : '0'; ?>

						</div>
					</div>

				</div>


			</div>

			<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
				<div id="header__menu__hamburguer" class="offcanvas-header">
					<h5 class="offcanvas-title" id="offcanvasNavbarLabel"><img style="margin-right: 10px;" width="50px" height="auto" src="assets/img/logo-turnmotors.png" alt="logo">TURN MOTORS</h5>
					<button type="button" class="btn-close__fechar__navbar" data-bs-dismiss="offcanvas" aria-label="Close"><i class='bx bx-x' style='color:#ffc857'></i></button>
				</div>

				<div class="offcanvas-body" id="corpo__navbar__mobile">
					<ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="index.php">Home</a>
						</li>
						<hr class="divisao__linha__branca">
						<li class="nav-item">
							<a class="nav-link" href="pags/login.php">Login</a>
						</li>
						<hr class="divisao__linha__branca">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								Opções
							</a>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" href="pags/personalizacoes.php"><span class="opcao__navbar__mobile">Personalizações</span></a></li>
								<li><a class="dropdown-item" href="pags/produtos.php"><span class="opcao__navbar__mobile">Produtos</span></a></li>
								<li>
									<hr class="dropdown-divider">
								</li>
								<li><a class="dropdown-item" href="pags/aboutus.php"><span class="opcao__navbar__mobile">Sobre Nós</span></a></li>
								<?php
								if (isset($_SESSION['id'])) {
								?>
									<li>
										<hr class="dropdown-divider">
									</li>
									<li><a class="dropdown-item" href="pags/perfil.php"><span class="opcao__navbar__mobile">Perfil</span></a></li>
									<li><a class="dropdown-item" href="pags/veiculos.php"><span class="opcao__navbar__mobile">Veículos</span></a></li>
									<li><a class="dropdown-item" href="pags/comprasRealizadas.php"><span class="opcao__navbar__mobile">Compras</span></a></li>
									<li><a class="dropdown-item" href="pags/agendamentosPendentes.php"><span class="opcao__navbar__mobile">Agendamentos Pendentes</span></a></li>
									<li><a class="dropdown-item" href="pags/agendamentosConfirmados.php"><span class="opcao__navbar__mobile">Agendamentos Confirmados</span></a></li>
								<?php
								}
								?>
							</ul>
						</li>
						<br>
						<br>
						<div class="row alinhar">
							<div class="col">
								<a class="link" target="_blank" href="https://twitter.com/MotorsTurn" aria-label="Acesse nosso Twitter"><img width="35px" height="auto" src="assets/img/icone-twitter.svg" aria-label="Acesse nosso Twitter" alt="twitter"></a>
							</div>
							<div class="col">
								<a class="link" target="_blank" href="https://www.instagram.com/turn_motors/" aria-label="Acesso nosso Instagram"><img width="35px" height="auto" src="assets/img/icone-instagram.svg" alt="instagram"></a>
							</div>
						</div>
					</ul>

				</div>
			</div>
		</div>
		<nav class="header_search_aparecer ">


			<div style="margin-top: 0px" class="container  text-center">
				<div class="row align-items-center" style="height: 150px;">
					<div class="col " style="padding: 0px 20px;">
						<div class="header_search">
							<form style="width: 100%; " action="pags/produtos-categoria.php" method="GET" class="d-flex" role="search">
								<button type="submit"><img width="30px" height="auto" src="assets/img/icone-search-vermelho.png" alt="Pesquisar"></button>
								<input name="busca" class="form-control input_header_search" type="text" placeholder="Pesquisar...">
							</form>
							<div style="display: flex; justify-content: center; align-items: center;"> <button type="button" class="btn-close__fechar__navbar lupa" aria-label="Close"><i class='bx bx-x' style='color:#db162f'></i></button></div>
						</div>
					</div>
				</div>

			</div>

		</nav>
	</nav>

	<main>
		<div class="landing">
			<div class="pai__descricao__img">
				<div class="div__descricao">
					<h1 id="home__main__title">Turn Motors</h1>
					<p id="descricao__turnmotors">Turn Motors é uma marca de customização e venda de peças para atuomóveis focados na personalização e na criação de uma identidade visual única para seu veículo.</p>
					<a class="btn__explorar" href="pags/produtos.php">Explorar</a>
				</div>

				<div class="div__img">
					<img id="carro__home" src="assets/img/img-carro-home.png" alt="Carro Preto">
				</div>
			</div>

			<!--ATIVIDADES-->
			<div class="atividades">
				<div class="atividade">
					<figure class="figure-container">
						<img src="assets/img/icone-carro.svg" alt="Carro" />
						<figcaption class="legenda__icones__atividade">Customização</figcaption>
					</figure>
				</div>
				<div class="atividade">
					<figure class="figure-container">
						<img src="assets/img/icone-pintura.svg" alt="Pintura" />
						<figcaption class="legenda__icones__atividade">Pintura</figcaption>
					</figure>
				</div>
				<div class="atividade">
					<figure class="figure-container">
						<img src="assets/img/icone-motor.svg" alt="Motor" />
						<figcaption class="legenda__icones__atividade">Tunagem</figcaption>
					</figure>
				</div>
				<div class="atividade">
					<figure class="figure-container">
						<img src="assets/img/icone-pneu.svg" alt="Pneu" />
						<figcaption class="legenda__icones__atividade">Supensão</figcaption>
					</figure>
				</div>
			</div>

			<!--ATIVIDADES MOBILE-->
			<div class="atividades__mobile">
				<div class="linha__atividade">
					<div class="atividade">
						<figure class="figure-container">
							<img src="assets/img/icone-carro.svg" alt="Carro" />
							<figcaption class="legenda__icones__atividade">Customização</figcaption>
						</figure>
					</div>
					<div class="atividade">
						<figure class="figure-container">
							<img src="assets/img/icone-pintura.svg" alt="Pintura" />
							<figcaption class="legenda__icones__atividade">Pintura</figcaption>
						</figure>
					</div>
				</div>
				<div class="linha__atividade">
					<div class="atividade">
						<figure class="figure-container">
							<img src="assets/img/icone-motor.svg" alt="Motor" />
							<figcaption class="legenda__icones__atividade">Tunagem</figcaption>
						</figure>
					</div>
					<div class="atividade">
						<figure class="figure-container">
							<img src="assets/img/icone-pneu.svg" alt="Pneu" />
							<figcaption class="legenda__icones__atividade">Supensão</figcaption>
						</figure>
					</div>
				</div>
			</div>

		</div>

		<!--PASSO A PASSO-->
		<div class="title">
			<h2>Passo a Passo</h2>
			<p class="desc__subtitle">Tutorial para os nossos clientes conhecerem como o Turn Motors opera</p>
		</div>
		<div class="trabalhamos">
			<div class="atividade">
				<figure class="figure-container">
					<img class="img__passo" src="assets/img/icone-1.svg" alt="Primeiro Passo" />
					<figcaption class="legenda__icones__trabalhamos">Ler as restrições das customizações</figcaption>
				</figure>
			</div>
			<div class="atividade">
				<figure class="figure-container">
					<img class="img__passo" src="assets/img/icone-2.svg" alt="Segundo Passo" />
					<figcaption class="legenda__icones__trabalhamos">Definir as customizações disponíveis</figcaption>
				</figure>
			</div>
			<div class="atividade">
				<figure class="figure-container">
					<img class="img__passo" src="assets/img/icone-3.svg" alt="Terceiro Passo" />
					<figcaption class="legenda__icones__trabalhamos">Levar seu automóvel até a oficina Turn Motors</figcaption>
				</figure>
			</div>
			<div class="atividade">
				<figure class="figure-container">
					<img class="img__passo" src="assets/img/icone-4.svg" alt="Quarto Passo" />
					<figcaption class="legenda__icones__trabalhamos">Retornar a oficina Turn Motors e pegar o seu veículo único</figcaption>
				</figure>
			</div>
		</div>

		<!--PASSO A PASSO MOBILE-->
		<div class="trabalhamos__mobile">
			<div class="linha__atividade">
				<div class="atividade">
					<figure class="figure-container">
						<img class="img__passo" src="assets/img/icone-1.svg" alt="Primeiro Passo" />
						<figcaption class="legenda__icones__trabalhamos">Ler as restrições das customizações</figcaption>
					</figure>
				</div>
				<div class="atividade">
					<figure class="figure-container">
						<img class="img__passo" src="assets/img/icone-3.svg" alt="Terceiro Passo" />
						<figcaption class="legenda__icones__trabalhamos">Levar seu automóvel até a oficina Turn Motors</figcaption>
					</figure>
				</div>
			</div>
			<div class="linha__atividade coluna__direita">
				<div class="atividade">
					<figure class="figure-container">
						<img class="img__passo" src="assets/img/icone-2.svg" alt="Segundo Passo" />
						<figcaption class="legenda__icones__trabalhamos">Definir as customizações disponíveis</figcaption>
					</figure>
				</div>
				<div class="atividade">
					<figure class="figure-container">
						<img class="img__passo" src="assets/img/icone-4.svg" alt="Quarto Passo" />
						<figcaption class="legenda__icones__trabalhamos">Retornar a oficina Turn Motors e pegar o seu veículo único</figcaption>
					</figure>
				</div>
			</div>
		</div>

		<!--VANTAGENS-->
		<div class="title">
			<h2>Nossas Vantagens</h2>
			<p class="desc__subtitle">Principais virtudes e benefícios da Turn Motors</p>
		</div>
		<div class="trabalhamos">
			<div class="atividade">
				<figure class="figure-container">
					<img src="assets/img/icone-fogo.svg" alt="Fogo" />
					<figcaption class="legenda__icones__trabalhamos">Customizações e venda de peças no mesmo site</figcaption>
				</figure>
			</div>
			<div class="atividade">
				<figure class="figure-container">
					<img src="assets/img/icone-like.svg" alt="Like" />
					<figcaption class="legenda__icones__trabalhamos">Entrega rápida dos pedidos</figcaption>
				</figure>
			</div>
			<div class="atividade">
				<figure class="figure-container">
					<img src="assets/img/icone-ferramentas.svg" alt="Ferramentas" />
					<figcaption class="legenda__icones__trabalhamos">Personalização conforme o seu pedido</figcaption>
				</figure>
			</div>
			<div class="atividade">
				<figure class="figure-container">
					<img src="assets/img/icone-moeda.svg" alt="Moeda" />
					<figcaption class="legenda__icones__trabalhamos">Customize por um preço que cabe no seu bolso.</figcaption>
				</figure>
			</div>
		</div>

		<!--VANTAGENS MOBILE-->
		<div class="trabalhamos__mobile">
			<div class="linha__atividade">
				<div class="atividade">
					<figure class="figure-container">
						<img src="assets/img/icone-fogo.svg" alt="Fogo" />
						<figcaption class="legenda__icones__trabalhamos">Customizações e venda de peças no mesmo site</figcaption>
					</figure>
				</div>
				<div class="atividade">
					<figure class="figure-container">
						<img src="assets/img/icone-like.svg" alt="Like" />
						<figcaption class="legenda__icones__trabalhamos">Entrega rápida dos pedidos</figcaption>
					</figure>
				</div>
			</div>
			<div class="linha__atividade coluna__direita">
				<div class="atividade">
					<figure class="figure-container">
						<img src="assets/img/icone-ferramentas.svg" alt="Ferramentas" />
						<figcaption class="legenda__icones__trabalhamos">Personalização conforme o seu pedido</figcaption>
					</figure>
				</div>
				<div class="atividade">
					<figure class="figure-container">
						<img src="assets/img/icone-moeda.svg" alt="Moeda" />
						<figcaption class="legenda__icones__trabalhamos">Customize por um preço que cabe no seu bolso.</figcaption>
					</figure>
				</div>
			</div>
		</div>

		<!--COMO TRABALHAMOS-->
		<div class="title">
			<h2>Como Trabalhamos</h2>
			<p class="desc__subtitle">Como trabalhamos para fazermos o melhor trabalho possível.</p>
		</div>
		<div class="trabalhamos">
			<div class="atividade">
				<figure class="figure-container">
					<img src="assets/img/icone-carro.svg" alt="Carro" />
					<figcaption class="legenda__icones__trabalhamos">Recebemos seu veículo e seu pedido.</figcaption>
				</figure>
			</div>
			<div class="atividade">
				<figure class="figure-container">
					<img src="assets/img/icone-analisar.svg" alt="Analisar" />
					<figcaption class="legenda__icones__trabalhamos">Analisamos possíveis irregularidades no veículo.</figcaption>
				</figure>
			</div>
			<div class="atividade">
				<figure class="figure-container">
					<img src="assets/img/icone-ferramentas.svg" alt="Ferramentas" />
					<figcaption class="legenda__icones__trabalhamos">Personalizamos o seu veiculo conforme o pedido </figcaption>
				</figure>
			</div>
			<div class="atividade">
				<figure class="figure-container">
					<img src="assets/img/icone-carro-novo.svg" alt="Carro novo" />
					<figcaption class="legenda__icones__trabalhamos">O veículo está pronto para buscá-lo</figcaption>
				</figure>
			</div>
		</div>

		<!--COMO TRABALHAMOS MOBILE-->
		<div class="trabalhamos__mobile">
			<div class="linha__atividade">
				<div class="atividade">
					<figure class="figure-container">
						<img src="assets/img/icone-carro.svg" alt="Carro" />
						<figcaption class="legenda__icones__trabalhamos">Recebemos seu veículo e pedido.</figcaption>
					</figure>
				</div>
				<div class="atividade">
					<figure class="figure-container">
						<img src="assets/img/icone-ferramentas.svg" alt="Ferramentas" />
						<figcaption class="legenda__icones__trabalhamos">Personalizamos o seu veiculo</figcaption>
					</figure>
				</div>
			</div>
			<div class="linha__atividade">
				<div class="atividade">
					<figure class="figure-container">
						<img src="assets/img/icone-analisar.svg" alt="Analisar" />
						<figcaption class="legenda__icones__trabalhamos">Analisamos possíveis irregularidades</figcaption>
					</figure>
				</div>
				<div class="atividade">
					<figure class="figure-container">
						<img src="assets/img/icone-carro-novo.svg" alt="Carro novo" />
						<figcaption class="legenda__icones__trabalhamos">O veículo está pronto para buscá-lo</figcaption>
					</figure>
				</div>
			</div>
		</div>

		<!--RESTRIÇÕES E LIMITES-->
		<div class="title">
			<h2>Restrições e Limites</h2>
			<p class="desc__subtitle">Nessa área são mostradas as restrições e os limites impostos por lei na hora de personalizar o seu veículo</p>
		</div>

		<div class="pai__restricao">
			<div class="linha__restricao">
				<div class="restricao">
					<div class="titulo__restricao">
						<img class="img__topico__restricao" src="assets/img/icone-circulo.svg" alt="Tópico">
						<h3 class="h3__restricao">Pneu</h3>
					</div>
					<p class="desc__restricao">Aumento ou diminuição do diâmetro externo do conjunto pneu/roda</p>
				</div>
				<div class="restricao restricao__direita">
					<div class="titulo__restricao">
						<img class="img__topico__restricao" src="assets/img/icone-circulo.svg" alt="Tópico">
						<h3 class="h3__restricao">Suspensão</h3>
					</div>
					<p class="desc__restricao">A altura mínima permitida para a circulação deve ser maior ou igual a 10cm.</p>
				</div>
			</div>

			<div class="linha__restricao">
				<div class="restricao">
					<div class="titulo__restricao">
						<img class="img__topico__restricao" src="assets/img/icone-circulo.svg" alt="Tópico">
						<h3 class="h3__restricao">Envelopamento ou Pintura</h3>
					</div>
					<p class="desc__restricao">Proibido alterar área superior a 50% do veículo. Modificações em veículos devem ser precedidas de autorização da autoridade.</p>
				</div>
				<div class="restricao restricao__direita">
					<div class="titulo__restricao">
						<img class="img__topico__restricao" src="assets/img/icone-circulo.svg" alt="Tópico">
						<h3 class="h3__restricao">Faróis Led</h3>
					</div>
					<p class="desc__restricao">É proibida a substituição de lâmpadas dos sistemas de iluminação ou sinalização de veículos por outras que não seja original do fabricante.</p>
				</div>
			</div>

			<div class="linha__restricao">
				<div class="restricao">
					<div class="titulo__restricao">
						<img class="img__topico__restricao" src="assets/img/icone-circulo.svg" alt="Tópico">
						<h3 class="h3__restricao"> Insulfilme</h3>
					</div>
					<p class="desc__restricao">A transmissão luminosa por meio do vidro dianteiro não deve ser inferior a 75% e deve ser incolor, já vidros laterais 70%.</p>
				</div>
				<div class="restricao restricao__direita">
					<div class="titulo__restricao">
						<img class="img__topico__restricao" src="assets/img/icone-circulo.svg" alt="Tópico">
						<h3 class="h3__restricao">Faróis de Xenon</h3>
					</div>
					<p class="desc__restricao">De acordo com o Artigo 8 da Resolução n° 292 do Contran, fica proibido a implantação de faróis de xénon.</p>
				</div>
			</div>

			<div class="linha__restricao">
				<div class="restricao">
					<div class="titulo__restricao">
						<img class="img__topico__restricao" src="assets/img/icone-circulo.svg" alt="Tópico">
						<h3 class="h3__restricao">Sons e DVD</h3>
					</div>
					<p class="desc__restricao">É proibido veículos com som acima de 80 decibéis (medidos a 7 metros).</p>
				</div>
				<div class="restricao restricao__direita">
					<div class="titulo__restricao">
						<img class="img__topico__restricao" src="assets/img/icone-circulo.svg" alt="Tópico">
						<h3 class="h3__restricao">Motor</h3>
					</div>
					<p class="desc__restricao">A potência original do motor apenas pode ser aumentada em 10%.</p>
				</div>
			</div>

			<div class="linha__restricao">
				<div class="restricao">
					<div class="titulo__restricao">
						<img class="img__topico__restricao" src="assets/img/icone-circulo.svg" alt="Tópico">
						<h3 class="h3__restricao">Chassis e Monobloco</h3>
					</div>
					<p class="desc__restricao">É proibido a alteração nos chassis e monobloco dos veículos.</p>
				</div>
				<div class="restricao restricao__direita">
					<div class="titulo__restricao">
						<img class="img__topico__restricao" src="assets/img/icone-circulo.svg" alt="Tópico">
						<h3 class="h3__restricao">Combustível</h3>
					</div>
					<p class="desc__restricao">É concedido trocar o sistema (gasolina etanol ou bicombustível) por gás natural veicular (GNV), mas o kit deve seguir as regulamentações do Inmetro.</p>
				</div>
			</div>
		</div>


	</main>

	<footer>
		<div class="row" id="correcao">

			<div class="col alinhar">
				<div> <img width="100px" src="assets/img/logo-turnmotors.png" loading="lazy"> </div>
				<h4 class="tite">Turn Motors</h4>
				<p id="slogan">Vem conosco. Olha o ronco!</p>
				<p id="copy">&copy;Turn Motors, 2023</p>
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
							<li> <a href="pags/desenvolvedores.php">Desenvolvedores</a> </li>

						</ul>
					</div>
				</div>
			</div>
			<div class="col none1">
				<div>
					<div class="midias-sociais">
						<a target="_blank" href="https://www.instagram.com/turn_motors/"><img class="rede-social" src="assets/img/icone-instagram.svg" alt="Logo instagram"></a>
					</div>
					<div class="midias-sociais">
						<a target="_blank" href="https://twitter.com/MotorsTurn"><img class="rede-social" src="assets/img/icone-twitter.svg" alt="Logo Twitter"></a>
					</div>
				</div>
			</div>
			<div class="col block">
				<div class="midias-sociais1">
					<div class="midia midia1">
						<a target="_blank" href="https://www.instagram.com/turn_motors/"><img class="rede-social" src="assets/img/icone-instagram.svg" alt="Logo instagram"></a>
					</div>
					<div class="midia">
						<a target="_blank" href="https://twitter.com/MotorsTurn"><img class="rede-social" src="assets/img/icone-twitter.svg" alt="Logo Twitter"></a>
					</div>
				</div>
			</div>
		</div>
	</footer>


</body>

</html>