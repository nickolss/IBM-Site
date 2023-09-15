<?php
    require_once('./conexao.php'); //verifica se o arquivo 'conexao.php' está incluido, se sim não irá incluir novamente
    require_once('./iniciarSessao.php'); //verifica se o arquivo 'iniciarSessao.php' está incluindo, executando-o

    //passa as informações do forms para variaveis
    $corForm = $_POST['corAtual'];
    $modeloForm = $_POST['modelo'];
    $placaForm = $_POST['placa'];
    $dataForm = $_POST['data'];
    $horarioForm = $_POST['horario'];
    $categoriaForm = $_GET['categoria'];
    $numeroCartao = $_POST['numeroCartao'];
    $cvvCartao = $_POST['cvvCartao'];
    $validadeCartao = $_POST['dataValidade'];

    $id = (int)$_SESSION['id']; //atribuindo o 'id' da sessão atual para a variável $id
    $placaFormatada = str_replace(['(', ')', '-','/'], '', $placaForm); //substituindo os caracteres informados por nulo

     //comando sql para inserção de dados do veículo no banco
     $sqlInsertCarro = "INSERT INTO `carro` (`placa`, `id_dono`,`modelo`, `cor`) VALUES ('$placaFormatada','$id','$modeloForm', '$corForm')";

     //preparando o bd para a inserção dos dados
     $inserirDadosCarro = $pdo->prepare($sqlInsertCarro);
 

     //comando sql para inserção de dados do agendamento no banco
     $sqlInsertAgendamento = "INSERT INTO `pedido_orcamento` (`data`,`horario`,`corCarro`,`placaCarro`, `personalizacao`, `id_cliente`, `status`) VALUES ('$dataForm','$horarioForm','$corForm','$placaFormatada', '$categoriaForm', '$id', 'em avaliação')";
 
     //preparando o bd para a inserção dos dados 
     $inserirDadosAgendamento = $pdo->prepare($sqlInsertAgendamento);
 

     //comando sql para inserção de dados do agendamento no banco
     $sqlInsertCartao = "INSERT INTO `cartao` (`numero_cartao`,`cvv`,`validade`,`id_titular`) VALUES ($numeroCartao,$cvvCartao,$validadeCartao,$id)";
 
     //preparando o bd para a inserção dos dados 
     $inserirDadosCartao = $pdo->prepare($sqlInsertCartao);

     if($inserirDadosCarro->execute() && $inserirDadosAgendamento->execute() && $inserirDadosCartao->execute()){
      //se as duas query sql executarem irá redirecionar para o arquivo 'enviarEmail.php'
        header("Location: ./enviarEmail.php");
     }
