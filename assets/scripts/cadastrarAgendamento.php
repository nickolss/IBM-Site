<?php
    //verifica se o arquivo 'conexao.php' está incluido, se sim não irá incluir novamente
    require_once('./conexao.php');

    //passa as informações do forms para variaveis
    $cor = $_POST['corAtual'];
    $modelo = $_POST['modelo'];
    $placa = $_POST['placa'];
    $data = $_POST['data'];
    $horario = $_POST['horario'];

    //comando sql para inserção de dados do veículo no banco
    //AINDA FALTA O CAMPO ID_CLIENTE
    $sqlInsertCarro = "INSERT INTO `carro` (`placa`, `modelo`, `cor`) VALUES (`$placa`, `$modelo`, `$cor`)";

    //execução do comando sql
    $inserirDadosCarro = $pdo->prepare($sqlInsertCarro);

    //comando sql para inserção de dados do agendamento no banco
    //AINDA FALTA O CAMPO ID_CLIENTE
    $sqlInsertAgendamento = "INSERT INTO `agendamento` (`data_agendamento`, `placa_carro`) VALUES (`$data`, `$placa`)";

    //execução do comando sql
    $inserirDadosAgendamento = $pdo->prepare($sqlInsertAgendamento);

?>

