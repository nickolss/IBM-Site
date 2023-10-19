<?php

    require_once('../assets/scripts/conexao.php');
    require_once('../assets/scripts/iniciarSessao.php');
    require_once('../assets/scripts/consultaCliente.php');
    
    $id = $_SESSION['id'];

    $query_update_conta = "UPDATE `cliente` 
                                SET `plano`='turbinado'
                                WHERE `id`='$idNovoCliente'
                                LIMIT 1";
    $stmt = $pdo->prepare($query_update_orcamento);

    if($stmt->execute()){
        header("Location: ../../pags/perfil.php");
    }

?>