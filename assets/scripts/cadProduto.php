<?php
    require_once('conexao.php');
    
    $imagemProd = $_FILES['imgProd'];
    $nomeImagem = $imagemProd['name'];
    $nome = $_POST['nomeProd'];
    $preco = $_POST['precoProd'];
    $marca = $_POST['marcaProd'];
    $descricao = $_POST['descricaoProd'];
    $categoria = $_POST['categoria'];

    $pastaBD = '../assets/img/produtos/';
    $pastaSalvar = "../../assets/img/produtos/";
    $extensaoArquivo = strtolower(pathinfo($imagemProd['name'] , PATHINFO_EXTENSION));
    $caminhoBD = $pastaBD . $nomeImagem;
    $caminhoSalvar = $pastaSalvar . $nomeImagem;
    $moverImagem = move_uploaded_file($imagemProd['tmp_name'] , $caminhoSalvar);

    $sqlInsert = "INSERT INTO produto (nome, preco, marca, descricao, customizações , caminho_imagem) VALUES ('$nome', $preco, '$marca', '$descricao', '$categoria' , '$caminhoBD')";

    $inserirProduto = $pdo->prepare($sqlInsert);

    if ($inserirProduto->execute()) {
        header("Location: ../../pags/$categoria.php");
    }

