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
            //SCRIPT PHP PARA O MECÂNICO ACEITAR OU NEGAR O ORÇAMENTO DO CLIENTE

            require_once('conexao.php'); //requirindo o arquivo conexao.php

            
            //atribuindo as variaveis os valores que vieram do formulario
            $dataOrcamento = $_POST['dataOrcamento'];
            $horarioOrcamento = $_POST['horarioOrcamento'];
            $btnValue = $_POST['btn-pedido-orcamento'];
            
            $placa = $_GET['placa']; //atribuindo a variavel o valor que veio da url
            
            //se o valor do botao for "cancelado", irá fazer uma query SQL atualizando o campo "status" para "confirmado" e redireciona para a página de Cadastrar Orçamento
            if($btnValue == "cancelado"){
                $query_update_orcamento = "UPDATE `pedido_orcamento` 
                                        SET `status`='cliente cancelado'
                                        WHERE `data`='$dataOrcamento' AND `horario`='$horarioOrcamento' AND `placaCarro`='$placa'
                                        LIMIT 1";
                $stmt = $pdo->prepare($query_update_orcamento);

                if($stmt->execute()){
                    $tituloModal = "Orçamento Cancelado!";
                    $textoModal = "Esperamos que volte a comprar conosco. :'(";
                    require_once("../components/modal.php");
                }

            //se o valor do botao for "confirmado", irá fazer uma query SQL atualizando o campo "status" para "confirmado" e o campo "preco" com seu preco correspondente, logo após redireciona para a página de Cadastrar Orçamento
            }else if($btnValue == "confirmado"){
                $query_update_orcamentoConfirmado = "UPDATE `pedido_orcamento` 
                                        SET `status`='cliente confirmado'
                                        WHERE `data`='$dataOrcamento' AND `horario`='$horarioOrcamento' AND `placaCarro`='$placa'
                                        LIMIT 1";
                $stmtConfirmado = $pdo->query($query_update_orcamentoConfirmado);

                if($stmtConfirmado->execute()){
                    $tituloModal = "Orçamento Confirmado com Sucesso!";
                    $textoModal = "Para prosseguir com o pedido entre na sua área do perfil e clique em 'Agendamentos Confirmados'.";
                    require_once("../components/modal.php");
                }
            }
        ?>
    </body>
</html>