<?php

require_once('conexao.php');
require_once('iniciarSessao.php');
require_once('consultaCliente.php');

$id = (int)$_SESSION['id'];

$idProduto = $_POST['idProduto'];

$sqlInsert = "INSERT INTO favoritos (id_produto, id_cliente) VALUES ($idProduto, $id)";

$sth = $pdo->prepare("SELECT count(*) as total FROM `favoritos` WHERE favoritos.id_produto='$idProduto' && favoritos.id_cliente='$id'");
$sth->execute();
$result = ($sth->fetchColumn());

$stmtFavorito = $pdo->prepare($sqlInsert);

if ($result == 0 && $stmtFavorito->execute()) {
  $root = $_SERVER['HTTP_HOST'];
  $caminho = "http://$root/IBM-site/pags/produtos.php";

  echo "
   <script>
    alert('Favorito cadastrado com sucesso!');
    setInterval( function() {
      window.location.href = '$caminho'
    }, 0)
   </script>";
} else {
    $root = $_SERVER['HTTP_HOST'];
    $caminho = "http://$root/IBM-site/pags/produtos.php";
    echo "
   <script>
    alert('Esse produto já está favoritado!');
    setInterval( function() {
      window.location.href = '$caminho'
    }, 0)
   </script>";
}
