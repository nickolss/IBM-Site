<?php 
    require_once('../assets/scripts/iniciarSessao.php');
    if (!isset($_SESSION['nomeCliente'])) {
      echo "
      <script>
        alert('Você precisa estar logado.');
        setInterval( function() {
          window.location.href = 'https://turnmotors.000webhostapp.com/pags/login.php'
        }, 500)
      </script>";
    }
