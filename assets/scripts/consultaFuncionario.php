<?php
require_once('conexao.php');

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['rf'])) {
    $root = $_SERVER['HTTP_HOST'];
    $caminho = "http://$root/IBM-site/pags/login.php";

    $tituloModal = "Erro nas Credenciais!";
    $textoModal = "Você precisa ser um funcionário Turn Motors para entrar.";
    require_once("../assets/components/modal.php");
}
