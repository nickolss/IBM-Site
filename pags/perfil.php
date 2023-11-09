<?php
// Importação dos arquivos
require_once('../assets/scripts/conexao.php');
require_once('../assets/scripts/iniciarSessao.php');
require_once('../assets/scripts/consultaCliente.php');
require_once('../assets/scripts/exibirUltimaCompra.php');

$idDono = $_SESSION['id'] || null;
$sqlCarro = $pdo->query("SELECT * FROM `carro` WHERE id_dono = $idDono");
$carros = $sqlCarro->fetchAll();
$placa = $carros[0]['placa'] ?? "";

if ($_SESSION['plano'] != 'comum' && $_SESSION['plano'] != 'turbinado') {

	$sqlPlano = $pdo->query("SELECT `plano` FROM `cliente` WHERE id = $idDono");
	$registro = $sqlPlano->fetch();
	if ($registro['plano'] == "pendente") {
		header("Location: pagamentoTurbinadoCartao.php");
	}
}

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

	<link rel="stylesheet" href="../assets/css/estilos-importantes.css" />
	<link rel="stylesheet" href="../assets/css/perfil.css">
	<link rel="stylesheet" href="../assets/css/trocarFoto.min.css">

	<link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon" />

	<script src="https://code.jquery.com/jquery-3.6.0.min.js" defer></script>
	<script src="../assets/js/trocarFoto.js" defer></script>
	<script type="text/javascript" src="../assets/js/java.js" defer></script>
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
				<a href="./perfil-editar.php">
					<div class="icones__esquerda">
						<div class="icone__esquerda">
							<div class="legenda__icone__pc">
								Perfil
							</div>
							<img class="img__icon__esquerda" src="../assets/img/icone-perfil.svg" alt="Perfil">
						</div>
				</a>
				<a href="./veiculos.php">
					<div class="icone__esquerda">
						<div class="legenda__icone__pc">
							Veículos
						</div>
						<img class="img__icon__esquerda" src="../assets/img/icone-carro.svg" alt="Veículos">
					</div>
				</a>
				<a href="./comprasRealizadas.php">
					<div class="icone__esquerda">
						<div class="legenda__icone__pc">
							Compras
						</div>
						<img class="img__icon__esquerda" src="../assets/img/icone-carrinho.svg" alt="Compras">
					</div>
				</a>
				<a href="agendamentosPendentes.php">
					<div class="icone__esquerda">
						<div class="legenda__icone__pc">
							Agendamentos Pendentes
						</div>
						<img class="img__icon__esquerda" src="../assets/img/icone-agendamento.svg" alt="Agendamentos Pendentes">
					</div>
				</a>
				<a href="agendamentosConfirmados.php">
					<div class="icone__esquerda">
						<div class="legenda__icone__pc">
							Agendamentos Confirmados
						</div>
						<img class="img__icon__esquerda" src="../assets/img/icone-agendamento-confirmado.svg" alt="Agendamentos Confirmados">
					</div>
				</a>
				<a href="./favoritos.php">
					<div class="icone__esquerda">
						<div class="legenda__icone__pc">
							Favoritos
						</div>
						<img class="img__icon__esquerda" src="../assets/img/icone-favorito-amarelo.svg" alt="Favorito">
					</div>
				</a>
				<?php
				if ($_SESSION['plano'] != "comum") {


				?>

					<a href="./troquepontos.php">
						<div class="icone__esquerda">
							<div class="legenda__icone__pc">
								Pontos
							</div>
							<img class="img__icon__esquerda" src="../assets/img/icone-pontos.svg" alt="Trocar Pontos">
						</div>
					</a>

				<?php
				}
				?>
			</div>
			<div class="meio-circulo__branco-bottom">⠀</div>
		</div>

		<div class="perfil__container">

			<div class="perfil__main">
				<div class="espaco__branco">
					<div class="div__title">
						<h1>Olá, <?= $_SESSION['nomeCliente'] ?>!</h1>
					</div>
					<form action="../assets/scripts/trocarFoto.php" enctype="multipart/form-data" method="post" class="informacoes__formulario"> <!-- Formulário que utiliza o atributo enctype para enviar arquivos multipart/form-data -->
						<div class="upload">
							<img src="../assets/img/img-perfil/<?php echo $user['fotoPerfil']; ?>" id="image" id="image"> <!-- Exibe a imagem atual do usuário -->

							<div class="rightRound" id="upload">
								<input type="file" name="fileImg" id="fileImg" accept=".jpg, .jpeg, .png"> <!-- Input de seleção de arquivo -->
								<i class="fa fa-camera"></i> <!-- Ícone de câmera -->
							</div>

							<div class="leftRound" id="cancel" style="display: none;">
								<i class="fa fa-times"></i> <!-- Ícone de cancelar-->
							</div>
							<div class="rightRound" id="confirm" style="display: none;">
								<input type="submit"> <!-- Botão de envio do formulário -->
								<i class="fa fa-check"></i> <!-- Ícone de confirmar -->
							</div>
						</div>
					</form>
				</div>
				<div class="perfil__info">
					<div class="caixa__info">
						<i class='bx bx-user icone'></i>
						<div class="perfil__texto">
							<p><?= $_SESSION['nomeCliente'] ?></p>
						</div>
						<i class='bx bxs-user span'></i>
					</div>
					<div class="caixa__info">
						<i class='bx bx-envelope icone'></i>
						<div class="perfil__texto">
							<p id="perfil__texto__email"><?= $_SESSION['email'] ?></p>
						</div>
						<i class='bx bxs-user span'></i>
					</div>
					<div class="caixa__info">
						<img class="icone__turnmotors__perfil" src="../assets/img/logo-turnmotors-vermelha.svg" alt="Logo Turn Motors">
						<div class="perfil__texto">
							<p>Plano: <?= $_SESSION['plano'] ?></p>
						</div>
						<i class='bx bxs-user span'></i>
					</div>
				</div>

				<div class="botao">
					<a class="btn__perfil" href="./perfil-editar.php">Ver Mais</a>
				</div>
				<div class="botao">
					<a class="btn__perfil" href="../assets/scripts/logout.php">Sair</a>
				</div>
			</div>

			<div class="perfil__cards">

				<div class="perfil__veiculos">

					<div class="perfil__veiculos-compra__branco">
						<h3>Veículo Principal</h3>
						<i class='bx bx-edit'></i>
					</div>

					<div class="perfil__veiculo__conteudo">
						<div class="perfil__veiculo__img">
							<img src="../assets/img/icone-carro-novo.svg" alt="Veículo">
						</div>
						<div class="perfil__veiculo__texto">
							<h4 id="titulo__nenhum-veiculo"><?= $carros[0]['apelido'] ?? "Nenhum Veículo Encontrado" ?> </h4>
							<h5 id="perfil__veiculo__texto-placa"><?php if ($placa != "") {
																		echo "Placa: $placa";
																	} ?> </h5>
						</div>
					</div>

					<div class="perfil__veiculo__botoes">
						<div class="div-perfil__veiculo__btn">
							<a href="./veiculos.php" class="perfil__veiculo__botao">Ver Mais</a>
						</div>
						<div class="div-perfil__veiculo__btn">
							<a href="personalizacoes.php" class="perfil__veiculo__botao">Personalizar</a>
						</div>
					</div>
				</div>

				<div class="perfil__compras">
					<div class="perfil__veiculos-compra__branco">
						<h3>Compras</h3>
						<i class='bx bx-cart'></i>
					</div>
					<?php
					if (!empty($compras)) {
					?>
						<div class="itens__compras">
							<div class="imagem-item__compras">
								<img src="<?= $produtosImagem['caminho_imagem'] ?>" alt="Imagem do ultimo pedido">
							</div>
							<div class="descricao-item__compras">
								<h2 class="titulo-item__compras"><?= $ultimaCompra['nomeProdutos'] ?></h2>
								<p class="preco-item__compras">R$<?= $ultimaCompra['preco_final'] ?>,00</p>
							</div>
						</div>
					<?php
					}
					?>
				</div>

			</div>

		</div>

		</div>

		<div class="campos__perfil__mobile">

			<div class="opcoes__icones__mobile">
				<div class="icones__esquerda">
					<a href="./perfil-editar.php">
						<div class="icone__esquerda">
							<figure class="figure-container">
								<img class="img__icon__esquerda" src="../assets/img/icone-perfil.svg" alt="Perfil">
								<figcaption class="legenda__icones__atividade">Perfil</figcaption>
							</figure>
						</div>
					</a>
					<a href="./veiculos.php">
						<div class="icone__esquerda">
							<figure class="figure-container">
								<img class="img__icon__esquerda" src="../assets/img/icone-carro.svg" alt="Veículos">
								<figcaption class="legenda__icones__atividade">Veículos</figcaption>
							</figure>
						</div>
					</a>
					<div class="icone__esquerda">
						<figure class="figure-container">
							<img class="img__icon__esquerda" src="../assets/img/icone-carrinho.svg" alt="Compras">
							<figcaption class="legenda__icones__atividade">Compras</figcaption>
						</figure>
					</div>
					<a href="#">
						<div class="icone__esquerda">
							<figure class="figure-container">
								<img class="img__icon__esquerda" src="../assets/img/icone-agendamento.svg" alt="Agendamentos">
								<figcaption class="legenda__icones__atividade">Agendamentos Pendentes</figcaption>
							</figure>
					</a>
				</div>
				<a href="#">
					<div class="icone__esquerda">
						<figure class="figure-container">
							<img class="img__icon__esquerda" src="../assets/img/icone-agendamento-confirmado.svg" alt="Agendamentos">
							<figcaption class="legenda__icones__atividade">Agendamentos Confirmados</figcaption>
						</figure>
					</div>
				</a>
				<a href="./favoritos.php">
					<div class="icone__esquerda">
						<figure class="figure-container">
							<img class="img__icon__esquerda" src="../assets/img/icone-favorito-amarelo.svg" alt="Plano">
							<figcaption class="legenda__icones__atividade">Favoritos</figcaption>
						</figure>
					</div>
				</a>
				<a href="./troquepontos.php">
					<div class="icone__esquerda">
						<figure class="figure-container">
							<img class="img__icon__esquerda" src="../assets/img/icone-pontos.svg" alt="Trocar Pontos">
							<figcaption class="legenda__icones__atividade">Pontos</figcaption>
						</figure>
					</div>
				</a>
			</div>
		</div>


		<div class="cards__perfil-direita">
			<div class="perfil__main__mobile">
				<div class="espaco__branco">
					<div class="div__title">
						<h1>Olá, <?= $_SESSION['nomeCliente'] ?>!</h1>
					</div>
					<form action="../assets/scripts/trocarFoto.php" enctype="multipart/form-data" method="post" class="informacoes__formulario"> <!-- Formulário que utiliza o atributo enctype para enviar arquivos multipart/form-data -->
						<div class="upload">
							<img src="../assets/img/img-perfil/<?php echo $user['fotoPerfil']; ?>" id="image" id="image"> <!-- Exibe a imagem atual do usuário -->

							<div class="rightRound" id="upload">
								<input type="file" name="fileImg" id="fileImg" accept=".jpg, .jpeg, .png"> <!-- Input de seleção de arquivo -->
								<i class="fa fa-camera"></i> <!-- Ícone de câmera -->
							</div>

							<div class="leftRound" id="cancel" style="display: none;">
								<i class="fa fa-times"></i> <!-- Ícone de cancelar-->
							</div>
							<div class="rightRound" id="confirm" style="display: none;">
								<input type="submit"> <!-- Botão de envio do formulário -->
								<i class="fa fa-check"></i> <!-- Ícone de confirmar -->
							</div>
						</div>
					</form>
				</div>
				<div class="perfil__info">
					<div class="caixa__info">
						<i class='bx bx-user icone'></i>
						<div class="perfil__texto">
							<p><?= $_SESSION['nomeCliente'] ?></p>
						</div>
						<i class='bx bxs-user span'></i>
					</div>
					<div class="caixa__info">
						<i class='bx bx-envelope icone'></i>
						<div class="perfil__texto">
							<p id="perfil__texto__email"><?= $_SESSION['email'] ?></p>
						</div>
						<i class='bx bxs-user span'></i>
					</div>
					<div class="caixa__info">
						<img class="icone__turnmotors__perfil" src="../assets/img/logo-turnmotors-vermelha.svg" alt="Logo Turn Motors">
						<div class="perfil__texto">
							<p>Plano: <?= $_SESSION['plano'] ?></p>
						</div>
						<i class='bx bxs-user span'></i>
					</div>
				</div>

				<div class="perfil__veiculo__botoes">
					<div class="div-perfil__veiculo__btn">
						<a href="" class="perfil__veiculo__botao">Ver Mais</a>
					</div>
					<div class="div-perfil__veiculo__btn">
						<a href="" class="perfil__veiculo__botao">Personalizar</a>
					</div>
				</div>
			</div>
			<div class="perfil__cards__mobile">
				<div class="perfil__veiculos">
					<div class="perfil__veiculos-compra__branco">
						<h3>Veículo Principal</h3>
						<i class='bx bx-edit'></i>
					</div>
					<div class="perfil__veiculo__conteudo">
						<div class="perfil__veiculo__img">
							<img src="../assets/img/icone-carro-novo.svg" alt="Veículo">
						</div>
						<div class="perfil__veiculo__texto">
							<h4 id="titulo__nenhum-veiculo"><?= $carros[0]['apelido'] ?? "Nenhum Veículo Encontrado" ?> </h4>
							<h5 id="perfil__veiculo__texto-placa"><?php if ($placa != "") {
																		echo "Placa: $placa";
																	} ?> </h5>
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
					<?php
					if (!empty($compras)) {
					?>
						<div class="itens__compras">
							<div class="imagem-item__compras">
								<img src="<?= $produtosImagem['caminho_imagem'] ?>" alt="Imagem do ultimo pedido">
							</div>
							<div class="descricao-item__compras">
								<h2 class="titulo-item__compras"><?= $ultimaCompra['nomeProdutos'] ?></h2>
								<p class="preco-item__compras">R$<?= $ultimaCompra['preco_final'] ?>,00</p>
							</div>
						</div>
					<?php
					}
					?>
				</div>

			</div>
		</div>

		</div>

	</main>

</body>

</html>