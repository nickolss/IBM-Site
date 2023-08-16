<?php
    require_once('./conexao.php'); //verifica se o arquivo 'conexao.php' está incluido, se sim não irá incluir novamente
    require_once('./iniciarSessao.php'); //verifica se o arquivo 'iniciarSessao.php' está incluindo, executando-o

    //passa as informações do forms para variaveis
    $corForm = $_POST['corAtual'];
    $modeloForm = $_POST['modelo'];
    $placaForm = $_POST['placa'];
    $dataForm = $_POST['data'];
    $horarioForm = $_POST['horario'];

    $id = (int)$_SESSION['id']; 

    //comando sql para inserção de dados do veículo no banco
    $sqlInsertCarro = "INSERT INTO `carro` (`placa`, `id_dono`,`modelo`, `cor`) VALUES ('$placa','$id','$modelo', '$cor')";

    //preparando o bd para a inserção dos dados
    $inserirDadosCarro = $pdo->prepare($sqlInsertCarro);

    //comando sql para inserção de dados do agendamento no banco
    $sqlInsertAgendamento = "INSERT INTO `agendamento` (`data_agendamento`,`id_cliente`,`placa_carro`) VALUES ('$data','$id','$placa')";

    //preparando o bd para a inserção dos dados 
    $inserirDadosAgendamento = $pdo->prepare($sqlInsertAgendamento);

    if($inserirDadosCarro->execute()  && $inserirDadosAgendamento->execute()){
        echo "Cadastrado com sucesso!";
    }
?>

