<?php
$idCliente = $_SESSION['id'];
$sqlCompras = $pdo->query("SELECT * FROM `produtosComprados` WHERE id_comprador=$idCliente");
$quantidadeDeCompras = $sqlCompras->rowCount();
$compras = $sqlCompras->fetchAll();

if (!empty($compras)) {
    $ultimaCompra = $compras[$quantidadeDeCompras - 1];
    $codProduto = $ultimaCompra['idProdutos'];

    $produtoImagemSql = $pdo->query("SELECT caminho_imagem FROM produto WHERE codigoProduto=$codProduto");
    $produtosImagem = $produtoImagemSql->fetch();
}
