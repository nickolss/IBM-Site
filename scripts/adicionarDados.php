<?php 
    //require_once('conexao.php');

    $nomeCompleto = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];
    $dataNasc = $_POST['dataNasc'];
    $cpf = $_POST['cpf'];
    $plano = $_POST['plano'];

    echo $nomeCompleto . $email . $senha . $telefone . $dataNasc . $cpf . $plano;