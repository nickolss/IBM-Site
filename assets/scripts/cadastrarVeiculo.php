<?php
require_once('./conexao.php');
require_once('./iniciarSessao.php');

$apelidoForm = $_POST['apelidoProd'];
$placaForm = $_POST['placaProd'];
$modeloForm = $_POST['modeloProd'];
$corForm = $_POST['corProd'];
$id = $_SESSION['id'];

$sqlInsert = "INSERT INTO `carro`(`placa`, `id_dono`, `apelido`, `modelo`, `cor`) VALUES ('$placaForm','$id','$apelidoForm','$modeloForm','$corForm')";

$cadastrarVeiculo = $pdo->prepare($sqlInsert);

if ($cadastrarVeiculo->execute()) {
    header("Location: ../../pags/perfil.php");
}
