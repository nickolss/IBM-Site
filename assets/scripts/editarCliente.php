<?php
require_once('conexao.php');
require_once('iniciarSessao.php');

$telefoneForm = $_POST['tel'];
$telefoneFormatado = str_replace(['(', ')', '-'], '', $telefoneForm);
$emailForm = $_POST['email'];
$senhaForm = $_POST['senha'];
$senhaFormatada = md5($senhaForm);
$idUser = (int)$_SESSION['id'];

$sqlUpdate = $pdo->prepare("UPDATE cliente SET telefone='$telefoneFormatado',email='$emailForm' , senha='$senhaFormatada' WHERE id=$idUser");

if ($sqlUpdate->execute()) {
    $_SESSION['senha'] = $senhaFormatada;
    $_SESSION['telefone'] = $telefoneForm;
    $_SESSION['email'] = $emailForm;
    header("Location: ../../pags/perfil.php");
}
