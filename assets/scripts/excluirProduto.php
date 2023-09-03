<?php 
    require_once('./conexao.php');

    $id = (int) $_POST['btn-pedido-orcamento'];
    $deletar = $pdo->prepare("DELETE FROM `produto` WHERE codigoProduto=$id");

    if($deletar->execute()){
        header("Location: ../../administrador/catalogo.php");
    }
?>