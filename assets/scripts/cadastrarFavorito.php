<?php

require_once('conexao.php');
require_once('iniciarSessao.php');
require_once('consultaCliente.php');

$id = (int)$_SESSION['id'];

$idProduto = $_POST['idProduto'];
$Url_Permanecer = $_POST['url'];
$sqlInsert = "INSERT INTO favoritos (id_produto, id_cliente) VALUES ($idProduto, $id)";

$sth = $pdo->prepare("SELECT count(*) as total FROM `favoritos` WHERE favoritos.id_produto='$idProduto' && favoritos.id_cliente='$id'");
$sth->execute();
$result = ($sth->fetchColumn());

$stmtFavorito = $pdo->prepare($sqlInsert);

if ($result == 0 && $stmtFavorito->execute()) {
    header("Location: $Url_Permanecer");
  
} 

if ($result > 0) {
    // Remova o produto dos favoritos do cliente
    $sqlDelete = "DELETE FROM favoritos WHERE id_produto = :idProduto AND id_cliente = :idCliente";
    $stmtFavorito = $pdo->prepare($sqlDelete);
    $stmtFavorito->bindParam(':idProduto', $idProduto, PDO::PARAM_INT);
    $stmtFavorito->bindParam(':idCliente', $id, PDO::PARAM_INT);
    if ($stmtFavorito->execute()) {
        // Redirecione de volta para a página de produtos após a remoção
       
       
        header("Location: $Url_Permanecer");
        exit;
    } else {
        echo "Erro ao remover o produto dos favoritos.";
    }
} else {
    echo "O produto não está nos favoritos do cliente.";
}
