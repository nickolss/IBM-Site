<?php
require_once('iniciarSessao.php');

function verificaCarros($id)
{
    
    require_once('conexao.php');
    $sqlCarros = $pdo->query("SELECT * FROM `carro` WHERE id_dono=$id");
    $registros = $sqlCarros->fetchAll();
    $quantidadeCarros = $sqlCarros->rowCount();

    if (!$quantidadeCarros >= 1) {
        return "Não existem veículos";
    }
}
