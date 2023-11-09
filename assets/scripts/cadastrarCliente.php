<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="../css/modal.min.css">
</head>

<body>
    <?php
    require_once('./conexao.php');
    require_once('./iniciarSessao.php');

    $nomeForm = $_POST['nome'];
    $emailForm = $_POST['email'];
    $senhaForm = $_POST['senha'];
    $confirmaSenha = $_POST['confirmarSenha'];
    $telefoneForm = $_POST['tel'];
    $dataNascForm = $_POST['data'];
    $cpfForm = $_POST['cpf'];
    $cep = $_POST['cep'];
    $rua = $_POST['address'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $bairro = $_POST['neighborhood'];
    $cidade = $_POST['city'];
    $estado = $_POST['region'];
    $btnValue = $_POST['plano'];

    $senhaSegura = md5($senhaForm);
    $cpfSeguro = md5($cpfForm);
    $telefoneFormatado = str_replace(['(', ')', '-'], '', $telefoneForm);

    $sqlInsert = "INSERT INTO `cliente`(`cpf`, `nomeCompleto`, `dataNasc`, `telefone`, `email`, `senha`, `plano`, `quantidadePontos`, `fotoPerfil`) VALUES ('$cpfSeguro','$nomeForm','$dataNascForm','$telefoneFormatado','$emailForm','$senhaSegura','comum','0', 'default-img-profile.svg')";

    $cadastrarCliente = $pdo->prepare($sqlInsert);

    $verificarClientes = $pdo->query("SELECT * FROM `cliente` WHERE email='$emailForm'");
    $clientes = $verificarClientes->rowCount();

    if ($clientes == 0) {

        if ($cadastrarCliente->execute()) {
            $sqlCliente = $pdo->query("SELECT * FROM `cliente` WHERE cliente.email='$emailForm' && cliente.senha='$senhaSegura'");
            $quantidadeRegistrosCliente = $sqlCliente->rowCount();
            $registroCliente = $sqlCliente->fetchAll();

            if ($quantidadeRegistrosCliente == 1) {
                $idNovoCliente = $registroCliente[0]['id'];
                $_SESSION['id'] = $idNovoCliente;
                $_SESSION['nomeCliente'] = $nomeForm;
                $_SESSION['email'] = $emailForm;
                $_SESSION['telefone'] = $telefoneForm;
                $_SESSION['dataNasc'] = $dataNascForm;
                $_SESSION['cpf'] = $cpfForm;
                $_SESSION['senha'] = $senhaForm;
                $_SESSION['plano'] = $btnValue;
                $_SESSION['quantidadePontos'] = 0;
                $_SESSION['fotoPerfil'] = null;

                $sqlRua = $pdo->query("INSERT INTO `endereco`(`rua`, `numero`, `complemento`, `bairro`, `cidade`, `estado`, `cep`, `id_morador`) VALUES ('$rua','$numero','$complemento','$bairro','$cidade','$estado','$cep','$idNovoCliente')");

                header("Location: ../../pags/perfil.php");
            }
        }

        if ($btnValue == "comum") {
            header("Location: ../../pags/perfil.php");
        } else if ($btnValue == "turbinado") {
            $id = $_SESSION['id'];
            $query_update_conta = "UPDATE `cliente` 
                                    SET `plano`='pendente'
                                    WHERE `id`='$id'
                                    LIMIT 1";
            $stmt = $pdo->prepare($query_update_conta);

            if ($stmt->execute()) {
                header("Location: ../../pags/pagamentoTurbinadoCartao.php");
            }
        }
    } else {
        $tituloModal = "Já existe uma conta com esse email!";
        $textoModal = "Selecione outro email para prosseguir com o cadastro.";
        require_once("../components/modal.php");
    }

    ?>

</body>

</html>