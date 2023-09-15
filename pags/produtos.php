<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Produtos</title>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


	<link rel="stylesheet" href="../assets/css/estilos-importantes.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/produtos.min.css">

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

				<!--PRIMEIRA LINHA-->
				<div class="linha">
					<div class="coluna">
						<a href="produtos-categoria.php?categoria=PC">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-pneu.jpg" alt="Pneus de Carro">
						</div>
						</a>
					</div>
					<div class="coluna">
						<a href="produtos-categoria.php?categoria=SME">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-som-midia-eletronicos.jpg" alt="Som, Multimídia e Eletrônicos">
						</div>
						</a>
					</div>
					<div class="coluna">
						<a href="produtos-categoria.php?categoria=AA">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-acessorio-automoveis.jpg" alt="Acessórios para Automóveis">
						</div>
						</a>
					</div>
					<div class="coluna">
						<a href="produtos-categoria.php?categoria=CA">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-cuidado-automotivo.jpg" alt="Cuidados Automotivos">
						</div>
						</a>
					</div>
				</div>

				<!--SEGUNDA LINHA-->
				<div class="linha">
					<div class="coluna">
						<a href="produtos-categoria.php?categoria=OF">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-oleo-fluido.jpg" alt="Óleos e Fluidos">
						</div>
						</a>
					</div>
					<div class="coluna">
						<a href="produtos-categoria.php?categoria=BA">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-bateria.jpg" alt="Baterias e Acessórios">
						</div>
						</a>
					</div>
					<div class="coluna">
						<a href="produtos-categoria.php?categoria=RT">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-reboque-transporte.jpg" alt="Reboque e Transporte">
						</div>
						</a>
					</div>
					<div class="coluna">
						<a href="produtos-categoria.php?categoria=PA">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-pecas-automoveis.jpg" alt="Peças para Automóveis">
						</div>
						</a>
					</div>
				</div>

				<!--TERCEIRA LINHA-->
				<div class="linha">
					<div class="coluna">
						<a href="produtos-categoria.php?categoria=EP">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-equipamentos-protecao.jpg" alt="Equipamentos de Proteção">
						</div>
						</a>
					</div>
					<div class="coluna">
						<a href="produtos-categoria.php?categoria=PM">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-pneu-moto.jpg" alt="Pneus de Moto">
						</div>
						</a>
					</div>
					<div class="coluna">
						<a href="produtos-categoria.php?categoria=APM">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-acessorios-motos.jpg" alt="Acessórios e Peças para Motos">
						</div>
						</a>
					</div>
					<div class="coluna">
						<a href="produtos-categoria.php?categoria=FE">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-ferramentas.jpg" alt="Ferramentas e Equipamentos">
						</div>
						</a>
					</div>
				</div>

			</div>

			<!--TELA MEDIA-->
			<div class="container__medio__categorias">
				<!--PRIMEIRA LINHA-->
				<div class="linha">
					<div class="coluna">
						<a href="produtos-categoria.php?categoria=PC">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-pneu.jpg" alt="Pneus de Carro">
						</div>
						</a>
					</div>
					<div class="coluna">
						<a href="produtos-categoria.php?categoria=SME">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-som-midia-eletronicos.jpg" alt="Som, Multimídia e Eletrônicos">
						</div>
						</a>
					</div>
					<div class="coluna">
						<a href="produtos-categoria.php?categoria=AA">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-acessorio-automoveis.jpg" alt="Acessórios para Automóveis">
						</div>
						</a>
					</div>
				</div>

				<!--SEGUNDA LINHA-->
				<div class="linha">
					<div class="coluna">
						<a href="produtos-categoria.php?categoria=CA">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-cuidado-automotivo.jpg" alt="Cuidados Automotivos">
						</div>
						</a>
					</div>
					<div class="coluna">
						<a href="produtos-categoria.php?categoria=OF">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-oleo-fluido.jpg" alt="Óleos e Fluidos">
						</div>
						</a>
					</div>
					<div class="coluna">
						<a href="produtos-categoria.php?categoria=BA">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-bateria.jpg" alt="Baterias e Acessórios">
						</div>
						</a>
					</div>
				</div>

				<!--TERCEIRA LINHA-->
				<div class="linha">
					<div class="coluna">
						<a href="produtos-categoria.php?categoria=RT">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-reboque-transporte.jpg" alt="Reboque e Transporte">
						</div>
						</a>
					</div>
					<div class="coluna">
						<a href="produtos-categoria.php?categoria=PA">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-pecas-automoveis.jpg" alt="Peças para Automóveis">
						</div>
						</a>
					</div>
					<div class="coluna">
						<a href="produtos-categoria.php?categoria=EP">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-equipamentos-protecao.jpg" alt="Equipamentos de Proteção">
						</div>
						</a>
					</div>
				</div>

				<!--QUARTA LINHA-->
				<div class="linha">
					<div class="coluna">
						<a href="produtos-categoria.php?categoria=PM">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-pneu-moto.jpg" alt="Pneus de Moto">
						</div>
						</a>
					</div>
					<div class="coluna">
						<a href="produtos-categoria.php?categoria=APM">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-acessorios-motos.jpg" alt="Acessórios e Peças para Motos">
						</div>
						</a>
					</div>
					<div class="coluna">
						<a href="produtos-categoria.php?categoria=FE">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-ferramentas.jpg" alt="Ferramentas e Equipamentos">
						</div>
						</a>
					</div>
				</div>
			</div>

			<!--TELA PEQUENA-->
			<div class="container__pequeno__categorias">
				<!--PRIMEIRA LINHA-->
				<div class="linha">
					<div class="coluna">
						<a href="produtos-categoria.php?categoria=PC">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-pneu.jpg" alt="Pneus de Carro">
						</div>
						</a>
					</div>
					<div class="coluna">
						<a href="produtos-categoria.php?categoria=SME">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-som-midia-eletronicos.jpg" alt="Som, Multimídia e Eletrônicos">
						</div>
						</a>
					</div>
				</div>

				<!--SEGUNDA LINHA-->
				<div class="linha">
					<div class="coluna">
						<a href="produtos-categoria.php?categoria=AA">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-acessorio-automoveis.jpg" alt="Acessórios para Automóveis">
						</div>
						</a>
					</div>
					<div class="coluna">
						<a href="produtos-categoria.php?categoria=CA">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-cuidado-automotivo.jpg" alt="Cuidados Automotivos">
						</div>
						</a>
					</div>
				</div>

				<!--TERCEIRA LINHA-->
				<div class="linha">
					<div class="coluna">
						<a href="produtos-categoria.php?categoria=OF">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-oleo-fluido.jpg" alt="Óleos e Fluidos">
						</div>
						</a>
					</div>
					<div class="coluna">
						<a href="produtos-categoria.php?categoria=BA">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-bateria.jpg" alt="Baterias e Acessórios">
						</div>
						</a>
					</div>
				</div>

				<!--QUARTA LINHA-->
				<div class="linha">
					<div class="coluna">
						<a href="produtos-categoria.php?categoria=RT">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-reboque-transporte.jpg" alt="Reboque e Transporte">
						</div>
						</a>
					</div>
					<div class="coluna">
						<a href="produtos-categoria.php?categoria=PA">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-pecas-automoveis.jpg" alt="Peças para Automóveis">
						</div>
						</a>
					</div>
				</div>

				<!--QUINTA LINHA-->
				<div class="linha">
					<div class="coluna">
						<a href="produtos-categoria.php?categoria=EP">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-equipamentos-protecao.jpg" alt="Equipamentos de Proteção">
						</div>
						</a>
					</div>
					<div class="coluna">
						<a href="produtos-categoria.php?categoria=PM">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-pneu-moto.jpg" alt="Pneus de Moto">
						</div>
						</a>
					</div>
				</div>

				<!--SEXTA LINHA-->
				<div class="linha">
					<div class="coluna">
						<a href="produtos-categoria.php?categoria=APM">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-acessorios-motos.jpg" alt="Acessórios e Peças para Motos">
						</div>
						</a>
					</div>
					<div class="coluna">
						<a href="produtos-categoria.php?categoria=FE">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-ferramentas.jpg" alt="Ferramentas e Equipamentos">
						</div>
						</a>
					</div>
				</div>
			</div>

			<!--MOBILE-->
			<div class="container__mobile__categorias">
				<!--PRIMEIRA LINHA-->
				<div class="linha">
					<div class="coluna">
						<a href="produtos-categoria.php?categoria=PC">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-pneu.jpg" alt="Pneus de Carro">
						</div>
						</a>
					</div>
				</div>

				<!--SEGUNDA LINHA-->
				<div class="linha">
					<div class="coluna">
						<a href="produtos-categoria.php?categoria=SME">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-som-midia-eletronicos.jpg" alt="Som, Multimídia e Eletrônicos">
						</div>
						</a>
					</div>
				</div>

				<!--TERCEIRA LINHA-->
				<div class="linha">
					<div class="coluna">
						<a href="produtos-categoria.php?categoria=AA">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-acessorio-automoveis.jpg" alt="Acessórios para Automóveis">
						</div>
						</a>
					</div>
				</div>

				<!--QUARTA LINHA-->
				<div class="linha">
					<div class="coluna">
						<a href="produtos-categoria.php?categoria=CA">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-cuidado-automotivo.jpg" alt="Cuidados Automotivos">
						</div>
						</a>
					</div>
				</div>

				<!--QUINTA LINHA-->
				<div class="linha">
					<div class="coluna">
						<a href="produtos-categoria.php?categoria=OF">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-oleo-fluido.jpg" alt="Óleos e Fluidos">
						</div>
						</a>
					</div>
				</div>

				<!--SEXTA LINHA-->
				<div class="linha">
					<div class="coluna">
						<a href="produtos-categoria.php?categoria=BA">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-bateria.jpg" alt="Baterias e Acessórios">
						</div>
						</a>
					</div>
				</div>

				<!--SETIMA LINHA-->
				<div class="linha">
					<div class="coluna">
						<a href="produtos-categoria.php?categoria=RT">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-reboque-transporte.jpg" alt="Reboque e Transporte">
						</div>
						</a>
					</div>
				</div>

				<!--OITAVA LINHA-->
				<div class="linha">
					<div class="coluna">
						<a href="produtos-categoria.php?categoria=PA">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-pecas-automoveis.jpg" alt="Peças para Automóveis">
						</div>
						</a>
					</div>
				</div>

				<!--NONA LINHA-->
				<div class="linha">
					<div class="coluna">
						<a href="produtos-categoria.php?categoria=EP">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-equipamentos-protecao.jpg" alt="Equipamentos de Proteção">
						</div>
						</a>
					</div>
				</div>

				<!--DECIMA LINHA-->
				<div class="linha">
					<div class="coluna">
						<a href="produtos-categoria.php?categoria=PM">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-pneu-moto.jpg" alt="Pneus de Moto">
						</div>
						</a>
					</div>
				</div>

				<!--11º LINHA-->
				<div class="linha">
					<div class="coluna">
						<a href="produtos-categoria.php?categoria=APM">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-acessorios-motos.jpg" alt="Acessórios e Peças para Motos">
						</div>
						</a>
					</div>
				</div>

				<!--12º LINHA-->
				<div class="linha">
					<div class="coluna">
						<a href="produtos-categoria.php?categoria=FE">
						<div class="card">
							<img class="categoria__img" src="../assets/img/categoria-ferramentas.jpg" alt="Ferramentas e Equipamentos">
						</div>
						</a>
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