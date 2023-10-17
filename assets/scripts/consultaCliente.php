<?php
require_once('iniciarSessao.php');
if (!isset($_SESSION['nomeCliente'])) {
  $root = $_SERVER['HTTP_HOST'];
  $caminho = "http://$root/IBM-site/pags/login.php";

  $tituloModal = "Erro nas Credenciais!";
  $textoModal = "Você precisa estar logado.";
  require_once('../assets/components/modal.php');
}
