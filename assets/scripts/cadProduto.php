<?php
    require_once('conexao.php');
    
    $imagemProd = $_FILES['imgProd'];
    $nomeImagem = $imagemProd['name'];
    $nome = $_POST['nomeProd'];
    $preco = $_POST['precoProd'];
    $marca = $_POST['marcaProd'];
    $descricao = $_POST['descricaoProd'];
    $categoria = $_POST['categoria'];

    $pasta = '../img/produtos/';
    $extensaoArquivo = strtolower(pathinfo($imagemProd['name'] , PATHINFO_EXTENSION));
    $caminho = $pasta . $nomeImagem;
    $moverImagem = move_uploaded_file($imagemProd['tmp_name'] , $caminho);

    $sqlInsert = "INSERT INTO produto (nome, preco, marca, descricao, customizações , caminho-imagem) VALUES ('$nome', $preco, '$marca', '$descricao', '$categoria' , $caminho)";

    $inserirProduto = $pdo->prepare($sqlInsert);

    if ($inserirProduto->execute()) {
        header("Location: ../../pags/$categoria.php");
    }

// 
