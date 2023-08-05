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
				<h2 class="banner__titulo">Olá, &lt;nome do perfil&gt;!</h2>
				<img src="../assets/img/perfilPic.svg" class="banner__imagem">
			</div>

			<div class="informacoes-cadastro">

				<div class="informacoes__imagem-perfil">
					<img src="../assets/img/iconePerfil.svg" class="imagem-perfil__imagem">
				</div>
				<form action="" method="post" class="informacoes__formulario">
					<input type="text" name="nome" id="nome" value="<nome do perfil>" disabled class="formulario__campo" />
					<input type="email" name="email" id="email" value="<email>" disabled class="formulario__campo" />
					<input type="tel" name="telefone" id="telefone" value="<número celular>" disabled class="formulario__campo" />
					<input type="date" name="dataNasc" id="dataNasc" disabled class="formulario__campo" />
					<input type="text" name="cpf" id="cpf" value="<cpf>" disabled class="formulario__campo" />
					<input type="text" name="plano" id="plano" value="Plano: <tipo>" disabled class="formulario__campo" />
					<input type="password" name="senha" id="senha" value="<senha>" disabled class="formulario__campo" />
					<button type="submit" class="formulario__botao" value="beneficio">
						Ver Benefícios
					</button>
					<button type="submit" class="formulario__botao" value="troca">
						Trocar o Plano
					</button>
					<button type="submit" class="formulario__botao" value="editar">
						Editar Perfil
					</button>
				</form>
			</div>
		</section>
	</main>

	<?php
	require_once('../assets/components/footer.php');
	?>
</body>

</html>