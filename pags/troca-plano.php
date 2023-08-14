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
    <link rel="stylesheet" href="../assets/css/cadastro.min.css">
	<link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon" />
</head>

<body>
	<?php
	require_once('../assets/components/header.php');
	?>

	<main class="principal">
            <div class="banner">
				<h2 class="banner__titulo">Olá, &lt;nome do perfil&gt;!</h2>
				<img src="../assets/img/perfilPic.svg" class="banner__imagem">
			</div> 
            <br>
            <br>
        <section class="planos">
            <div class="plano__background-azul">
            <div class="plano-comum">
                <div class="plano__cabecalho">
                <img src="../assets/img/velocimetroDevagar.svg">
                <h2 class="plano-comum__titulo">Plano Comum</h2>
                </div>
                <ul class="plano-comum__lista">
                <li class="lista__itens-comum">Entrega segura e em todo país</li>
                <li class="lista__itens-comum">Melhores preços entre as lojas</li>
                <li class="lista__itens-comum">Fornecedores confiáveis</li>
                <li class="lista__itens-comum">Pontos para utilizar em descontos</li>
                </ul>

                <button type="submit" value="comum" class="formulario__botao formulario__botao--comum" name="plano">Cadastrar-se</button>

            </div>
            </div>

            <div class="plano__background-rosa">
            <div class="plano-turbinado">
                <div class="plano__cabecalho">
                <img src="../assets/img/velocimetro.svg">
                <h2 class="plano-turbinado__titulo">Plano Turbinado</h2>
                </div>
                <ul class="plano-turbinado__lista">
                <li class="lista__itens-turbinado">Frete grátis e entregas mais rápidas</li>
                <li class="lista__itens-turbinado">Acesso ao programa de pontos em dobro</li>
                <li class="lista__itens-turbinado">Atendimento personalizado para esclarecer suas dúvidas</li>
                <li class="lista__itens-turbinado">Brindes mensais para personalizar seu carro</li>
                <li class="lista__itens-turbinado">Ofertas exclusivas</li>
                <li class="lista__itens-turbinado">Cashback em algumas compras</li>
                <li class="lista__itens-turbinado">Entrega segura e em todo país </li>
                <li class="lista__itens-turbinado">Melhores preços entre as lojas</li>
                <li class="lista__itens-turbinado">Fornecedores confiáveis</li>
                <li class="lista__itens-turbinado">Pontos para utilizar em descontos</li>
                </ul>
                <p class="plano-turbinado__preco">apenas <span class="preco">R$29,90</span></p>
                <a href="pagamentoTurbinado.html"><button type="submit" value="turbinado" class="formulario__botao formulario__botao--turbinado" name="plano">Cadastrar-se</button></a>
            </div>
            </div>
        </section>
	</main>
	<?php
	require_once('../assets/components/footer.php');
	?>
</body>

</html>