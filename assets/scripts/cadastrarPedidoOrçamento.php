<?php
    require_once('./conexao.php'); //verifica se o arquivo 'conexao.php' está incluido, se sim não irá incluir novamente
    require_once('./iniciarSessao.php'); //verifica se o arquivo 'iniciarSessao.php' está incluindo, executando-o

    
    //passa as informações do forms para variaveis
    $dataForm = $_POST['data'];
    $horarioForm = $_POST['horario'];
    $categoriaForm = $_GET['categoria'];
    $numeroCartao = $_POST['numeroCartao'];
    $cvvCartao = $_POST['cvvCartao'];
    $validadeCartao = $_POST['dataValidade'];

    var_dump($_POST);