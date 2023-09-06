<?php 
    require_once('../assets/scripts/iniciarSessao.php');
    if (!isset($_SESSION['nomeCliente'])) {
      echo "
      <script>
        alert('Você precisa estar logado.');
        setInterval( function() {
          window.location.href = 'http://localhost/IBM-Site/pags/login.php'
        }, 500)
      </script>";
    }
