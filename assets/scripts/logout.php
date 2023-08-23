<?php
    require_once('./iniciarSessao.php');
    session_destroy();

    header('Location: ../../index.php');
?>