<?php
require_once('conexao.php');

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['rf'])) {
    $root = $_SERVER['HTTP_HOST'];
    $caminho = "http://$root/IBM-site/pags/login.php";
    echo
    "
            <script>
                alert('Você precisa estar logado.');
                setInterval( function() {
                    window.location.href = '$caminho'
                }, 500)
            </script>
        ";

        
}

