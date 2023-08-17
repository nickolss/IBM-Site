<?php
require_once('../assets/scripts/iniciarSessao.php');
require_once('../assets/scripts/consultaCliente.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Turn Motors | Editar perfil</title>

    <!-- Arquivos do Bootstrap -->
    <link rel="stylesheet" href="../assets/css/css-bootstrap/bootstrap.min.css">
    <script src="../assets/js/js-bootstrap/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../assets/js/validacaoForm.js" defer></script>
    <script src="../assets/js/mascaraTelefone.js" defer></script>

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
                <h2 class="banner__titulo">Olá, <?= $_SESSION['nomeCliente'] ?>!</h2>
                <img src="../assets/img/perfilPic.svg" class="banner__imagem">
            </div>



            <div class="container text-center">
                <div class="row">
                    <div class="col">
                        <div class="informacoes-cadastro">
                            <div class="informacoes__imagem-perfil">
                                <img src="../assets/img/img-perfil.png" class="imagem-perfil__imagem">
                            </div>
                            <form action="" method="post" class="informacoes__formulario">
                                <input type="text" name="nome" id="nome" value="<?= $_SESSION['nomeCliente'] ?>" disabled class="formulario__campo" />
                                <input type="email" name="email" id="email" value="<?= $_SESSION['email'] ?>" disabled class="formulario__campo" />
                                <input type="tel" name="telefone" id="telefone" value="<?= $_SESSION['telefone'] ?>" disabled class="formulario__campo" />
                                <input type="date" name="dataNasc" id="dataNasc" disabled class="formulario__campo" value="<?= $_SESSION['dataNasc'] ?>" />
                                <input type="text" name="plano" id="plano" value="Plano: <?= $_SESSION['plano'] ?>" disabled class="formulario__campo" />
                                <input type="password" disabled class="formulario__campo" value="******" />

                                <a href="../pags/beneficios.php" class="formulario__botao">
                                    Ver Benefícios
                                </a>
                                <a href="#" class="formulario__botao">
                                    Trocar o Plano
                                </a>
                                <a href="../assets/scripts/logout.php" class="formulario__botao">
                                    Sair
                                </a>
                            </form>
                        </div>
                    </div>

                    <div id="div__edicao" class="col">
                        <form action="../assets/scripts/editarCliente.php" method="POST">
                            <div class="titulo">
                                <h1 class="mainTitle">Editar Perfil</h1>
                            </div>
                            <div class="cadastro">
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

                                <div class="caixa__input">
                                    <input type="text" required name="tel" id="tel" autocomplete="off" maxlength="14" pattern="^\(\d{2}\)\d{5}-\d{4}$">
                                    <label for="tel">Telefone</label>
                                </div>

                                <div class="div__termos">
                                    <div class="filho__termos"><label for="termos"><input type="checkbox" name="termos" id="termos" required>Aceitar Termos de condições</label></div>
                                </div>
                                <br>
                                <button type="submit" class="formulario__botao">
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