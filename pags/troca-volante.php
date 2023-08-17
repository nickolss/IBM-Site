<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Turn Motors | Troca</title>

	<link rel="stylesheet" href="../assets/css/pagamentoTroca.min.css">
	<link rel="stylesheet" href="../assets/css/estilos-importantes.css">
	<script type="text/javascript" src="../assets/js/java2.js" defer></script>

	<link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">
	<script type="text/javascript" src="../assets/js/java.js" defer></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="../assets/js/js-bootstrap/bootstrap.bundle.min.js"></script>
</head>

<body id="container__body">
	<?php
	require_once('../assets/components/header.php');
	?>

	<main>
		<div class="container">
			<div class="esquerda__img">
				<img class="produto__troca" src="../assets/img/trocaCapaVolante.svg" alt="Capa de Volante">
			</div>
			<div class="direita__info">
				<h1>Capa de Volante</h1>
				<h2>Pontos: x</h2>
				<h3>Sobre esse item:</h3>
				<p class="troca__info"> Proteção Para Volante Otimizada e Personalizada. <br> Capa de volante não substitui a forração original,foi desenvolvido para proteção e segurança, priorizando a qualidade e o bem-estar do usuário.</p>

				<!--ESSE BOTAO TAMBEM TERÁ QUE RETIRAR OS PONTOS DO PERFIL DE ACORDO COM OS PONTOS DO PRODUTO-->
				<form action="trocaFeita.php" method="POST">
					<button class="botao__troca" type="submit">Trocar com meus Pontos</button>
				</form>
			</div>
		</div>
	</main>

	<?php
	require_once('../assets/components/footer.php');
	?>

</body>

</html>