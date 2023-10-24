<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/modal.min.css">
        <title>Turn Motors</title>
    </head>
    <body>
        <?php
            require_once('./conexao.php');
            require_once('./iniciarSessao.php');
            require_once('./consultaCliente.php');

            $txtExperiencia = $_POST['experiencia'];

            $id = $_SESSION['id'];
            $sqlInsert = "INSERT INTO `experienciaUser` (`texto`, `id_cliente`) VALUES ('$txtExperiencia', '$id')";
            $stmt = $pdo->prepare($sqlInsert);

            if($stmt->execute()){
                $tituloModal = "Experiência cadastrada com sucesso!";
                $textoModal = "Obrigado pela preferência!";
                require_once('../components/modal.php');
            }
        ?>
    </body>
</html>