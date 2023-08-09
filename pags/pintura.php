<?php
    require_once('conexao.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pintura</title>
</head>
<body>
    <h1>Pintura</h1>

    <?php
        $categoria = 'Pintura';

        $sql = "SELECT * FROM produtos WHERE categoria = '$categoria'";
        $ConsultarProduto = $pdo->query($sql);
        $rows = $ConsultarProduto->fetchAll();
        $quantidadeTupla = $ConsultarProduto->rowCount();

        if ($quantidadeTupla > 0) {
            for($i=0; $i < count($rows); $i++){
                $nome = $rows[$i]['nome'];
                $preco = $rows[$i]['preco'];
                $descricao = $rows[$i]['descricao'];
                
                echo '<div style="border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;">';
                echo '<h3>Nome:' . $nome . '</h3>';
                echo '<p><strong>Preço:</strong> R$' . $preco . '</p>';
                echo '<p><strong>Descrição:</strong> ' . $descricao . '</p>';
                echo '</div>';
            }
        } else {
            echo 'Nenhum produto encontrado.';
        }

    ?>
</body>
</html>

<?php
