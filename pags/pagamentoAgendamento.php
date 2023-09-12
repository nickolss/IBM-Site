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



	<link rel="stylesheet" href="../assets/css/pagamento-cartao.min.css">
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
			<form action="../assets/scripts/pagamentoAgendamento.php" method="POST">
				<div id="div__inputCartao">

					<div class="input__endereco">

						<div class="caixa__input">
							<input style="height: 52px;" type="date" name="data" id="dataValidade" autocomplete="off" min="<?= $dataAtual ?>" required autofocus>
							<label for="data">Data de Validade</label>
						</div>

						<div class="caixa__input caixa__input__margin">
							<input type="text" required name="numeroCartao" id="numeroCartao" autocomplete="off">
							<label for="numeroCartao">Número do Cartão</label>
						</div>

					</div>

					<div class="input__endereco">
						<div class="caixa__input">
							<input class="inputCartao" type="text" name="cvvCartao" id="cvvCartao" required maxlength="3" pattern="^\d{3,4}$" title="O CVV deve ter 3 digitos numéricos.">
							<label for="address">CVV</label>
						</div>

						<div class="caixa__input caixa__input__margin">
							<input type="text" required name="nomeCartao" id="nomeCartao" autocomplete="off" minlength="1" maxlength="5">
							<label for="nomeCartao">Nome Completo</label>
						</div>
					</div>


				<div id="div__forma__pagamento__title">
					<h2 id="forma__pagamento__title">Escolha sua forma de pagamento preferida:</h2>
				</div>

				<div class="opcao__cartao">
					<div class="opcao__radio__cartao">
						<input class="inputRadio" type="radio" id="credito" name="opcao_cartao" value="credito">
						<label class="labelRadio" id="labelCredito" for="credito">Crédito</label>
					</div>
					<div class="opcao__radio__cartao opcao__radio__cartao__margin">
						<input class="inputRadio" type="radio" id="debito" name="opcao_cartao" value="debito">
						<label class="labelRadio" for="debito">Débito</label>
					</div>
						<br>
					

				</div>
				<div class="div__preco">
					<p id="preco">R$29,90</p>
					<p id="plano">Plano Turbinado</p>
				</div>
				
				<div class="botoes">
						<div class="botao">
						<button class="botao__laranja" type="submit">Agendar</button>
					</div>
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