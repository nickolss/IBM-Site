<?php
require_once('../assets/scripts/conexao.php');
require_once('../assets/scripts/iniciarSessao.php');

$nomeProduto = $_GET['nomeProduto'];
if (isset($_SESSION['id'])) {
	require_once('../assets/scripts/verificarHistoricoCompra.php');

	$idProdComprador = $_SESSION['id'];


	foreach ($comprasRealizadas as $compra) {
		$idProdProdutosComprados = $compra['idProdutos'];
		$sqlProdutoMercadoria = $pdo->query("SELECT * FROM `produtosComprados` WHERE `nomeProdutos`='$nomeProduto'");
		$jaComprou = $sqlProdutoMercadoria->fetch();
	}
}

$produtoSql = $pdo->query(("SELECT * FROM `produto` WHERE nome='$nomeProduto'"));
$produto = $produtoSql->fetchAll();

$precoSemFormatacao = $produto[0]['preco'];
$precoProduto = number_format($precoSemFormatacao, 2, ',', '.');

$descricao = $produto[0]['descricao'];
$caminhoImagem = $produto[0]['caminho_imagem'];
$id = $produto[0]['codigoProduto'];


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

<body>
	<?php
	require_once('../assets/components/header.php');
	?>

	<main>
		<br class="espaco369">
		<br class="espaco369">
		<div class="container vg-sumir ">
			<div class="row" id="correcao">
				<div class="col-7">
					<div id="box" style="text-align: end; margin: 70px 0px; margin-left: 95px;">
						<img class="vg-img" id="img" width="650px" src="<?= $caminhoImagem ?>">
						<label for="img"></label>
					</div>

				</div>
				<div class="col">
					<div style="margin-top: 75px; margin-right: 170px;">
						<h1 class="vg-tite"><?= $nomeProduto ?></h1>
						<h2 style="margin-top: 10px; font-weight: bold;">R$<?= $precoProduto ?></h2>
						<h3 style="font-weight: bold;">Sobre este item:</h3>
						<p style="font-size: 1.1em;"><?= $descricao ?></p>
						<form method="POST" action="carrinho.php?adicionar=<?php echo $id; ?>">

							<button class="vg-btn" type="submit" name="adicionar" value="<?php echo $id; ?>">Comprar</button>
						</form>

						<?php
						if (isset($jaComprou)) {
							if ($jaComprou != 0) {


						?>
								<div>
									<form action="../assets/scripts/cadastrarAvaliacao.php?id_produto=<?= $id ?>" method="post">
										<label for="comentario">Diga o que achou do produto</label>
										<textarea name="comentario" id="comentario" cols="30" rows="10" required></textarea>
										<button type="submit">Comentar</button>
									</form>
								</div>
						<?php
							}
						}
						?>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<h2 class="avaliacoes__title">Avaliações</h2>
						<?php
						$sqlAvaliacoes = $pdo->query("SELECT id_escritor, texto FROM `avaliacao` WHERE id_produto=$id");
						$avaliacoes = $sqlAvaliacoes->fetchAll();

						foreach ($avaliacoes as $avaliacao) {
							$id_escritor = $avaliacao['id_escritor'];
							$sqlEscritor = $pdo->query("SELECT nomeCompleto FROM `cliente` WHERE id= $id_escritor");
							$nomeEscritor = $sqlEscritor->fetch();

						?>

							<p class="avaliacao__autor"><?= $nomeEscritor['nomeCompleto'] ?></p>
							<p class="avaliacao"><?= $avaliacao['texto'] ?></p>

						<?php
						}

						?>
					</div>
				</div>
			</div>
		</div>
		<div class="container vg-aparece ">
			<div class="row">
				<div class="col alinhar">
					<div class="" id="box1" style="margin-top: 50px;">
						<img class="vg-img1 img-fluid " src="<?= $caminhoImagem ?>">
					</div>
					<br>
					<br>
					<div>
						<h1 class="vg-tite"><?= $nomeProduto ?></h1>
						<h2 style="margin-top: 10px; margin-bottom: 50px; font-weight: bold;">R$<?= $precoProduto ?></h2>
						<h3 style="font-weight: bold;">Sobre este item:</h3>
						<p class="" style="font-size: 1.1em;"><?= $descricao ?></p>
						<form method="POST" action="carrinho.php?adicionar=<?php echo $id; ?>">
							<button class="vg-btn" type="submit" name="adicionar" value="<?php echo $id; ?>">Comprar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</main>


	<?php
	require_once('../assets/components/footer.php');
	?>




</body>

</html>