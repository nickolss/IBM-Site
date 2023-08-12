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
		<section class="informacoes">
			<div class="banner">
				<h2 class="banner__titulo">Olá, &lt;nome do perfil&gt;!</h2>
				<img src="../assets/img/perfilPic.svg" class="banner__imagem">
			</div> 

            
            
            <div class="container text-center">
                <div class="row">
                    <div class="col">
                    <div class="informacoes-cadastro">
				<div class="informacoes__imagem-perfil">
					<img src="../assets/img/iconePerfil.svg" class="imagem-perfil__imagem">
				</div>
				<form action="" method="post" class="informacoes__formulario">
					<input type="text" name="nome" id="nome" value="<nome do perfil>" disabled class="formulario__campo" />
					<input type="email" name="email" id="email" value="<email>" disabled class="formulario__campo" />
					<input type="tel" name="telefone" id="telefone" value="<número celular>" disabled class="formulario__campo" />
					<input type="date" name="dataNasc" id="dataNasc" disabled class="formulario__campo" />
					<input type="text" name="cpf" id="cpf" value="<cpf>" disabled class="formulario__campo" />
					<input type="text" name="plano" id="plano" value="Plano: <tipo>" disabled class="formulario__campo" />
					<input type="password" name="senha" id="senha" value="<senha>" disabled class="formulario__campo" />
					<button type="submit" class="formulario__botao" value="beneficio">
						Ver Benefícios
					</button>
					<button type="submit" class="formulario__botao" value="troca">
						Trocar o Plano
					</button>
					<a href="perfil-editar.php"><button type="submit" class="formulario__botao" value="editar">
						Editar Perfil
					</button></a>
				</form>
			</div>
                    </div>
                    <div class="col">
                    <form action="../assets/scripts/cadastrarCliente.php" method="POST">
                    <div class="titulo">
                        <h1 class="mainTitle">Cadastrar-se</h1>
                        <h2 class="subTitle">Veja seus pedidos de forma fácil, compre mais rápido e
                        tenha uma experiência personalizada</h2>
                    </div>
                    <div class="cadastro">
                        <div class="caixa__input">
                        <input type="text" required name="nome" id="nome" autocomplete="off">
                        <label for="nome">Nome</label>
                        </div>
                        <div class="caixa__input">
                        <input type="email" required name="email" id="email" autocomplete="off">
                        <label for="email">Email</label>
                        </div>
                        <div class="caixa__input">
                        <input type="password" required name="senha" id="senha" autocomplete="off" onchange="conferirSenhas()" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#*$%^&+=!])(?!.*\s).{8,}$" title="A senha precisa conter pelo menos 8 caractéres, uma letra maiúscula e uma minúscula e um símbolo.">
                        <label for="senha">Senha</label>
                        </div>
                        <div class="caixa__input">
                        <input type="password" required name="confirmarSenha" id="confirmarSenha" autocomplete="off" onchange="conferirSenhas()">
                        <label for="senha">Confirmar Senha</label>
                        </div>
                        <!-- VALIDAÇÃO EM DESENVOLVIMENTO -->
                        <div class="caixa__input">
                        <input type="text" required name="tel" id="tel" autocomplete="off" maxlength="14" pattern="^\(\d{2}\)\d{5}-\d{4}$">
                        <label for="tel">Telefone</label>
                        </div>

                        <div class="caixa__input">
                        <input type="date" required name="data" id="data" autocomplete="off">
                        <label for="data">Data de Nascimento</label>
                        </div>
                        <div class="caixa__input">
                        <input type="text" required name="cpf" id="cpf" autocomplete="off" maxlength="14">
                        <label for="cpf">CPF</label>
                        </div>
                        <div class="div__termos">
                        <div class="filho__termos"><label for="termos"><input type="checkbox" name="termos" id="termos">Aceitar Termos de condições</label></div>
                        </div>
                        <br>
                        <button type="submit" class="formulario__botao" value="troca">
						    Salvar Alterações
					    </button>
                    </div>
                </form>   
                    </div>
                    
                </div>
            </div>
		</section>
	</main>

	<?php
	require_once('../assets/components/footer.php');
	?>
</body>

</html>