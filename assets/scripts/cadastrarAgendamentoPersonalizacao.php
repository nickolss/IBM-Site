<?php
    require_once('conexao.php'); //requirindo o arquivo conexao.php
    require_once('./iniciarSessao.php'); //verifica se o arquivo 'iniciarSessao.php' está incluindo, executando-o

    //atribuindo as variaveis os valores que vieram do formulario
    $data = $_POST['data'];
    $horario = $_POST['horario'];
 
    $id = (int)$_SESSION['id']; //atribuindo o 'id' da sessão atual para a variável $id

    $sql = "INSERT INTO `agendamento` (`data_agendamento`, `horario`, `id_cliente`, `placa_carro`, `agendamento`) VALUES ('$data', $horario, $id, )";

    $stmt = $pdo->prepare($stmt);

    if($stmt->execute()){
        header("Location: ../../pags/agendar-personalizacao.php");
    }

?>