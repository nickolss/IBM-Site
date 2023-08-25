<?php

    require_once('conexao.php'); //fazendo conexao com o bd

    $idForm = $_POST['id'];
    $senhaForm = $_POST['senha'];
    $senhaSegura = md5($senhaForm);
    $vazio = 'NULL';

    $query_update_cliente = "UPDATE cliente 
                                SET senha='$senhaSegura', recuperar_senha='NULL'
                                WHERE id='$idForm'";
    $resultado_update_cliente = $pdo->query($query_update_cliente);

    if($resultado_update_cliente->execute()){
        echo "<script>
            alert('Senha atualizada com sucesso!.');
            setInterval( function() {
                window.location.href = 'https://turnmotors.000webhostapp.com/pags/login.php'
            }, 0)
            </script>";
    }else{//se a query $resultado_update_cliente NÃO for executada com sucesso:
        echo "<script>
            alert('ERRO: Tente novamente.');
            setInterval( function() {
                window.location.href = 'https://turnmotors.000webhostapp.com/pags/atualizar-senha.php'
            }, 0)
            </script>";
    }

?>