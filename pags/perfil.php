<?php 
	// Importaça dos arquivos
	require_once('../assets/scripts/conexao.php');
	require_once('../assets/scripts/iniciarSessao.php');
	require_once('../assets/scripts/consultaCliente.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Turn Motors | Meu perfil</title>

	<!-- icones -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- Arquivos do Bootstrap -->
	<link rel="stylesheet" href="../assets/css/css-bootstrap/bootstrap.min.css">
	<script src="../assets/js/js-bootstrap/bootstrap.bundle.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

	<link rel="stylesheet" href="../assets/css/estilos-importantes.css" />
	<link rel="stylesheet" href="../assets/css/perfil.css">
	<link rel="stylesheet" href="../assets/css/trocarFoto.min.css">

	<link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon" />

	<script src="../assets/js/trocarFoto.js" defer></script>
</head>

<body>
	<?php
		//require_once('../assets/components/header.php');
		$id = (int)$_SESSION['id'];
		$queryCliente = "SELECT * FROM cliente WHERE id=$id";
		$stmt = $pdo->query($queryCliente);
		$user = $stmt->fetch(PDO::FETCH_ASSOC);
	?>

	<main class="principal">
		
		<section class="informacoes">
			<div class="banner">
				<h2 class="banner__titulo">Olá, <?= $_SESSION['nomeCliente'] ?>!</h2>
				<img src="../assets/img/perfilPic.svg" class="banner__imagem">
			</div>

			<div class="informacoes-cadastro">

				<form action="../assets/scripts/trocarFoto.php" enctype="multipart/form-data"  method="post" class="informacoes__formulario"> <!-- Formulário que utiliza o atributo enctype para enviar arquivos multipart/form-data -->

				<div class="upload">
					<img src="../assets/img/img-perfil/<?php echo $user['fotoPerfil']; ?>" id="image" id="image"> <!-- Exibe a imagem atual do usuário -->

					<div class="rightRound" id="upload">
					<input type="file" name="fileImg" id ="fileImg" accept=".jpg, .jpeg, .png"> <!-- Input de seleção de arquivo -->
					<i class="fa fa-camera"></i> <!-- Ícone de câmera -->
					</div>

					<div class="leftRound" id ="cancel" style="display: none;">
					<i class = "fa fa-times"></i> <!-- Ícone de cancelar-->
					</div>
					<div class="rightRound" id ="confirm" style="display: none;">
					<input type="submit"> <!-- Botão de envio do formulário -->
					<i class = "fa fa-check"></i> <!-- Ícone de confirmar -->
					</div>
				</div>

					<input type="text" name="nome" id="nome" value="<?= $_SESSION['nomeCliente'] ?>" disabled class="formulario__campo" />
					<input type="email" name="email" id="email" value="<?= $_SESSION['email'] ?>" disabled class="formulario__campo" />
					<input type="tel" name="telefone" id="telefone" value="<?= $_SESSION['telefone'] ?>" disabled class="formulario__campo" />
					<input type="date" name="dataNasc" id="dataNasc" disabled class="formulario__campo" value="<?= $_SESSION['dataNasc'] ?>"/>
					<input type="text" name="plano" id="plano" value="Plano: <?= $_SESSION['plano'] ?>" disabled class="formulario__campo" />
					<input type="password" name="senha" id="senha" disabled class="formulario__campo" value="******"/>
					<a href="../pags/beneficios.php" class="formulario__botao" value="beneficio">
						Ver Benefícios
					</a>
					<a href="#"  class="formulario__botao" value="troca">
						Trocar o Plano
					</a>
					<a href="perfil-editar.php" class="formulario__botao" value="editar">
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