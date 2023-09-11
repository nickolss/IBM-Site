<?php
    // Importação dos arquivos
    require_once('conexao.php');
    require_once('iniciarSessao.php');
	  require_once('consultaCliente.php');

      // Verifica se um arquivo foi enviado pelo formulário.
      if(isset($_FILES["fileImg"]["name"])){
        $id = (int)$_SESSION['id'];

        $src = $_FILES["fileImg"]["tmp_name"];  // Obtém o nome temporário do arquivo enviado.

        $nomeImagem = uniqid() . $_FILES["fileImg"]["name"]; // Gera um nome único para o arquivo (evita substituição de arquivos com o mesmo nome).
        
        $caminhoImagem = "../img/img-perfil/" . $nomeImagem; // Define o caminho de destino para o arquivo.
        
        move_uploaded_file($src, $caminhoImagem); // Move o arquivo temporário para o destino especificado.

        // Atualiza o nome da imagem no banco de dados para o usuário correspondente.
        $query = "UPDATE cliente SET fotoPerfil = '$nomeImagem' WHERE id = $id";
        $stmt = $pdo->query($query);
        $stmt->execute();

        // Redireciona para a página inicial após o upload.
        header("Location: ../../pags/perfil.php");
      }

    ?>