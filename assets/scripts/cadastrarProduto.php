<?php
    require_once('conexao.php');

    $nome = $_POST['nomeProd'];
    $preco = $_POST['precoProd'];
    $marca = $_POST['marcaProd'];
    $descricao = $_POST['descricaoProd'];
    $categoria = $_POST['categoria'];

    $sqlInsert = "INSERT INTO produto (nome, preco, marca, descricao, customizações) VALUES ('$nome', $preco, '$marca', '$descricao', '$categoria')";

    $inserirProduto = $pdo->prepare($sqlInsert);

    if ($inserirProduto->execute()) {
        header("Location: ../../pags/$categoria.php");
    }

?>

