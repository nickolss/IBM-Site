<?php
require_once('conexao.php');

$nomeCompleto = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$telefone = $_POST['telefone'];
$dataNasc = $_POST['dataNasc'];
$cpf = $_POST['cpf'];
$plano = $_POST['plano'];

date_default_timezone_set("America/Sao_Paulo");
$dataCriacaoConta = date('Y-m-d');

$cpf = str_replace([".", "-"], "", $cpf); //Retirado os pontos e - do cpf
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
