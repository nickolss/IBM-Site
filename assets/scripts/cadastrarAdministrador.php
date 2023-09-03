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

$senhaSegura = md5($senhaForm);
$cpfSeguro = md5($cpfForm);
$telefoneFormatado = str_replace(['(', ')', '-'], '', $telefoneForm);

$sqlInsert = "INSERT INTO `funcionario` (`cpf`, `dataNasc`, `telefone`, `nome`, `email`, `senha`) VALUES ('$cpfSeguro','$dataNascForm','$telefoneFormatado','$nomeForm','$emailForm','$senhaSegura')";

$cadastrarFuncionario = $pdo->prepare($sqlInsert);

if ($cadastrarFuncionario->execute()) {
    header("Location: ../../administrador/dashboard.php");
}