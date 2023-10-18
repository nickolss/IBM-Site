<?php
require_once('conexao.php');
require_once('iniciarSessao.php');

if (!isset($_SESSION['rf']) && !isset($_SESSION['rfMec'])) {
    $root = $_SERVER['HTTP_HOST'];
    $caminho = "http://$root/IBM-site/pags/login.php";

    $tituloModal = "Erro nas Credenciais!";
    $textoModal = "Você precisa ser um funcionário Turn Motors para entrar.";
    require_once("../assets/components/modal.php");
}
