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

$senhaSegura = password_hash($senhaForm, PASSWORD_DEFAULT);
$cpfSeguro = password_hash($cpfForm, PASSWORD_DEFAULT);

$sqlInsert = "INSERT INTO `cliente`(`cpf`, `nomeCompleto`, `dataNasc`, `telefone`, `email`, `senha`, `plano`, `quantidadePontos`) VALUES ('$cpfSeguro','$nomeForm','$dataNascForm','$telefoneForm','$emailForm','$senhaSegura','$planoForm','0')";

$cadastrarCliente = $pdo->prepare($sqlInsert);

if ($cadastrarCliente->execute()) {
    header("Location: ../../pags/perfil.php");
}
