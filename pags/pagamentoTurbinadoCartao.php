<?php
require_once('../assets/scripts/conexao.php');
date_default_timezone_set("America/Sao_Paulo");
$dataAtual = date("Y-m-d");
$anoAtual = date("Y");
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Turn Motors | Pagamento</title>

	<link rel="stylesheet" href="../assets/css/pagamento-cartao.min.css">
	<link rel="stylesheet" href="../assets/css/finalizar-compra.min.css">
	<link rel="stylesheet" href="../assets/css/estilos-importantes.css">

	<link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">
	<script src="../assets/js/java.js" defer></script>
	<script src="../assets/js/mascaraCartao.js" defer></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="../assets/js/js-bootstrap/bootstrap.bundle.min.js"></script>
</head>

<body id="container__body">

	<?php
	require_once('../assets/components/header.php');
	?>

	<main>
		<form action="../assets/scripts/cadastrarClienteTurbinado.php" method="POST">
			<div class="container__cartao">
				<h1>Pagamento</h1>
				<div class="cadastro">
					<div class="input__endereco">
						<div class="caixa__input">
							<input type="text" required name="numeroCartao" id="numeroCartao" autocomplete="off" maxlength="19">
							<label for="numeroCartao">Número do Cartão</label>
						</div>
					</div>
					<div class="input__endereco">
						<div class="caixa__input">
							<input class="inputCartao" type="number" name="mesCartao" id="mesCartao" required maxlength="2" minlength="2" min="1" max="12" title="O mês deve ter 2 digitos numéricos.">
							<label for="address">Mês de Validade</label>
						</div>
						<div class="caixa__input caixa__input__margin">
							<input type="number" required name="anoCartao" id="anoCartao" autocomplete="off" maxlength="4" minlength="4" title="O ano deve ter 4 digitos numéricos." min=<?= $anoAtual ?>>
							<label for="numero">Ano de Validade</label>
						</div>
					</div>
					<div class="input__endereco">
						<div class="caixa__input">
							<input class="inputCartao" type="text" id="cvv" name="cvvCartao" id="cvvCartao" size="4" maxlength="4" pattern="\d{3,3}" title="O CVV deve ter 3 digitos numéricos." required>
							<label for="address">CVV</label>
						</div>
						<div class="caixa__input caixa__input__margin">
							<input type="text" required name="nomeCartao" id="nomeCartao" autocomplete="off" minlength="1">
							<label for="numero">Nome Completo</label>
						</div>
					</div>
					<div id="div__forma__pagamento__title">
						<h2 id="forma__pagamento__title">Escolha sua forma de pagamento preferida:</h2>
					</div>
					<div class="opcao__cartao">
						<div class="opcao__radio__cartao">
							<input class="inputRadio" type="radio" id="credito" name="opcao_cartao" value="credito" required>
							<label class="labelRadio" id="labelCredito" for="credito">Crédito</label>
						</div>
						<div class="opcao__radio__cartao opcao__radio__cartao__margin">
							<input class="inputRadio" type="radio" id="debito" name="opcao_cartao" value="debito" required>
							<label class="labelRadio" for="debito">Débito</label>
						</div>
						<br>
					</div>
				</div>
			</div>
			<div class="div__btn-finalizar">
				<button class="btn__finalizar-compra" type="submit">Finalizar Compra</button>
			</div>
		</form>
	</main>

	<?php
	require_once('../assets/components/footer.php');
	?>

</body>

</html>