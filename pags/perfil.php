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
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

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

<body id="container__body">
	<?php
		require_once('../assets/components/header.php');
		$id = (int)$_SESSION['id'];
		$queryCliente = "SELECT * FROM cliente WHERE id=$id";
		$stmt = $pdo->query($queryCliente);
		$user = $stmt->fetch(PDO::FETCH_ASSOC);
	?>

	<main>
		
		
		<!--DESKTOP-->
		<div class="campos__perfil__pc  campos__perfil">

			<div class="opcoes__icones">
				<div class="meio-circulo__branco-top">⠀</div>
				<div class="icones__esquerda">
					<div class="icone__esquerda">
						<div class="legenda__icone__pc">
							Perfil
						</div>
						<img class="img__icon__esquerda" src="../assets/img/icone-perfil.svg" alt="Perfil">
					</div>
					<div class="icone__esquerda">
						<div class="legenda__icone__pc">
							Veículos
						</div>
						<img class="img__icon__esquerda" src="../assets/img/icone-carro.svg" alt="Veículos">
					</div>
					<div class="icone__esquerda">
						<div class="legenda__icone__pc">
							Compras
						</div>
						<img class="img__icon__esquerda" src="../assets/img/icone-carrinho.svg" alt="Compras">
					</div>
					<div class="icone__esquerda">
						<div class="legenda__icone__pc">
							Orçamentos
						</div>
						<img class="img__icon__esquerda" src="../assets/img/icone-porco-dinheiro.svg" alt="Orçamentos">
					</div>
					<div class="icone__esquerda">
						<div class="legenda__icone__pc">
							Agendamentos
						</div>
						<img class="img__icon__esquerda" src="../assets/img/icone-agendamento.svg" alt="Agendamentos">
					</div>
					<div class="icone__esquerda">
						<div class="legenda__icone__pc">
							Plano
						</div>
						<img class="img__icon__esquerda" src="../assets/img/icone-dinheiro.svg" alt="Plano">
					</div>
				</div>
				<div class="meio-circulo__branco-bottom">⠀</div>
			</div>

			<div class="perfil__container">

				<div class="perfil__main">
					<div class="espaco__branco">
						<div class="div__title">
							<h1>Olá, <?= $_SESSION['nomeCliente'] ?>!</h1>
						</div>
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
						</form>
					</div>
					<div class="perfil__info">
						<div class="caixa__info">
							<i class='bx bx-user icone'></i>
							<div class="perfil__texto">
								<p><?=$_SESSION['nomeCliente']?></p>
							</div>
							<i class='bx bxs-user span'></i>
						</div>
						<div class="caixa__info">
							<i class='bx bx-envelope icone'></i>
							<div class="perfil__texto">
								<p id="perfil__texto__email"><?=$_SESSION['email']?></p>
							</div>
							<i class='bx bxs-user span'></i>
						</div>
						<div class="caixa__info">
							<img class="icone__turnmotors__perfil" src="../assets/img/logo-turnmotors-vermelha.svg" alt="Logo Turn Motors">
							<div class="perfil__texto">
								<p>Plano: <?=$_SESSION['plano']?></p>
							</div>
							<i class='bx bxs-user span'></i>
						</div>
					</div>

					<div class="botao">
						<a class="btn__perfil" href="#">Ver Mais</a>
					</div>
					<div class="botao">
						<a class="btn__perfil" href="../assets/scripts/logout.php">Sair</a>
					</div>
				</div>

				<div class="perfil__cards">

					<div class="perfil__veiculos">

						<div class="perfil__veiculos-compra__branco">
							<h3>Veículo Principal</h3>
							<i class='bx bx-edit' ></i>
						</div>

						<div class="perfil__veiculo__conteudo">
							<div class="perfil__veiculo__img">
								<img src="../assets/img/icone-carro-novo.svg" alt="Veículo">
							</div>
							<div class="perfil__veiculo__texto">
								<h4><?php //VEÍCULO PRINCIPAL ?></h4>
								<h5><?php //PLACA DO VEÍCULO PRINCIPAL ?></h5>
							</div>	
						</div>

						<div class="perfil__veiculo__botoes">
							<a href="" class="perfil__veiculo__botao">Ver Mais</a>
							<a href="" class="perfil__veiculo__botao">Personalizar</a>
						</div>
					</div>

					<div class="perfil__compras">
						<div class="perfil__veiculos-compra__branco">
							<h3>Compras</h3>
							<i class='bx bx-cart'></i>
						</div>
					</div>

				</div>

			</div>

		</div>

		<div class="campos__perfil__mobile">

			<div class="opcoes__icones__mobile">
				<div class="icones__esquerda">
					<div class="icone__esquerda">
						<figure class="figure-container">
							<img class="img__icon__esquerda" src="../assets/img/icone-perfil.svg" alt="Perfil">
							<figcaption class="legenda__icones__atividade">Perfil</figcaption>
						</figure>
					</div>
					<div class="icone__esquerda">
						<figure class="figure-container">
							<img class="img__icon__esquerda" src="../assets/img/icone-carro.svg" alt="Veículos">
							<figcaption class="legenda__icones__atividade">Veículos</figcaption>
						</figure>
					</div>
					<div class="icone__esquerda">
						<figure class="figure-container">
							<img class="img__icon__esquerda" src="../assets/img/icone-carrinho.svg" alt="Compras">
							<figcaption class="legenda__icones__atividade">Compras</figcaption>
						</figure>
					</div>
					<div class="icone__esquerda">
						<figure class="figure-container">
							<img class="img__icon__esquerda" src="../assets/img/icone-porco-dinheiro.svg" alt="Orçamentos">
							<figcaption class="legenda__icones__atividade">Orçamentos</figcaption>
						</figure>
					</div>
					<div class="icone__esquerda">
						<figure class="figure-container">
							<img class="img__icon__esquerda" src="../assets/img/icone-agendamento.svg" alt="Agendamentos">
							<figcaption class="legenda__icones__atividade">Agendamentos</figcaption>
						</figure>
					</div>
					<div class="icone__esquerda">
						<figure class="figure-container">
							<img class="img__icon__esquerda" src="../assets/img/icone-dinheiro.svg" alt="Plano">
							<figcaption class="legenda__icones__atividade">Plano</figcaption>
						</figure>
					</div>
				</div>
			</div>

			
			<div class="perfil__main__mobile">
				<div class="espaco__branco">
					<div class="div__title">
						<h1>Olá, <?= $_SESSION['nomeCliente'] ?>!</h1>
					</div>					
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
					</form>
				</div>
				<div class="perfil__info">
					<div class="caixa__info">
						<i class='bx bx-user icone'></i>
						<div class="perfil__texto">
							<p><?=$_SESSION['nomeCliente']?></p>
						</div>
						<i class='bx bxs-user span'></i>
					</div>
					<div class="caixa__info">
						<i class='bx bx-envelope icone'></i>
						<div class="perfil__texto">
							<p id="perfil__texto__email"><?=$_SESSION['email']?></p>
						</div>
						<i class='bx bxs-user span'></i>
					</div>
					<div class="caixa__info">
						<img class="icone__turnmotors__perfil" src="../assets/img/logo-turnmotors-vermelha.svg" alt="Logo Turn Motors">
						<div class="perfil__texto">
							<p>Plano: <?=$_SESSION['plano']?></p>
						</div>
						<i class='bx bxs-user span'></i>
					</div>
				</div>

				<div class="botao">
					<a class="btn__perfil" href="#">Ver Mais</a>
				</div>
			</div>

			<div class="perfil__cards__mobile">

				<div class="perfil__veiculos">
					<div class="perfil__veiculos-compra__branco">
						<h3>Veículo Principal</h3>
						<i class='bx bx-edit' ></i>
					</div>

					<div class="perfil__veiculo__conteudo">
						<div class="perfil__veiculo__img">
							<img src="../assets/img/icone-carro-novo.svg" alt="Veículo">
						</div>
						<div class="perfil__veiculo__texto">
							<h4><?php //VEÍCULO PRINCIPAL ?></h4>
							<h5><?php //PLACA DO VEÍCULO PRINCIPAL ?></h5>
						</div>	
					</div>

					<div class="perfil__veiculo__botoes">
						<a href="" class="perfil__veiculo__botao">Ver Mais</a>
						<a href="" class="perfil__veiculo__botao">Personalizar</a>
					</div>
			</div>

			<div class="perfil__compras">
				<div class="perfil__veiculos-compra__branco">
					<h3>Compras</h3>
					<i class='bx bx-cart'></i>
				</div>
			</div>

		</div>

		</div>
		
	</main>

	<div class="margin">⠀</div>

	
	

</body>
</html>