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