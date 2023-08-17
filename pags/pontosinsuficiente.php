<!DOCTYPE html>
<html lang="pt-BR">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Turn Motors | Vagas</title>

	<!--ARQUIVOS BOOTSTRAP-->
	<link rel="stylesheet" href="../assets/css/css-bootstrap/bootstrap.min.css">
	<script src="../assets/js/js-bootstrap/bootstrap.bundle.min.js"></script>

	<link rel="stylesheet" href="../assets/css/estilos-importantes.css">
	<link rel="stylesheet" href="../assets/css/pontosinsuficiente.min.css">


	<link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script type="text/javascript" src="../assets/js/java.js" defer></script>
</head>

<body>

	<?php
	require_once('../assets/components/header.php');
	?>


	<main>
		<div class="container">
			<div class="div-main">
				<div class="esquerda-texto">
					<h1 id="titulo">Oops!</h1>
					<h2>Pontos insuficientes</h2>
					<a style="text-decoration: none; color: white;" id="botaoVoltar" href="#">Voltar</a>
				</div>
				<div class="direita-img">
					<img id="img" src="../assets/img/pontoInsuficiente.svg" alt="Homem triste ao computador">
				</div>
			</div>
		</div>
		<br>
	</main>

	<?php
	require_once('../assets/components/footer.php');
	?>




</body>

</html