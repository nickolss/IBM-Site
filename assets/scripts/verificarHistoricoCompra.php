<?php
require_once("conexao.php");
require_once("iniciarSessao.php");

$idComprador = $_SESSION['id'];
$sqlComprasFeitas = $pdo->query("SELECT * FROM `produtosComprados` WHERE id_comprador=$idComprador");
$comprasRealizadas = $sqlComprasFeitas->fetchAll();