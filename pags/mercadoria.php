<?php
require_once('../assets/scripts/conexao.php');
require_once('../assets/scripts/iniciarSessao.php');

$nomeProduto = $_GET['nomeProduto'];

if (isset($_SESSION['id'])) {
	require_once('../assets/scripts/verificarHistoricoCompra.php');

	$idProdComprador = $_SESSION['id'];

	foreach ($comprasRealizadas as $compra) {
		$idProdProdutosComprados = $compra['idProdutos'];
		$sqlProdutoMercadoria = $pdo->query("SELECT * FROM `produtosComprados` WHERE `nomeProdutos`='$nomeProduto' && id_comprador=$idProdComprador");
		$jaComprou = $sqlProdutoMercadoria->fetch();
	}
}

$produtoSql = $pdo->query(("SELECT * FROM `produto` WHERE nome='$nomeProduto'"));
$produto = $produtoSql->fetchAll();

$precoSemFormatacao = $produto[0]['preco'];
$precoProduto = number_format($precoSemFormatacao, 2, ',', '.');

$descricao = $produto[0]['descricao'];
$caminhoImagem = $produto[0]['caminho_imagem'];
$idProduto = $produto[0]['codigoProduto'];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Turn Motors | Mercado</title>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

	<link rel="stylesheet" href="../assets/css/estilos-importantes.css">
	<link rel="stylesheet" href="../assets/css/mercado.min.css">

	<script type="text/javascript" src="../assets/js/java2.js" defer></script>

	<link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">
	<script type="text/javascript" src="../assets/js/java.js" defer></script>
	<script src="../assets/js/js-bootstrap/bootstrap.bundle.min.js"></script>
</head>

<body id="container__body">
	<?php
	require_once('../assets/components/header.php');
	?>

	<main>
		<div class="container__produto">
			<div class="imagem__produto">
				<img src="<?= $caminhoImagem ?>">
			</div>
			<div class="descricao__produto">
				<h1 id="titulo__produto"><?= $nomeProduto ?></h2>
					<h2 id="preco__produto">R$<?= $precoProduto ?></h3>
						<h3 id="titulo-descricao__produto">Sobre este item:</h3>
						<p id="descricao__produto"><?= $descricao ?></p>
						<form method="POST" action="carrinho.php?adicionar=<?php echo $idProduto; ?>">
							<button class="btn__produto" type="submit" name="adicionar" value="<?php echo $idProduto; ?>">Comprar</button>
						</form>
			</div>
		</div>
		<div class="container__comentario">
			<?php
			if (isset($jaComprou)) {
				if ($jaComprou != 0) {
			?>
					<div class="div__comentario">
						<form action="../assets/scripts/cadastrarAvaliacao.php?id_produto=<?= $idProduto ?>" method="post">
							<label id="lbl__comentario" for="comentario">Digite o que achou do produto:</label>
							<div class="txt__comentario"><textarea name="comentario" id="comentario" cols="50" rows="5" required></textarea></div>
							<div class="div-btn__comentario">
								<button id="btn__comentario" type="submit">Comentar</button>
							</div>
						</form>
					</div>
			<?php
				}
			}
			?>
		</div>

		<div class="container__avaliacoes">
			<h2 class="avaliacoes__title">Avaliações</h2>
			<?php
			$sqlAvaliacoes = $pdo->query("SELECT id_escritor, texto FROM `avaliacao` WHERE id_produto=$idProduto");
			$avaliacoes = $sqlAvaliacoes->fetchAll();

			$idCliente = isset($_SESSION['id']) ? (int)$_SESSION['id'] : null;
			if (!is_null($avaliacoes)) {
				foreach ($avaliacoes as $avaliacao) {
					$idEsc = $avaliacao['id_escritor'];
					$queryCliente = "SELECT * FROM cliente WHERE id=$idEsc";
					$stmt = $pdo->query($queryCliente);
					$user = $stmt->fetch(PDO::FETCH_ASSOC);
					$id_escritor = $avaliacao['id_escritor'];
					$sqlEscritor = $pdo->query("SELECT nomeCompleto FROM `cliente` WHERE id= $id_escritor");
					$nomeEscritor = $sqlEscritor->fetch();

			?>
					<div class="avaliacao">
						<div class="img__avaliacao">
							<img src="../assets/img/img-perfil/<?= $user['fotoPerfil']; ?>" id="imagem__perfil"> <!-- Exibe a imagem atual do usuário -->
						</div>
						<div class="nome-escritor__avaliacao">
							<p class="avaliacao__autor"><?= $nomeEscritor['nomeCompleto'] ?></p>
						</div>
					</div>

					<?php
					if (isset($_SESSION['id'])) {
						if ($_SESSION['id'] == $user['id']) {
					?>
							<div class="txt__avaliacao">
								<p class="p__avaliacao"><?= $avaliacao['texto'] ?></p>
								<a id="btn-excluir__avaliacao" href="../assets/scripts/excluirComentario.php?mercadoria=<?= $produto[0]['codigoProduto'] ?>&&comprador=<?= (int)$avaliacao['id_escritor'] ?>">Excluir</a>
							</div>

					<?php
						}
					}

					?>

					<div class="txt__avaliacao">
						<p class="p__avaliacao"><?= $avaliacao['texto'] ?></p>
					</div>

			<?php

				}
			}
			?>
		</div>

	</main>


	<?php
	require_once('../assets/components/footer.php');
	?>
</body>

</html>