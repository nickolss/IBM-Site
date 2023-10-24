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
            require_once('conexao.php'); //requirindo o arquivo conexao.php
            require_once('./iniciarSessao.php'); //verifica se o arquivo 'iniciarSessao.php' está incluindo, executando-o

            //atribuindo as variaveis os valores que vieram do formulario
            $personalizacao = $_POST['personalizacao'];
            $placa = $_POST['placaCarro'];
            $btnValue = $_POST['btn-pedido-orcamento']; 
            
            $id = (int)$_SESSION['id']; //atribuindo o 'id' da sessão atual para a variável $id

            //se o valor do botao for "cancelado", irá fazer uma query SQL atualizando o campo "status" para "cliente cancelado" e redireciona para a página para a de perfil
            if($btnValue == "cancelado"){
                $query_update_orcamento = "UPDATE `pedido_orcamento` 
                                        SET `status`='cliente cancelado', `preco`=''
                                        WHERE `personalizacao`='$personalizacao' AND `placaCarro`='$placa' AND `id_cliente`='$id'
                                        LIMIT 1";
                $stmt = $pdo->prepare($query_update_orcamento);

                if($stmt->execute()){
                    $tituloModal = "Orçamento Cancelado!";
                    $textoModal = "Esperamos que volte a comprar conosco.";
                    require_once("../components/modal.php");
                }

            //se o valor do botao for "confirmado", irá fazer uma query SQL atualizando o campo "status" para "confirmado" e o campo "preco" com seu preco correspondente, logo após redireciona para a página de Cadastrar Orçamento
            }else if($btnValue == "confirmado"){
                $query_update_orcamentoConfirmado = "UPDATE `pedido_orcamento` 
                                        SET `status`='cliente confirmado'
                                        WHERE `personalizacao`='$personalizacao' AND `placaCarro`='$placa' AND `id_cliente`='$id'
                                        LIMIT 1";
                $stmtConfirmado = $pdo->query($query_update_orcamentoConfirmado);

                if($stmtConfirmado->execute()){
                    $tituloModal = "Orçamento Confirmado com Sucesso!";
                    $textoModal = "Agradecemos por comprar com a Turn Motors.";
                    require_once("../components/modal.php");
                }
            }
        ?>
    </body>
</html>