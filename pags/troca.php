<?php 
    require_once("../assets/scripts/conexao.php");
    
    $nomeProduto = $_GET['nomeProd'];

    $sqlProdutosTroca = $pdo->query("SELECT * FROM `produtosTroca` WHERE nome = '$nomeProduto'");
    $produtoTroca = $sqlProdutosTroca->fetchAll();
    $pontos = $produtoTroca[0]['preco_pontos'];
    $descricao = $produtoTroca[0]['descricao'];
    $img = $produtoTroca[0]['caminho_img'];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Turn Motors | Troca</title>

	<link rel="stylesheet" href="../assets/css/pagamentoTroca.min.css">
	<link rel="stylesheet" href="../assets/css/estilos-importantes.css">
	<link rel="stylesheet" href="../assets/css/mercado.min.css">
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
		<div class="container__produto">
			<div class="imagem__produto">
				<img src="<?= $img ?>">
			</div>
			<div class="descricao__produto">
				<h1 id="titulo__produto"><?= $nomeProduto ?></h2>
					<h2 id="preco__produto">Pontos: <?= $pontos ?></h3>
						<h3 id="titulo-descricao__produto">Sobre este item:</h3>
						<p id="descricao__produto"><?= $descricao ?></p>

						<?php
							$pontosProdutoTroca = $pontos;
						?>

						<form action="../assets/scripts/realizarTroca.php?pontos=<?=$pontosProdutoTroca?>" method="POST">
							<button class="btn__produto" type="submit">Trocar com meus Pontos</button>
						</form>
			</div>
		</div>
	</main>

	<?php
		require_once('../assets/components/footer.php');
	?>

</body>

</html>