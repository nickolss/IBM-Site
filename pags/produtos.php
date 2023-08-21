<?php
    session_start();//cookie
    if (!isset($_SESSION['carrinho'])) {
        $_SESSION['carrinho'] = array(); // Inicializar o carrinho como um array vazio
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
	<link rel="stylesheet" type="text/css" href="../assets/css/produtos.min.css">
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

	<main>
		<div class="container">

			<div class="titles">
				<h1 class="main__title">Produtos</h1>
				<h2 class="sub__title">Navegue por categorias</h2>
			</div>
			
			<!--TELA GRANDE-->
			<div class="container__grande__categorias">
				<?php
                    $items1 = array(['id'=>'1','nome'=>'Pneu','imagem'=>'../assets/img/categoria-pneu.jpg', 'preco'=>'200'],
                    ['id'=>'2', 'nome'=>'Som','imagem'=>'../assets/img/categoria-som-midia-eletronicos.jpg', 'preco'=>'100'],
                    ['id'=>'3', 'nome'=>'Acessório','imagem'=>'../assets/img/categoria-acessorio-automoveis.jpg', 'preco'=>'400'],
                    ['id'=>'4','nome'=>'Cuidados','imagem'=>'../assets/img/categoria-cuidado-automotivo.jpg', 'preco'=>'100'],
                    ['id'=>'5','nome'=>'Óleos','imagem'=>'../assets/img/categoria-oleo-fluido.jpg', 'preco'=>'100'],
                	['id'=>'6','nome'=>'Baterias','imagem'=>'../assets/img/categoria-bateria.jpg', 'preco'=>'100']);

					$items2 = array(['id'=>'7','nome'=>'reboque','imagem'=>'../assets/img/categoria-reboque-transporte.jpg', 'preco'=>'100'],
					['id'=>'8','nome'=>'peça','imagem'=>'../assets/img/categoria-pecas-automoveis.jpg', 'preco'=>'100'],
					['id'=>'9','nome'=>'proteção','imagem'=>'../assets/img/categoria-equipamentos-protecao.jpg', 'preco'=>'100'],
					['id'=>'10','nome'=>'pneu','imagem'=>'../assets/img/categoria-pneu-moto.jpg', 'preco'=>'100'],
					['id'=>'11','nome'=>'acessório','imagem'=>'../assets/img/categoria-acessorios-motos.jpg', 'preco'=>'100'],
					['id'=>'12','nome'=>'ferramentas','imagem'=>'../assets/img/categoria-ferramentas.jpg', 'preco'=>'100']);
					$items = array_merge($items1, $items2);
				?>

				<div class="container__produtos">
					<!--PRIMEIRA LINHA-->
					<div class="linha">
						<?php foreach ($items1 as $item) { ?>
						<br>
						<div class="coluna">
							<div class="card">    
								<img class="categoria__img" src="<?php echo $item['imagem'] ?>" alt="">
								<div class="botoes">
									<div class="produtos">
										<p class="preco-produto">Preço: R$<?php echo $item['preco'] ?></p>
										<p><a href="?adicionar=<?php echo $item['id'] ?>">Adicionar ao carrinho</a>
										<?php if (isset($_SESSION['carrinho'][$item['id']])) { ?>
										<a href="?remover=<?php echo $item['id'] ?>">Remover do carrinho</a></p>
										<?php } else { ?>
										<span href="produtos.php"></span>
										<?php } ?>
									</div>    
								</div>    
							</div>
						</div>
						<?php } ?> 
					</div>
				</div> 
				<hr>
				<div class="container-produtos">
					<!--SEGUNDA LINHA-->
					<div class="linha">
						<?php foreach ($items2 as $item) { ?>
						<br>
						<div class="coluna">
							<div class="card">    
								<img class="categoria__img" src="<?php echo $item['imagem'] ?>" alt="">
								<div class="botoes">
									<div class="produtos">
										<p class="preco-produto">Preço: R$<?php echo $item['preco'] ?></p>
										<p><a href="?adicionar=<?php echo $item['id'] ?>">Adicionar ao carrinho</a>
										<?php if (isset($_SESSION['carrinho'][$item['id']])) { ?>
										<a href="?remover=<?php echo $item['id'] ?>">Remover do carrinho</a></p>
										<?php } else { ?>
										<span href="produtos.php"></span>
										<?php } ?>
									</div>    
								</div>    
							</div>
						</div>
						<?php } ?> 
					</div>
				</div> 
				<?php
					if(isset($_GET['adicionar'])){
						//Adicionando ao carrinho
						$id = (int) $_GET['adicionar'];
						
						//$session = $_SESSION['carrinho']; 
						// print_r ($session);
						// print_r ($items);

						$index = array_search($id, array_column($items, 'id'));
						
							if(array_key_exists($id, $_SESSION['carrinho'])){
								$_SESSION['carrinho'][$id]['quantidade']++;
								echo '<script>window.location.href = "produtos.php";</script>';
								exit();
							} else {
								$_SESSION['carrinho'][$id] = array('index' => $index, 'imagem' => $items[$index]['imagem'], 'quantidade'=>1, 'id'=> $id,'nome'=>$items[$index]['nome'], 'preco'=>$items[$index]['preco']);
								//header("Location: index.php"); // Redireciona de volta ao carrinho após a remoção
								echo '<script>window.location.href = "produtos.php";</script>';
								exit();
							}
							//Adicionado ao carrinho
					}
					if(isset($_GET['remover'])){
						$id = (int) $_GET['remover'];
						if(isset($_SESSION['carrinho'][$id])){
							unset($_SESSION['carrinho'][$id]);
							//header("Location: index.php"); // Redireciona de volta ao carrinho após a remoção
							echo '<script>window.location.href = "produtos.php";</script>';
							exit();
						}
					}

					function getIndexById($array, $id) {
						foreach ($array as $index => $object) {
							if ($object['id'] === $id) {
								return $index; // Return the index if ID matches
							}
						}
						return 0; // Return -1 if ID is not found in the array
					}
				?>

			</div>

			<!--TELA MEDIA-->
			<div class="container__medio__categorias">
				<!--PRIMEIRA LINHA-->
				<div class="linha">
					<div class="coluna">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-pneu.jpg" alt="Pneus de Carro">
						</div>
					</div>
					<div class="coluna">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-som-midia-eletronicos.jpg" alt="Som, Multimídia e Eletrônicos">
						</div>
					</div>
					<div class="coluna">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-acessorio-automoveis.jpg" alt="Acessórios para Automóveis">
						</div>
					</div>
				</div>

				<!--SEGUNDA LINHA-->
				<div class="linha">
					<div class="coluna">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-cuidado-automotivo.jpg" alt="Cuidados Automotivos">
						</div>
					</div>
					<div class="coluna">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-oleo-fluido.jpg" alt="Óleos e Fluidos">
						</div>
					</div>
					<div class="coluna">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-bateria.jpg" alt="Baterias e Acessórios">
						</div>
					</div>
				</div>

				<!--TERCEIRA LINHA-->
				<div class="linha">
					<div class="coluna">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-reboque-transporte.jpg" alt="Reboque e Transporte">
						</div>
					</div>
					<div class="coluna">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-pecas-automoveis.jpg" alt="Peças para Automóveis">
						</div>
					</div>
					<div class="coluna">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-equipamentos-protecao.jpg" alt="Equipamentos de Proteção">
						</div>
					</div>
				</div>

				<!--QUARTA LINHA-->
				<div class="linha">
					<div class="coluna">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-pneu-moto.jpg" alt="Pneus de Moto">
						</div>
					</div>
					<div class="coluna">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-acessorios-motos.jpg" alt="Acessórios e Peças para Motos">
						</div>
					</div>
					<div class="coluna">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-ferramentas.jpg" alt="Ferramentas e Equipamentos">
						</div>
					</div>
				</div>
			</div>

			<!--TELA PEQUENA-->
			<div class="container__pequeno__categorias">
				<!--PRIMEIRA LINHA-->
				<div class="linha">
					<div class="coluna">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-pneu.jpg" alt="Pneus de Carro">
						</div>
					</div>
					<div class="coluna">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-som-midia-eletronicos.jpg" alt="Som, Multimídia e Eletrônicos">
						</div>
					</div>
				</div>

				<!--SEGUNDA LINHA-->
				<div class="linha">
					<div class="coluna">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-acessorio-automoveis.jpg" alt="Acessórios para Automóveis">
						</div>
					</div>
					<div class="coluna">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-cuidado-automotivo.jpg" alt="Cuidados Automotivos">
						</div>
					</div>
				</div>

				<!--TERCEIRA LINHA-->
				<div class="linha">
					<div class="coluna">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-oleo-fluido.jpg" alt="Óleos e Fluidos">
						</div>
					</div>
					<div class="coluna">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-bateria.jpg" alt="Baterias e Acessórios">
						</div>
					</div>
				</div>

				<!--QUARTA LINHA-->
				<div class="linha">
					<div class="coluna">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-reboque-transporte.jpg" alt="Reboque e Transporte">
						</div>
					</div>
					<div class="coluna">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-pecas-automoveis.jpg" alt="Peças para Automóveis">
						</div>
					</div>
				</div>

				<!--QUINTA LINHA-->
				<div class="linha">
					<div class="coluna">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-equipamentos-protecao.jpg" alt="Equipamentos de Proteção">
						</div>
					</div>
					<div class="coluna">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-pneu-moto.jpg" alt="Pneus de Moto">
						</div>
					</div>
				</div>

				<!--SEXTA LINHA-->
				<div class="linha">
					<div class="coluna">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-acessorios-motos.jpg" alt="Acessórios e Peças para Motos">
						</div>
					</div>
					<div class="coluna">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-ferramentas.jpg" alt="Ferramentas e Equipamentos">
						</div>
					</div>
				</div>
			</div>

			<!--MOBILE-->
			<div class="container__mobile__categorias">
				<!--PRIMEIRA LINHA-->
				<div class="linha">
					<div class="coluna">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-pneu.jpg" alt="Pneus de Carro">
						</div>
					</div>
				</div>

				<!--SEGUNDA LINHA-->
				<div class="linha">
					<div class="coluna">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-som-midia-eletronicos.jpg" alt="Som, Multimídia e Eletrônicos">
						</div>
					</div>
				</div>

				<!--TERCEIRA LINHA-->
				<div class="linha">
					<div class="coluna">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-acessorio-automoveis.jpg" alt="Acessórios para Automóveis">
						</div>
					</div>
				</div>

				<!--QUARTA LINHA-->
				<div class="linha">
					<div class="coluna">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-cuidado-automotivo.jpg" alt="Cuidados Automotivos">
						</div>
					</div>
				</div>

				<!--QUINTA LINHA-->
				<div class="linha">
					<div class="coluna">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-oleo-fluido.jpg" alt="Óleos e Fluidos">
						</div>
					</div>
				</div>

				<!--SEXTA LINHA-->
				<div class="linha">
					<div class="coluna">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-bateria.jpg" alt="Baterias e Acessórios">
						</div>
					</div>
				</div>

				<!--SETIMA LINHA-->
				<div class="linha">
					<div class="coluna">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-reboque-transporte.jpg" alt="Reboque e Transporte">
						</div>
					</div>
				</div>

				<!--OITAVA LINHA-->
				<div class="linha">
					<div class="coluna">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-pecas-automoveis.jpg" alt="Peças para Automóveis">
						</div>
					</div>
				</div>

				<!--NONA LINHA-->
				<div class="linha">
					<div class="coluna">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-equipamentos-protecao.jpg" alt="Equipamentos de Proteção">
						</div>
					</div>
				</div>

				<!--DECIMA LINHA-->
				<div class="linha">
					<div class="coluna">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-pneu-moto.jpg" alt="Pneus de Moto">
						</div>
					</div>
				</div>

				<!--11º LINHA-->
				<div class="linha">
					<div class="coluna">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-acessorios-motos.jpg" alt="Acessórios e Peças para Motos">
						</div>
					</div>
				</div>

				<!--12º LINHA-->
				<div class="linha">
					<div class="coluna">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-ferramentas.jpg" alt="Ferramentas e Equipamentos">
						</div>
					</div>
				</div>
			</div>

		</div>
	</main>


	<br>
	<br>

	<?php
	require_once('../assets/components/footer.php');
	?>

</body>

</html>