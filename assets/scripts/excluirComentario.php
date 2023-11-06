<?php
require_once("./conexao.php");

$idProd = $_GET['mercadoria'];
$idComprador = $_GET["comprador"];
$sqlDelete = $pdo->prepare("DELETE FROM `avaliacao` WHERE id_produto=$idProd && id_escritor=$idComprador");

if ($sqlDelete->execute()) {
    $tituloModal = "Avaliação Excluída";
    $textoModal = "Continue avaliando e ajudando a fortalecer a comunidade Turn Motors.";
    require_once('../components/modal.php');
}
