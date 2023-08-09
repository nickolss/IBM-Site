<?php
    require_once('conexao.php');

    $nome = $_POST['nomeProd'];
    $preco = $_POST['precoProd'];
    $descricao = $_POST['descricaoProd'];
    $categoria = $_POST['categoria'];

    $sqlInsert = "INSERT INTO produtos (nome, preco, descricao, categoria) VALUES ('$nome', $preco, '$descricao', '$categoria')";

    $inserirProduto = $pdo->prepare($sqlInsert);

    if ($inserirProduto->execute()) {
        header("Location: ../../pags/$categoria.php");
    }

?>

