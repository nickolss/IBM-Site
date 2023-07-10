<?php
require_once('conexao.php');

$nomeCompleto = $_POST['nome'];
$email = $_POST['email'];
$senha = password_hash($_POST['senha'] , PASSWORD_DEFAULT);
$telefone = $_POST['telefone'];
$dataNasc = $_POST['dataNasc'];
$cpf = password_hash($_POST['cpf'] , PASSWORD_DEFAULT);
$plano = $_POST['plano'];

date_default_timezone_set("America/Sao_Paulo");
$dataCriacaoConta = date('Y-m-d');


$telefone = str_replace(["(", ")", "-"], "", $telefone); //Retirado os parênteses e - do telefone



$sqlInsert = "INSERT INTO `Cliente`(`cpf`, `nome`, `dataNascimento`, `telefone`, `email`, `senha`, `plano`, `dataCriacaoConta`) VALUES ('$cpf','$nomeCompleto','$dataNasc','$telefone','$email','$senha','$plano','$dataCriacaoConta')";
$cadastrarCliente = $pdo->prepare($sqlInsert);

$sqlQuery = "SELECT `cpf` FROM `Cliente` WHERE `cpf`=$cpf";
$realizarConsulta = $pdo->query($sqlQuery);
$registros = $realizarConsulta->rowCount();


if ($registros >= 1) {
    echo "Já existe uma conta cadastrada com esse CPF";
} else {
    if ($cadastrarCliente->execute()) {
        if(!isset($_SESSION)){
            session_start();
        }

        $_SESSION['plano'] = $plano;
        $_SESSION['nome'] = $nomeCompleto;
        $_SESSION['telefone'] = $telefone;

        header("Location: ../index.html");
    }
}
