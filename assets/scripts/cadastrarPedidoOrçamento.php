<?php
require_once('./conexao.php'); //verifica se o arquivo 'conexao.php' está incluido, se sim não irá incluir novamente
require_once('./iniciarSessao.php'); //verifica se o arquivo 'iniciarSessao.php' está incluindo, executando-o


//passa as informações do forms para variaveis
$dataForm = $_POST['data'];
$horarioForm = (int) $_POST['horario'];
$categoriaForm = $_GET['categoria'];
$idCarro = $_POST['idCarro'];
$idDono = $_SESSION['id']; //atribuindo o 'id' da sessão atual para a variável $id

$sqlCarros = $pdo->query("SELECT * FROM `carro` WHERE `idVeiculo` = $idCarro");
$registroCarro = $sqlCarros->fetchAll();

$corCarro = $registroCarro[0]['cor'];
$placa = $registroCarro[0]['placa'];


//comando sql para inserção de dados do agendamento no banco
$sqlInsertAgendamento = "INSERT INTO `pedido_orcamento` (`data`,`horario`,`corCarro`,`placaCarro`, `personalizacao`, `id_cliente` , `status`) VALUES ('$dataForm','$horarioForm','$corCarro','$placa', '$categoriaForm', '$idDono', 'em avaliação')";

//preparando o bd para a inserção dos dados 
$inserirDadosAgendamento = $pdo->prepare($sqlInsertAgendamento);

if ($inserirDadosAgendamento->execute() ) {
    //se as duas query sql executarem irá redirecionar para o arquivo 'INDEX.php'
    header("Location: ../../index.php");
}
