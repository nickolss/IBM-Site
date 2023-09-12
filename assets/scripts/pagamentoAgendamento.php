<?php
    require_once('conexao.php'); //requirindo o arquivo conexao.php
    require_once('./iniciarSessao.php'); //verifica se o arquivo 'iniciarSessao.php' está incluindo, executando-o

    //atribuindo as variaveis os valores que vieram do formulario
    $dataValidade = $_POST['data'];
    $numeroCartao = $_POST['numeroCartao'];
    $cvvCartao = $_POST['cvvCartao']; 
    $nomeCartao = $_POST['nomeCartao']; 
    
    $id = (int)$_SESSION['id']; //atribuindo o 'id' da sessão atual para a variável $id

    $sql = "INSERT INTO `tabela` () VALUES ('$dataValidade', $nomeCartao, '$cvvCartao', $nomeCartao)";

    $stmt = $pdo->prepare($stmt);

    if($stmt->execute()){
        header("Location: ../../pags/agendar-personalizacao.php");
    }

?>