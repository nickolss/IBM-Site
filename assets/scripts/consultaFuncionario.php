<?php 
    require_once('conexao.php');

    if(!isset($_SESSION)){
        session_start();
    }

    if(!isset($_SESSION['idFuncionario'])){
        die("<script>alert('Faça login como funcionário')</script>");
    }
?>