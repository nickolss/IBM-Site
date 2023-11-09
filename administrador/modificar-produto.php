<?php
require_once('../assets/scripts/conexao.php');
//require_once('../assets/scripts/consultaFuncionario.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Turn Motors | Cadastrar Produto</title>

    <!--LINK ICONES-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="../assets/css/reset.min.css">
    <link rel="stylesheet" href="../assets/css/cadastro-produto.min.css">
    <link rel="stylesheet" href="../assets/css/dropdown.min.css">
    <link rel="stylesheet" href="../assets/css/estilos-importantes.css">

    <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">
    <script type="text/javascript" src="../assets/js/java.js" defer></script>
    <script src="../assets/js/imagem-prod.js" defer></script>
    <script src="../assets/js/preco.js" defer></script>
    <script src="../assets/js/js-bootstrap/bootstrap.bundle.min.js"></script>
</head>

<body id="body">
    <?php
    require_once('../assets/components/header-adm.php');
    ?>

    <main class="principal">
        <div class="titulo">
            <h1 class="mainTitle">Modificar Produtos</h1>
        </div>
        <?php
        $id = (int) $_POST['btn-pedido-orcamento'];
        $sql = "SELECT * FROM produto WHERE codigoProduto=$id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $quantidadeTupla = $stmt->rowCount();
        $produto = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <form action="../assets/scripts/modProduto.php" method="POST" enctype="multipart/form-data">
            <div class="cadastro">
                <div class="caixa__input">
                    <input type="text" required name="nomeProd" id="nomeProd" autocomplete="off" value="<?= $produto[0]['nome'] ?>">
                    <label for="nomeProd">Nome</label>
                </div>

                <div class="caixa__input">
                    <input type="number" required name="precoProd" id="precoProd" autocomplete="off" value="<?= $produto[0]['preco'] ?>">
                    <label for="precoProd">Preço</label>
                </div>

                <div class="caixa__input">
                    <input type="number" required name="precoProd" id="precoProd" autocomplete="off" value="<?= $produto[0]['pontos'] ?>">
                    <label for="precoProd">Pontos</label>
                </div>

                <div class="caixa__input">
                    <input type="text" required name="marcaProd" id="marcaProd" autocomplete="off" value="<?= $produto[0]['marca'] ?>">
                    <label for="marcaProd">Marca</label>
                </div>

                <div class="caixa__input">
                    <textarea required name="descricaoProd" id="descricaoProd" cols="30" rows="3" class="formulario__campo"><?= $produto[0]['descricao'] ?></textarea>
                    <label for="descricaoProd">Descrição</label>
                </div>

                <div class="caixa__input">
                    <div class="dropdown-categorias">
                    <label id="label__dropdown__categoria" for="categoria">Categoria:</label>
                    <select required id="categoria" name="categoria">
                        <option class="opcao__categoria" value="PC">Pneu de Carro</option>
                        <option class="opcao__categoria" value="SME">Som, multimídia e eletrônicos</option>
                        <option class="opcao__categoria" value="AA">Acessórios para Automóveis</option>
                        <option class="opcao__categoria" value="CA">Cuidados Automotivos</option>
                        <option class="opcao__categoria" value="OF">Óleos e fluidos</option>
                        <option class="opcao__categoria" value="BA">Baterias e acessórios</option>
                        <option class="opcao__categoria" value="RT">Reboque e Transporte</option>
                        <option class="opcao__categoria" value="PEA">Peças para automóveis</option>
                        <option class="opcao__categoria" value="EPI">Equipamentos de Proteção</option>
                        <option class="opcao__categoria" value="PNM">Pneus de Moto</option>
                        <option class="opcao__categoria" value="APM">Acessórios e peças para motos</option>
                        <option class="opcao__categoria" value="FE">Ferramentas e Equipamentos</option>
                    </select>
                    </div>
                    <br>
                </div>

                <label class="picture">
                    <input type="file" class="picture__input" name="imgProd" id="imgProd" required accept="image/png, image/jpeg, image/webp">
                    <span class="picture__image"></span>
                </label>

            </div>

            <div class="div__formulario__botao"><button type="submit" value="<?= $id ?>" class="formulario__botao formulario__botao--turbinado" name="id">Modificar</button></div>
        </form>

    </main>


    <script src="../assets/js/drowdown.js"></script>

    <?php
    require_once('../assets/components/footer.php');
    ?>


</body>

</html