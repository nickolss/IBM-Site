<?php

require_once('conexao.php');
require_once('iniciarSessao.php');
require_once('consultaCliente.php');

$id = (int)$_SESSION['id'];

$idProduto = $_POST['idProduto'];

$sqlInsert = "INSERT INTO favoritos (id_produto, id_cliente) VALUES ($idProduto, $id)";

$stmtCurriculo = $pdo->prepare($sqlInsert);

if ($stmtCurriculo->execute()) {
  $root = $_SERVER['HTTP_HOST'];
  $caminho = "http://$root/IBM-site/pags/perfil.php";

  echo "
   <script>
    alert('Favorito cadastrado com sucesso!.');
    setInterval( function() {
      window.location.href = '$caminho'
    }, 0)
   </script>";
}
