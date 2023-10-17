<?php
    require_once('../assets/scripts/iniciarSessao.php');
    require_once('../assets/scripts/consultaCliente.php');

    $txtExperiencia = $_POST['experiencia'];

    $id = $_SESSION['id'];
    $sqlInsert = "INSERT INTO `experienciaUser` (`texto`, `id_cliente`) VALUES ('$txtExperiencia', '$id')";
    $stmt = $pdo->prepare($sqlInsert);

    if($stmt->execute()){
        require_once("../components/modal.php");
    }

?>