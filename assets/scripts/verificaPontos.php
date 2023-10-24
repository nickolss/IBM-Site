<?php
require_once("conexao.php");
require_once("iniciarSessao.php");

$id = $_SESSION['id'];
$sqlPontos = $pdo->query("SELECT `quantidadePontos` FROM `cliente` WHERE id = $id LIMIT 1");
$pontos = $sqlPontos->fetch();