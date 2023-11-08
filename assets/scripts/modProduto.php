<?php
    require_once('conexao.php');
    
    $imagemProd = $_FILES['imgProd'];
    $nomeImagem = $imagemProd['name'];
    $nome = $_POST['nomeProd'];
    $preco = $_POST['precoProd'];
    $pontos = $_POST['precoProd'];
    $marca = $_POST['marcaProd'];
    $descricao = $_POST['descricaoProd'];
    $categoria = $_POST['categoria'];
    $id = $_POST['id'];

    $pastaBD = '../assets/img/produtos/';
    $pastaSalvar = "../../assets/img/produtos/";
    $extensaoArquivo = strtolower(pathinfo($imagemProd['name'] , PATHINFO_EXTENSION));
    $caminhoBD = $pastaBD . $nomeImagem;
    $caminhoSalvar = $pastaSalvar . $nomeImagem;
    $moverImagem = move_uploaded_file($imagemProd['tmp_name'] , $caminhoSalvar);

    $sqlUpdate = $pdo->prepare("UPDATE `produto` SET `nome`='$nome',`preco`='$preco', `pontos`='$pontos', `marca`='$marca',`descricao`='$descricao',`caminho_imagem`='$caminhoBD', `TG_categoria`='$categoria' WHERE codigoProduto=$id");



    if ($sqlUpdate->execute()) {
        header("Location: ../../administrador/catalogo.php");
    }

