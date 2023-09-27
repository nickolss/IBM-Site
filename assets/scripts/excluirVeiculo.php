<?php 
    require_once('./conexao.php');

    $idVeiculo = $_GET['idVeiculo'];
    $deletar = $pdo->prepare("DELETE FROM `carro` WHERE idVeiculo = $idVeiculo");

    if($deletar->execute()){
        header("Location: ../../pags/veiculos.php");
    }
?>