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
$planoForm = $_POST['plano'];

$senhaSegura = md5($senhaForm);
$cpfSeguro = md5($cpfForm);
$telefoneFormatado = str_replace(['(', ')', '-'], '', $telefoneForm);

$sqlInsert = "INSERT INTO `cliente`(`cpf`, `nomeCompleto`, `dataNasc`, `telefone`, `email`, `senha`, `plano`, `quantidadePontos`, `fotoPerfil`) VALUES ('$cpfSeguro','$nomeForm','$dataNascForm','$telefoneFormatado','$emailForm','$senhaSegura','$planoForm','0', 'default-img-profile.png')";

$cadastrarCliente = $pdo->prepare($sqlInsert);

if ($cadastrarCliente->execute()) {
    $sqlCliente = $pdo->query("SELECT * FROM `cliente` WHERE cliente.email='$emailForm' && cliente.senha='$senhaSegura'");
    $quantidadeRegistrosCliente = $sqlCliente->rowCount();
    $registroCliente = $sqlCliente->fetchAll();

    if ($quantidadeRegistrosCliente == 1) {
        $_SESSION['id'] = $registroCliente[0]['id'];
        $_SESSION['nomeCliente'] = $nomeForm;
        $_SESSION['email'] = $emailForm;
        $_SESSION['telefone'] = $telefoneForm;
        $_SESSION['dataNasc'] = $dataNascForm;
        $_SESSION['cpf'] = $cpfForm;
        $_SESSION['senha'] = $senhaForm;
        $_SESSION['plano'] = $planoForm;
        $_SESSION['quantidadePontos'] = 0;
        $_SESSION['fotoPerfil'] = null;

        header("Location: ../../pags/perfil.php");
    }


    
}
