<?php
    require_once('conexao.php'); //requirindo o arquivo conexao.php
    require_once('./iniciarSessao.php'); //verifica se o arquivo 'iniciarSessao.php' está incluindo, executando-o

    //atribuindo as variaveis os valores que vieram do formulario
    $data = $_POST['data'];
    $horario = $_POST['horario'];
    $placa = $_POST['placaCarro'];
    $personalizacao = $_POST['personalizacao'];
    $btnValue = $_POST['btn-pedido-orcamento'];
 
    $id = (int)$_SESSION['id']; //atribuindo o 'id' da sessão atual para a variável $id

    $sql = "INSERT INTO `agendamento` (`data_agendamento`, `horario`, `id_cliente`, `placa_carro`, `agendamento`) VALUES ('$data', '$horario', $id, '$placa', '$personalizacao')";

    $stmt = $pdo->prepare($sql);

    if($stmt->execute()){
        if($btnValue == "confirmado"){
            $query_update_orcamento = "UPDATE `pedido_orcamento` 
                                    SET `status`='agendamento confirmado'
                                    WHERE `personalizacao`='$personalizacao' AND `placaCarro`='$placa' AND `id_cliente`='$id'
                                    LIMIT 1";
            $stmtOrcamento = $pdo->prepare($query_update_orcamento);

            if($stmtOrcamento->execute()){
                echo "<script>
                        alert('Agendamento confirmado.');
                        setInterval( function() {
                            window.location.href = '../../pags/perfil.php'
                        }, 0)
                    </script>";
                /* QUANDO SISTEMA DE ENVIAR EMAIL ESTIVER PRONTO
                    echo "<script>
                        alert('Agendamento confirmado com sucesso.');
                        setInterval( function() {
                            window.location.href = 'enviarEmailAgendamento.php'
                        }, 0)
                    </script>";*/
            }

        }else if($btnValue == "cancelado"){
            $query_update_orcamento = "UPDATE `pedido_orcamento` 
                                    SET `status`='cliente cancelado'
                                    WHERE `personalizacao`='$personalizacao' AND `placaCarro`='$placa' AND `id_cliente`='$id'
                                    LIMIT 1";
            $stmtOrcamento = $pdo->prepare($query_update_orcamento);

            if($stmtOrcamento->execute()){
                echo "<script>
                        alert('Agendamento cancelado.');
                        setInterval( function() {
                            window.location.href = '../../pags/perfil.php'
                        }, 0)
                    </script>";
            }
        }
    }

?>