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
$idDono = $_SESSION['id']; //atribuindo o 'id' da sessão atual para a variável $id

$sqlCarros = $pdo->query("SELECT * FROM `carro` WHERE `id_dono` = $idDono");
$registroCarro = $sqlCarros->fetchAll();

$corCarro = $registroCarro['cor'];
$placa = $registroCarro['placa'];

//comando sql para inserção de dados do agendamento no banco
$sqlInsertAgendamento = "INSERT INTO `pedido_orcamento` (`data`,`horario`,`corCarro`,`placaCarro`, `personalizacao`, `id_cliente`, `status`) VALUES ('$dataForm','$horarioForm','$corCarro','$placa', '$categoriaForm', '$idDono', 'em avaliação')";

//preparando o bd para a inserção dos dados 
$inserirDadosAgendamento = $pdo->prepare($sqlInsertAgendamento);


//comando sql para inserção de dados do agendamento no banco
$sqlInsertCartao = "INSERT INTO `cartao` (`numero_cartao`,`cvv`,`validade`,`id_titular`) VALUES ($numeroCartao,$cvvCartao,$validadeCartao,$idDono)";

//preparando o bd para a inserção dos dados 
$inserirDadosCartao = $pdo->prepare($sqlInsertCartao);

if ($inserirDadosAgendamento->execute() && $inserirDadosCartao->execute()) {
    //se as duas query sql executarem irá redirecionar para o arquivo 'enviarEmail.php'
    header("Location: ./enviarEmail.php");
}