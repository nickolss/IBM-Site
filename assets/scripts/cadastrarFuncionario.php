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

$senhaSegura = password_hash($senhaForm, PASSWORD_DEFAULT);
$cpfSeguro = password_hash($cpfForm, PASSWORD_DEFAULT);
$telefoneFormatado = str_replace(['(' , ')' , '-'] , '' , $telefoneForm);

$sqlInsert = "INSERT INTO `funcionario`(`cpf`, `nomeCompleto`, `dataNasc`, `telefone`, `email`, `senha`) VALUES ('$cpfSeguro','$nomeForm','$dataNascForm','$telefoneFormatado','$emailForm','$senhaSegura')";

$cadastrarFuncionario = $pdo->prepare($sqlInsert);
