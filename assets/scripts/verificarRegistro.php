<?php 
    require_once('./conexao.php');
    $emailForm = $_POST['email'];
    $senhaForm = $_POST['senha'];

    $consulta = "SELECT * FROM `funcionario` , `cliente`";
    $registros = $pdo->query($consulta);

    var_dump($registros);
?>