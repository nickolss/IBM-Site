<?php

require_once('conexao.php');
require_once('iniciarSessao.php');
require_once('consultaCliente.php');

$id = (int)$_SESSION['id'];

$comentario = $_POST['comentario'];

$sqlInsert = "INSERT INTO comentarios (nome_cliente, comentario) VALUES (:id, :comentario)";
$stmtComentario = $pdo->prepare($sqlInsert);
$stmtComentario->bindParam(':id', $id, PDO::PARAM_INT);
$stmtComentario->bindParam(':comentario', $comentario, PDO::PARAM_STR);

if ($stmtComentario->execute()) {
    // Selecionar os comentários do cliente
    $sqlSelect = "SELECT * FROM `comentarios` WHERE nome_cliente=:id ORDER BY data_publicacao DESC";
    $stmtSelect = $pdo->prepare($sqlSelect);
    $stmtSelect->bindParam(':id', $id, PDO::PARAM_INT);
    $stmtSelect->execute();

    // Verificar se há comentários e exibi-los
    if ($stmtSelect->rowCount() > 0) {
        while ($row = $stmtSelect->fetch(PDO::FETCH_ASSOC)) {
            echo "<p><strong>" . $row['nome_cliente'] . "</strong> em " . $row['data_publicacao'] . ":</p>";
            echo "<p>" . $row['comentario'] . "</p>";
        }
    } else {
        echo "Nenhum comentário encontrado.";
    }
} else {
    echo "Erro ao adicionar o comentário.";
}
?>