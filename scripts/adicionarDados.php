<?php 
    require_once('conexao.php');

    $nomeCompleto = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];
    $dataNasc = $_POST['dataNasc'];
    $cpf = (int) $_POST['cpf'];
    $plano = $_POST['plano'];

    date_default_timezone_set("America/Sao_Paulo");
    $dataCriacaoConta = date('Y-m-d');

    $cpf = str_replace(["." , "-"] , "" , $cpf); //Retirado os pontos e - do cpf
    $telefone = str_replace(["(" , ")" , "-"] , "" , $telefone); //Retirado os parênteses e - do telefone
    
    
    $sqlInsert = "INSERT INTO `Cliente`(`cpf`, `nome`, `dataNascimento`, `telefone`, `email`, `senha`, `plano`, `dataCriacaoConta`) VALUES ('$cpf','$nomeCompleto','$dataNasc','$telefone','$email','$senha','$plano','$dataCriacaoConta')";

    $cadastrarCliente = $pdo->prepare($sqlInsert);
    
    if($cadastrarCliente->execute()){
        header("Location: ../index.html");
    }
    