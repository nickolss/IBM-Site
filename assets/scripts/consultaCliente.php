<?php 
    require_once('iniciarSessao.php');
    if (!isset($_SESSION['nomeCliente'])) {
      $root = $_SERVER['HTTP_HOST'];
      $caminho = "http://$root/IBM-site/pags/login.php";

      echo "
      <script>
        alert('Você precisa estar logado.');
        setInterval( function() {
          window.location.href = '$caminho'
        }, 500)
      </script>";

    }
