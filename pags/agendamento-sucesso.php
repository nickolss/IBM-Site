<?php
    require_once('../assets/scripts/iniciarSessao.php');
    require_once('../assets/scripts/consultaCliente.php');
?>


<!DOCTYPE html>
<html lang="pt-BR">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Turn Motors | Agendamento Sucesso</title>
        <link rel="stylesheet" href="../assets/css/agendamento.min.css">
        <link rel="stylesheet" href="../assets/css/agendamento-sucesso.min.css">
      <link rel="stylesheet" href="../assets/css/estilos-importantes.css">
      <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
      <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">  
      <script type="text/javascript" src="../assets/js/java.js" defer></script>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="../assets/js/js-bootstrap/bootstrap.bundle.min.js"></script>

      <!--LINK ICONES-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    </head>
    <body id="container__body">
    
        <?php 
          require_once('../assets/components/header.php');
        ?>
        
        <main>
            <div class="container">
                <i id="icon-check" class='bx bxs-check-circle bx-tada' ></i>
                <h1 class="mainTitle">Agendamento registrado com sucesso!</h1>
                <p>Email enviado no endereço <strong><?= $_SESSION['email'] ?></strong> com os detalhes do agendamento.</p>
                <p>Verifique sua pasta de spam se o email não chegar em alguns minutos.</p>
                <?php'<a class="formulario__botao" href="../index.php">Continuar Explorando</a>'?>
            </div>
        </main>

        <?php 
          require_once('../assets/components/footer.php');
        ?>

    </body>
</html
    
