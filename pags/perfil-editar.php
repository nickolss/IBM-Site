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
    <title>Turn Motors | Editar perfil</title>

    <!-- icones -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Arquivos do Bootstrap -->
    <link rel="stylesheet" href="../assets/css/css-bootstrap/bootstrap.min.css">
    <script src="../assets/js/js-bootstrap/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="../assets/js/validacaoForm.js" defer></script>
    <script src="../assets/js/mascaraTelefone.js" defer></script>
    <script src="../assets/js/trocarFoto.js" defer></script>

    <link rel="stylesheet" href="../assets/css/estilos-importantes.css" />
    <link rel="stylesheet" href="../assets/css/perfil.css">
    <link rel="stylesheet" href="../assets/css/cadastro.min.css">
    <link rel="stylesheet" href="../assets/css/trocarFoto.min.css">

    <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon" />
</head>

<body>
    <?php
        require_once('../assets/components/header.php');
		$id = (int)$_SESSION['id'];
		$queryCliente = "SELECT * FROM cliente WHERE id=$id";
		$stmt = $pdo->query($queryCliente);
		$user = $stmt->fetch(PDO::FETCH_ASSOC);

        //formatação do campo $user['telefone'] para que a mascara o aceite
        $telefoneOriginal = $user['telefone'];
        $telefoneParenteses1 = substr_replace($telefoneOriginal, '(', 0, 0);
        $telefoneParenteses2 = substr_replace($telefoneParenteses1, ')', 3, 0);
        $telefoneFinal = substr_replace($telefoneParenteses2, '-', 9, 0);
    ?>

    <main class="principal">
        
        <div id="div__edicao" class="col">
            <form action="../assets/scripts/editarCliente.php" method="POST">
                <div class="titulo">
                    <h1 class="mainTitle">Editar Perfil</h1>
                </div>
                <div class="cadastro">
                    <div class="caixa__input">
                        <input type="email" required name="email" id="email" autocomplete="off" value=<?php echo $user['email']?>>
                        <label for="email">Email</label>
                    </div>
                    
                    <div class="caixa__input">
                        <input type="text" required name="tel" id="tel" autocomplete="off" maxlength="14" pattern="^\(\d{2}\)\d{5}-\d{4}$" value=<?php echo $telefoneFinal?>>
                        <label for="tel">Telefone</label>
                    </div>
                    
                    <div class="caixa__input">
                        <input type="password" required name="senha" id="senha" autocomplete="off" onchange="conferirSenhas()" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#*$%^&+=!])(?!.*\s).{8,}$" title="A senha precisa conter pelo menos 8 caractéres, uma letra maiúscula e uma minúscula e um símbolo.">
                        <label for="senha">Senha</label>
                    </div>

                    <div class="caixa__input">
                        <input type="password" required name="confirmarSenha" id="confirmarSenha" autocomplete="off" onchange="conferirSenhas()">
                        <label for="senha">Confirmar Senha</label>
                    </div>

                    <button type="submit" class="formulario__botao formulario__botao--comum">
                        Salvar Alterações
                    </button>
                </div>
            </form>
            <form action="">
                <div class="cadastro">
                    <button type="submit" class="formulario__botao formulario__botao--comum">
                        Alterar Plano
                    </button>
                </div>
            </form>
        </div>

    </main>

    <?php
    require_once('../assets/components/footer.php');
    ?>
</body>

</html>