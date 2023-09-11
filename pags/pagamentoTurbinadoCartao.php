<?php
date_default_timezone_set("America/Sao_Paulo");
$dataAtual = date("Y-m-d");
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Turn Motors | Pagamento</title>

	<!--ARQUIVOS BOOTSTRAP-->



	<link rel="stylesheet" href="../assets/css/pagamentoTurbinadoCartao.min.css">
	<link rel="stylesheet" href="../assets/css/estilos-importantes.css">

	<link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">
	<script src="../assets/js/java.js" defer></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="../assets/js/js-bootstrap/bootstrap.bundle.min.js"></script>
</head>

<body id="container__body">

	<?php
	require_once('../assets/components/header.php');
	?>

	<main>
		<div class="container">
			<div class="main__div">
				<h1 id="mainTitle">Informe os dados do seu cartão de crédito ou débito</h1>
			</div>
			<form action="" method="">
				<div id="div__inputCartao">
					<input class="inputCartao" type="number" name="numeroCartao" id="numeroCartao" placeholder="Número do Cartão" required>
					<input class="inputCartao" type="date" name="validadeCartao" id="validadeCartao" placeholder="Data de Validade" min="<?= $dataAtual ?>" required>
					<input class="inputCartao" type="text" name="cvvCartao" id="cvvCartao" placeholder="CVV" required maxlength="3" pattern="^\d{3,4}$" title="O CVV deve ter 3 digitos numéricos.">
					<input class="inputCartao" type="text" name="nomeCartao" id="nomeCartao" placeholder="Nome Completo" required>
				</div>

				<h2>Escolha sua forma de pagamento preferida:</h2>
				<div class="opcao__cartao">
					<input class="inputRadio" type="radio" id="credito" name="opcao_cartao" value="credito" checked>
					<label class="labelRadio" id="labelCredito" for="credito">Crédito</label>
					<input class="inputRadio" type="radio" id="debito" name="opcao_cartao" value="debito">
					<label class="labelRadio" for="debito">Débito</label>
					<br>

				</div>
				<div class="div__preco">
					<p id="preco">R$29,90</p>
					<p id="plano">Plano Turbinado</p>
				</div>
				<div class="botao__inscrever">
					<button type="submit" id="botaoInscrever" class="botao__link">Inscrever-se</button>
				</div>
			</form>
		</div>
		<br>
	</main>

	<?php
	require_once('../assets/components/footer.php');
	?>

</body>

</html