<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/modal.min.css">
        <title>Turn Motors</title>
    </head>
    <body>
        <?php

            use function PHPSTORM_META\type;

            require_once('conexao.php'); //requirindo o arquivo conexao.php
            require_once('./iniciarSessao.php'); //verifica se o arquivo 'iniciarSessao.php' está incluindo, executando-o

            //atribuindo as variaveis os valores que vieram do formulario
            $personalizacao = $_POST['personalizacao'];
            $btnValue = $_POST['btn-pedido-orcamento'];
            $idDono = $_SESSION['id'];

            $sqlVeiculo = $pdo->query("SELECT `placaCarro`, `data`, `horario` FROM `pedido_orcamento` WHERE id_cliente = '$idDono' && status = 'cliente confirmado'");
            $pedidoOrcamento = $sqlVeiculo->fetchAll();
            $placa = $pedidoOrcamento[0]['placaCarro'];
            $data = $pedidoOrcamento[0]['data'];
            $horario = $pedidoOrcamento[0]['horario'];

            $id = (int)$_SESSION['id']; //atribuindo o 'id' da sessão atual para a variável $id

            $sql = "INSERT INTO `agendamento` (`data_agendamento`, `horario`, `id_cliente`, `placa_carro`, `agendamento`) VALUES ('$data', '$horario', $id, '$placa', '$personalizacao')";

            $stmt = $pdo->prepare($sql);

            if ($stmt->execute()) {

                if ($btnValue == "confirmado") {

                    $query_update_orcamento = "UPDATE `pedido_orcamento` 
                                                SET `status`='agendamento confirmado'
                                                WHERE `personalizacao`='$personalizacao' AND `placaCarro`='$placa' AND `id_cliente`='$id'
                                                LIMIT 1";
                    $stmtOrcamento = $pdo->prepare($query_update_orcamento);

                    if ($stmtOrcamento->execute()) {
                        $tituloModal = "Agendamento Confirmado!";
                        $textoModal = "Obrigado por escolher a Turn Motors!";
                        require_once("../components/modal.php");
                    }
                } else if ($btnValue == "cancelado") {
                    $query_update_orcamento = "UPDATE `pedido_orcamento` 
                                                SET `status`='cliente cancelado'
                                                WHERE `personalizacao`='$personalizacao' AND `placaCarro`='$placa' AND `id_cliente`='$id'
                                                LIMIT 1";
                    $stmtOrcamento = $pdo->prepare($query_update_orcamento);

                    if ($stmtOrcamento->execute()) {
                        $tituloModal = "Agendamento Cancelado!";
                        $textoModal = "Esperamos que volte a comprar conosco. :'(";
                        require_once("../components/modal.php");
                    }
                }
            }
        ?>
    </body>
</html>
