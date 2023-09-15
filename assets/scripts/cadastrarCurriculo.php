<?php
    require_once('conexao.php');
    require_once('iniciarSessao.php');
	require_once('consultaCliente.php');

    $id = (int)$_SESSION['id'];

    $imgCurriculo = $_FILES['imgProd'];
    $nomeImagem = $imgCurriculo['name'];

    $pastaBD = '../assets/img/produtos/';
    $pastaSalvar = "../../assets/img/curriculos/";
    $extensaoArquivo = strtolower(pathinfo($imgCurriculo['name'] , PATHINFO_EXTENSION));
    $caminhoBD = $pastaBD . $nomeImagem;
    $caminhoSalvar = $pastaSalvar . $nomeImagem;
    $moverImagem = move_uploaded_file($imgCurriculo['tmp_name'] , $caminhoSalvar);

    $sqlInsert = "INSERT INTO curriculo (id_cliente, caminho_imagem) VALUES ($id, '$caminhoBD')";

    $stmtCurriculo = $pdo->prepare($sqlInsert);

    if ($stmtCurriculo->execute()) {
      $root = $_SERVER['HTTP_HOST'];
      $caminho = "http://$root/IBM-site/pags/perfil.php";

      echo "
       <script>
        alert('Currículo enviado com sucesso!.');
        setInterval( function() {
          window.location.href = '$caminho'
        }, 0)
       </script>";
    }

