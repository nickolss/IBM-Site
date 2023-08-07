<?php
require_once('./conexao.php');
$emailForm = $_POST['email'];
$senhaForm = $_POST['senha'];

$consultaFunc = $pdo->query("SELECT * FROM `funcionario`");
$consultaClie = $pdo->query("SELECT * FROM `cliente`");

$registroFunc = $consultaFunc->fetchAll();
$registroClie = $consultaClie->fetchAll();

var_dump($registroFunc);