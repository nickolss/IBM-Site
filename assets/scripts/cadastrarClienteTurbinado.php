<?php

    require_once('./conexao.php');
    require_once('./iniciarSessao.php');
    require_once('./consultaCliente.php');
    
    $id = $_SESSION['id'];

    $query_update_conta = "UPDATE `cliente` 
                                SET `plano`='turbinado'
                                WHERE `id`='$id'
                                LIMIT 1";
    $stmt = $pdo->prepare($query_update_conta);

    if($stmt->execute()){
        header("Location: ../../pags/perfil.php");
    }

?>