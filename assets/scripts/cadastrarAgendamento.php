<?php
    require_once('./conexao.php'); //verifica se o arquivo 'conexao.php' está incluido, se sim não irá incluir novamente
    require_once('./iniciarSessao.php'); //verifica se o arquivo 'iniciarSessao.php' está incluindo, executando-o

    //passa as informações do forms para variaveis
    $cor = $_POST['corAtual'];
    $modelo = $_POST['modelo'];
    $placa = $_POST['placa'];
    $data = $_POST['data'];
    $horario = $_POST['horario'];

    $id = $_SESSION['id']; 

    //comando sql para inserção de dados do veículo no banco
    //AINDA FALTA O CAMPO ID_CLIENTE
    $sqlInsertCarro = "INSERT INTO `carro` (`placa`, `id_dono`,`modelo`, `cor`) VALUES (`$placa`,`$id`,`$modelo`, `$cor`)";

    //execução do comando sql
    $inserirDadosCarro = $pdo->prepare($sqlInsertCarro);

    //comando sql para inserção de dados do agendamento no banco
    //AINDA FALTA O CAMPO ID_CLIENTE
    $sqlInsertAgendamento = "INSERT INTO `agendamento` (`data_agendamento`,`id_cliente`,`placa_carro`) VALUES (`$data`,`$id`,`$placa`)";

    //execução do comando sql
    $inserirDadosAgendamento = $pdo->prepare($sqlInsertAgendamento);

?>

