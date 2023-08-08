<?php
require_once('./conexao.php');
$emailForm = $_POST['email'];
$senhaForm = $_POST['senha'];

$sqlCliente = $pdo->query("SELECT cliente.senha as clienteSenha FROM `cliente` WHERE cliente.email='$emailForm'");
$quantidadeRegistrosCliente = $sqlCliente->rowCount();
$registro = $sqlCliente->fetchAll();
$senhaCliente = $registro[0]['clienteSenha'];

if($quantidadeRegistrosCliente >=1){
    $dadosCliente = $pdo->query("SELECT * FROM `cliente` WHERE cliente.senha='$senhaCliente'");
    var_dump($dadosCliente->fetchAll());
}



/*
$sql = $pdo->query("SELECT cliente.senha as clienteSenha , funcionario.senha as funcionarioSenha FROM `cliente` , `funcionario` WHERE cliente.senha='$emailForm' || funcionario.senha='$emailForm'");

$registro = $sql->fetchAll();
var_dump($registro);

// foreach ($registro as $key) {
//     $hashCliente = $key['clienteSenha'] . "\n";
//     $hashFuncionario = $key['funcionarioSenha'] . "\n";
//     if (password_verify($senhaForm, $hashCliente)) {
//         $sqlCliente = $pdo->query("SELECT * FROM `cliente` WHERE cliente.email='$emailForm'");
//         $dadosCliente = $sqlCliente->fetchAll();
//         var_dump($dadosCliente);
//     } else if (password_verify($senhaForm, $hashFuncionario)) {
//         $sqlFuncionario = $pdo->query("SELECT * FROM `funcionario` WHERE funcionario.email='$emailForm'");
//         $dadosFuncionario = $sqlFuncionario->fetchAll();
//         var_dump($dadosFuncionario);
//     }
// }
*/