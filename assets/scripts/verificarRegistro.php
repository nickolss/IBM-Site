<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/modal.min.css">
        <title>Turn Motors</title>
    </head>
    <body>
        <?php
            require_once('./conexao.php');
            
            $emailForm = $_POST['email'];
            $senhaForm = $_POST['senha'];
            $senhaFormatada = md5($senhaForm);

            $sqlCliente = $pdo->query("SELECT * FROM `cliente` WHERE email='$emailForm' && senha='$senhaFormatada'");
            $quantidadeRegistrosCliente = $sqlCliente->rowCount();
            $registroCliente = $sqlCliente->fetchAll();

            $sqlFuncionarioAdministrativo = $pdo->query("SELECT * FROM `funcionario` WHERE email='$emailForm' && senha='$senhaFormatada'");
            $quantidadeRegistrosFuncionarioAdm = $sqlFuncionarioAdministrativo->rowCount();
            $registroFuncionarioAdm = $sqlFuncionarioAdministrativo->fetchAll();

            $sqlMecanico = $pdo->query("SELECT * FROM `mecanico` WHERE email='$emailForm' && senha='$senhaFormatada'");
            $quantidadeRegistrosMecanico = $sqlMecanico->rowCount();
            $registroMecanico = $sqlMecanico->fetchAll();

            if ($quantidadeRegistrosCliente == 1) {
                if (isset($_SESSION)) {
                    require_once('./logout.php');
                }

                require_once('./iniciarSessao.php');


                $_SESSION['id'] = $registroCliente[0]['id'];
                $_SESSION['nomeCliente'] = $registroCliente[0]['nomeCompleto'];
                $_SESSION['email'] = $registroCliente[0]['email'];
                $_SESSION['telefone'] = $registroCliente[0]['telefone'];
                $_SESSION['dataNasc'] = $registroCliente[0]['dataNasc'];
                $_SESSION['cpf'] = $registroCliente[0]['cpf'];

                $_SESSION['plano'] = $registroCliente[0]['plano'];
                $_SESSION['quantidadePontos'] = $registroCliente[0]['quantidadePontos'];
                $_SESSION['fotoPerfil'] = $registroCliente[0]['fotoPerfil'];

                header('Location: ../../pags/perfil.php');
            } else {
                $tituloModal = "Erro ao Logar!";
                $textoModal = "Email ou senha inválidos, tente novamente";
                require_once("../components/modal.php");
            }
            
            if ($quantidadeRegistrosFuncionarioAdm == 1) {
                if (isset($_SESSION)) {
                    require_once('./logout.php');
                }
                require_once('./iniciarSessao.php');

                $_SESSION['rf'] = $registroFuncionarioAdm[0]['rf'];
                $_SESSION['nomeFuncionario'] = $registroFuncionarioAdm[0]['nome'];

                header("Location: ../../administrador/dashboard.php");
            }

            if ($quantidadeRegistrosMecanico == 1) {
                if (isset($_SESSION)) {
                    require_once('./logout.php');
                }
                require_once('./iniciarSessao.php');

                $_SESSION['rfMec'] = $registroMecanico[0]['rf'];
                $_SESSION['nomeFuncionario'] = $registroMecanico[0]['nome'];

                header("Location: ../../administrador/dashboard.php");
            }
        ?>
    </body>
</html>