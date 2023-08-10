<?php 
	require_once('../assets/scripts/iniciarSessao.php');
	require_once('../assets/scripts/consultaCliente.php')
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Turn Motors | Meu perfil</title>

	<!-- Arquivos do Bootstrap -->
	<link rel="stylesheet" href="../assets/css/css-bootstrap/bootstrap.min.css">
	<script src="../assets/js/js-bootstrap/bootstrap.bundle.min.js"></script>

	<link rel="stylesheet" href="../assets/css/estilos-importantes.css" />
	<link rel="stylesheet" href="../assets/css/perfil.css">
	<link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon" />
</head>

<body>
	<?php
	require_once('../assets/components/header.php');
	?>

	<main class="principal">
		<section class="informacoes">
			<div class="banner">
				<h2 class="banner__titulo">Olá, <?= $_SESSION['nomeCliente'] ?>!</h2>
				<img src="../assets/img/perfilPic.svg" class="banner__imagem">
			</div>

			<div class="informacoes-cadastro">

				<div class="informacoes__imagem-perfil">
					<img src="../assets/img/iconePerfil.svg" class="imagem-perfil__imagem">
				</div>
				<form action="" method="post" class="informacoes__formulario">
					<input type="text" name="nome" id="nome" value="<?= $_SESSION['nomeCliente'] ?>" disabled class="formulario__campo" />
					<input type="email" name="email" id="email" value="<?= $_SESSION['email'] ?>" disabled class="formulario__campo" />
					<input type="tel" name="telefone" id="telefone" value="<?= $_SESSION['telefone'] ?>" disabled class="formulario__campo" />
					<input type="date" name="dataNasc" id="dataNasc" disabled class="formulario__campo" value="<?= $_SESSION['dataNasc'] ?>"/>
					<input type="text" name="cpf" id="cpf" value="<?= $_SESSION['cpf'] ?>" disabled class="formulario__campo" />
					<input type="text" name="plano" id="plano" value="Plano: <?= $_SESSION['plano'] ?>" disabled class="formulario__campo" />
					<input type="password" name="senha" id="senha" disabled class="formulario__campo" value="******"/>
					<a href="../pags/beneficios.php" class="formulario__botao" value="beneficio">
						Ver Benefícios
					</a>
					<a href="#"  class="formulario__botao" value="troca">
						Trocar o Plano
					</a>
					<a href="#" class="formulario__botao" value="editar">
						Editar Perfil
					</a>
					<a href="../assets/scripts/logout.php" class="formulario__botao" value="editar">
						Sair
					</a>
				</form>
			</div>
		</section>
	</main>

	<?php
	require_once('../assets/components/footer.php');
	?>
</body>

</html>