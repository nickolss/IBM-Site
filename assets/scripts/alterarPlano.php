<?php
require_once("./conexao.php");
require_once("./iniciarSessao.php");

$idCliente = $_SESSION['id'];
$plano = $_POST['plano'];
$sqlTrocarPlano = $pdo->prepare("UPDATE `cliente` SET `plano`='$plano' WHERE id=$idCliente");

if ($plano == "turbinado") {
    $_SESSION['plano'] = $plano;
    header("Location: ../../pags/pagamentoTurbinadoCartao.php");
} else if ($sqlTrocarPlano->execute()) {
    $_SESSION['plano'] = $plano;
    header("Location: ../../pags/perfil.php");
}
