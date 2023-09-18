<?php

require_once('../assets/scripts/conexao.php');
require_once('../assets/scripts/conexao2.php');

if (session_status() == PHP_SESSION_NONE) {

    session_start();

}


// Verificar se os IDs dos produtos estão na sessão

if (isset($_SESSION['idsProdutos'])) {

    $idsProdutos = $_SESSION['idsProdutos'];

    $pesq = $_SESSION['buscaFeita'];

} else {

    // Lidar com a situação em que não há IDs na sessão
	
    $idsProdutos = []; // Inicialize uma matriz vazia

    $pesq = "";

    if (isset($_GET['categoria'])) {

    $categoria = $_GET['categoria'];

        $msgNav = "da categoria!";

    }else{

        $categoria = null;

        $msgNav = null;

    }

 

    if(!empty($categoria)){

         // Consulta ao banco de dados para obter todos os IDs de produtos

         $sqlTodosProdutos = "SELECT codigoProduto FROM produto WHERE TG_categoria = '$categoria'";

         $resultTodosProdutos = mysqli_query($conexao, $sqlTodosProdutos);

         if ($resultTodosProdutos) {

             while ($linha = mysqli_fetch_assoc($resultTodosProdutos)) {

                 $idsProdutos[] = $linha['codigoProduto'];
             }

         } else {

             // Trate o erro se a consulta falhar

             echo "Erro na consulta: " . mysqli_error($conexao);

         }
		

    }else{

 

    // Consulta ao banco de dados para obter todos os IDs de produtos

    $sqlTodosProdutos = "SELECT codigoProduto FROM produto";

    $resultTodosProdutos = mysqli_query($conexao, $sqlTodosProdutos);

 

    if ($resultTodosProdutos) {

        while ($linha = mysqli_fetch_assoc($resultTodosProdutos)) {

            $idsProdutos[] = $linha['codigoProduto'];

               

        }

    } else {

        // Trate o erro se a consulta falhar

        echo "Erro na consulta: " . mysqli_error($conexao);

    }

	

}

}

 

if(!empty($idsProdutos)){

$chunksProdutos = array_chunk($idsProdutos, ceil(count($idsProdutos) / 1));}

$Todossql = "SELECT codigoProduto FROM produto";

$Todosresultado = mysqli_query($conexao, $Todossql);

if ($Todosresultado) {

    // Array para armazenar os IDs dos produtos

    $TodosidsProdutos = [];

    while ($linha = mysqli_fetch_assoc($Todosresultado)) {

        $TodosidsProdutos[] = $linha['codigoProduto'];
    }
} else {

    // Trate o erro se a consulta falhar

    echo "Erro na consulta: " . mysqli_error($conexao);

}


$TodosProdutos = array_chunk($TodosidsProdutos, ceil(count($TodosidsProdutos) / 1));

?>

<!DOCTYPE html>

<html lang="pt-br">

 

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Produtos</title>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

 

 

    <link rel="stylesheet" href="../assets/css/estilos-importantes.css">

    <link rel="stylesheet" type="text/css" href="../assets/css/produtos-categoria.min.css">

    <link rel="stylesheet" type="text/css" href="../assets/css/carrinho.min.css">
    
 

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

 

    <script type="text/javascript" src="../assets/js/java.js" defer></script>

    <script src="../assets/js/js-bootstrap/bootstrap.bundle.min.js"></script>

    <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">

</head>

 

<body id="container__body">

    <?php

    require_once('../assets/components/header.php');

    ?>

<br class="espaco_invisivel">

<br class="espaco_invisivel">

<br class="espaco_invisivel">

 

 

<?php

if (isset($_SESSION['idsProdutos'])) {?>

    <div class="container">

<br>

    <div><h5><?php echo "Busca por: '$pesq'" ?></h5></div>

</div>

<?php }else{

    echo "<div class='main__title'>Navegue pelos produtos $msgNav</div>";

    echo '<br>';

} ?>

<?php

if(!empty($chunksProdutos)){

   

foreach ($chunksProdutos as $chunk) { ?>

    <div class="container">

       

        <div class="row ">

            <?php foreach ($chunk as $idsProdutos) {

                // Consulta ao banco de dados para obter o nome do produto com base no $idsProdutos

                $sqlNome = "SELECT nome FROM produto WHERE codigoProduto = $idsProdutos";

                $resultNome = mysqli_query($conexao, $sqlNome);

                $rowNome = mysqli_fetch_assoc($resultNome);

                $nomeProduto = $rowNome['nome'];

 

                // Consulta ao banco de dados para obter o preco do produto com base no $idsProdutos

                $sqlPreco = "SELECT preco FROM produto WHERE codigoProduto = $idsProdutos";

                $resultPreco = mysqli_query($conexao, $sqlPreco);

                $rowPreco = mysqli_fetch_assoc($resultPreco);

                $precoProduto = $rowPreco['preco'];

 

                // Consulta ao banco de dados para obter a marca do produto com base no $idsProdutos

                $sqlMarca = "SELECT marca FROM produto WHERE codigoProduto = $idsProdutos";

                $resultMarca = mysqli_query($conexao, $sqlMarca);

                $rowMarca = mysqli_fetch_assoc($resultMarca);

                $marcaProduto = $rowMarca['marca'];

 

                // Consulta ao banco de dados para obter a descricao do produto com base no $idsProdutos

                $sqlDescricao = "SELECT descricao FROM produto WHERE codigoProduto = $idsProdutos";

                $resultDescri = mysqli_query($conexao, $sqlDescricao);

                $rowDescri = mysqli_fetch_assoc($resultDescri);

                $descricaoProduto = $rowDescri['descricao'];

 

                // Consulta ao banco de dados para obter a custoomizacao do produto com base no $idsProdutos

                $sqlCustomizações = "SELECT customizações FROM produto WHERE codigoProduto = $idsProdutos";

                $resultCustomi = mysqli_query($conexao, $sqlCustomizações);

                $rowCustomi = mysqli_fetch_assoc($resultCustomi);

                $customizacaoProduto = $rowCustomi['customizações'];

 

                // Consulta ao banco de dados para obter a imagem do produto com base no $idsProdutos

                $sqlImagem = "SELECT caminho_imagem FROM produto WHERE codigoProduto = $idsProdutos";

                $resultImagem = mysqli_query($conexao, $sqlImagem);

                $rowImagem = mysqli_fetch_assoc($resultImagem);

                $imagemProduto = $rowImagem['caminho_imagem'];

            ?>

            <div class="col-lg-3 col-md-4 col-sm-6  col-12" style="padding: 10px; ">

            <div class="d-flex justify-content-center">

                <div class="card card-produto-dinamico" style="width: 18rem;">

                    <div class="text-center">

                    <img  class="card-img-top imagens-prod" src="<?php echo $imagemProduto ?>"  alt="...">

                    </div>

                    <div class="card-body " style="display: flex; flex-direction: column; ">

                        <div class="card-produto-dinamico-titulo">

                        <h5 style="color: #014961; font-weight: bold" class="card-title"><?php echo $nomeProduto ?></h5>

                        </div>

                        <div >

                        <div class="card-text"><?php echo $marcaProduto ?></div>

                        <div class="card-text"><?php echo $descricaoProduto ?></div>

                        <div class="card-text"><?php echo $customizacaoProduto ?></div>

                        </div>

                        <hr class="card-produto-dinamico-linha">

                        <div  class="card-produto-dinamico-preco-button">

                            <div class="card-produto-dinamico-preco-button-texto" >R$:<?php echo $precoProduto ?>,00</div>
                            <form action="../assets/scripts/cadastrarFavorito.php" method="POST">
                                <input type="hidden" name="idProduto" id="idProduto" value="<?php echo $idsProdutos ; ?>">
                                <?php
                                    $sqlFav = "SELECT * FROM `favoritos` WHERE `id_produto`='$idsProdutos'";
                                    $stmt = $pdo->query($sqlFav);
                                    $stmt->execute();
                                    $favoritos = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                    $quantidadeTupla = $stmt->rowCount();

                                    if($quantidadeTupla > 0){
                                        echo '<button ><img class="fav__heart__icon" src="../assets/img/heart-filled.png" alt=""></button>';
                                    }else{
                                        echo '<button ><img class="fav__heart__icon" src="../assets/img/heart.png" alt=""></button>';
                                    }
                                    
                                ?>
                                
                            </form>
                            <button> 
                                <a href="?adicriona=<?php echo $idsProdutos ?>">
                                    <svg class="svg-icon" viewBox="0 0 20 20">
                                        <path d="M17.72,5.011H8.026c-0.271,0-0.49,0.219-0.49,0.489c0,0.271,0.219,0.489,0.49,0.489h8.962l-1.979,4.773H6.763L4.935,5.343C4.926,5.316,4.897,5.309,4.884,5.286c-0.011-0.024,0-0.051-0.017-0.074C4.833,5.166,4.025,4.081,2.33,3.908C2.068,3.883,1.822,4.075,1.795,4.344C1.767,4.612,1.962,4.853,2.231,4.88c1.143,0.118,1.703,0.738,1.808,0.866l1.91,5.661c0.066,0.199,0.252,0.333,0.463,0.333h8.924c0.116,0,0.22-0.053,0.308-0.128c0.027-0.023,0.042-0.048,0.063-0.076c0.026-0.034,0.063-0.058,0.08-0.099l2.384-5.75c0.062-0.151,0.046-0.323-0.045-0.458C18.036,5.092,17.883,5.011,17.72,5.011z"></path>
                                        <path d="M8.251,12.386c-1.023,0-1.856,0.834-1.856,1.856s0.833,1.853,1.856,1.853c1.021,0,1.853-0.83,1.853-1.853S9.273,12.386,8.251,12.386z M8.251,15.116c-0.484,0-0.877-0.393-0.877-0.874c0-0.484,0.394-0.878,0.877-0.878c0.482,0,0.875,0.394,0.875,0.878C9.126,14.724,8.733,15.116,8.251,15.116z"></path>
                                        <path d="M13.972,12.386c-1.022,0-1.855,0.834-1.855,1.856s0.833,1.853,1.855,1.853s1.854-0.83,1.854-1.853S14.994,12.386,13.972,12.386z M13.972,15.116c-0.484,0-0.878-0.393-0.878-0.874c0-0.484,0.394-0.878,0.878-0.878c0.482,0,0.875,0.394,0.875,0.878C14.847,14.724,14.454,15.116,13.972,15.116z"></path>
                                    </svg>
                                </a>
                            </button>

                        </div>
                    </div>
                    
                    </div>

                </div>
                <div class="comentarios">
                    <p>Deixe um comentário:</p>
                    <form method="POST" action="../assets/scripts/adicionarComentario.php">
                        <label for="comentario">Comentário:</label>
                        <textarea name="comentario" rows="2" cols="20" required></textarea><br>
                        <input type="submit" value="Enviar Comentário">
                    </form>
                </div>
            </div>

            <?php }?>

        </div>

    </div>

<?php }}else{

     echo '<div class="container">';

     echo '<br>';

     echo '<div><h5 style="font-weight: bold">Nenhum produto encontrado!</h5></div>';

     echo '</div>';

 

}?>

 

 

 

<?php

// Verifique se $_SESSION['idsProdutos'] está definida

if (isset($_SESSION['idsProdutos'])) {

    echo '<div class="container">';

    echo '<br>';

    echo '<div><h5>Outras Opções:</h5></div>';

    echo '</div>';

if(!empty($chunksProdutos)){

$idsProdutosRelacionados = $_SESSION['idsProdutos']; // Matriz de IDs de produtos relacionados à pesquisa^

}

foreach ($TodosProdutos as $chunk1) { ?>

    <div class="container">

       

        <div class="row ">

    <?php foreach ($chunk1 as $TodosidsProdutos) { ?>

        <!-- Verifique se o ID do produto não está na matriz de IDs de produtos relacionados à pesquisa-->

       

        <?php

        if(!empty($chunksProdutos)){

        if (!in_array($TodosidsProdutos, $idsProdutosRelacionados)) { ?>

            <?php

            // Consulta ao banco de dados para obter o nome do produto com base no $idsProdutos

            $sqlNome = "SELECT nome FROM produto WHERE codigoProduto = $TodosidsProdutos";

            $resultNome = mysqli_query($conexao, $sqlNome);

            $rowNome = mysqli_fetch_assoc($resultNome);

            $nomeProduto = $rowNome['nome'];

 

            // Consulta ao banco de dados para obter o preco do produto com base no $idsProdutos

            $sqlPreco = "SELECT preco FROM produto WHERE codigoProduto = $TodosidsProdutos";

            $resultPreco = mysqli_query($conexao, $sqlPreco);

            $rowPreco = mysqli_fetch_assoc($resultPreco);

            $precoProduto = $rowPreco['preco'];

 

            // Consulta ao banco de dados para obter a marca do produto com base no $idsProdutos

            $sqlMarca = "SELECT marca FROM produto WHERE codigoProduto = $TodosidsProdutos";

            $resultMarca = mysqli_query($conexao, $sqlMarca);

            $rowMarca = mysqli_fetch_assoc($resultMarca);

            $marcaProduto = $rowMarca['marca'];

 

            // Consulta ao banco de dados para obter a descricao do produto com base no $idsProdutos

            $sqlDescricao = "SELECT descricao FROM produto WHERE codigoProduto = $TodosidsProdutos";

            $resultDescri = mysqli_query($conexao, $sqlDescricao);

            $rowDescri = mysqli_fetch_assoc($resultDescri);

            $descricaoProduto = $rowDescri['descricao'];

 

            // Consulta ao banco de dados para obter a custoomizacao do produto com base no $idsProdutos

            $sqlCustomizações = "SELECT customizações FROM produto WHERE codigoProduto = $TodosidsProdutos";

            $resultCustomi = mysqli_query($conexao, $sqlCustomizações);

            $rowCustomi = mysqli_fetch_assoc($resultCustomi);

            $customizacaoProduto = $rowCustomi['customizações'];

 

            // Consulta ao banco de dados para obter a imagem do produto com base no $idsProdutos

            $sqlImagem = "SELECT caminho_imagem FROM produto WHERE codigoProduto = $TodosidsProdutos";

            $resultImagem = mysqli_query($conexao, $sqlImagem);

            $rowImagem = mysqli_fetch_assoc($resultImagem);

            $imagemProduto = $rowImagem['caminho_imagem'];

           

            // Exibir o produto na seção "Outras Opções"

            ?>

            <div class="col-lg-3 col-md-4 col-sm-6  col-12" style="padding: 10px; ">

            <div class="d-flex justify-content-center">

                <div class="card card-produto-dinamico" style="width: 18rem;">

                    <div class="text-center">

                    <img  class="card-img-top imagens-prod" src="<?php echo $imagemProduto ?>"  alt="...">

                    </div>

                    <div class="card-body " style="display: flex; flex-direction: column; ">

                        <div class="card-produto-dinamico-titulo">

                        <h5 style="color: #014961; font-weight: bold" class="card-title"><?php echo $nomeProduto ?></h5>

                        </div>

                        <div >

                        <div class="card-text"><?php echo $marcaProduto ?></div>

                        <div class="card-text"><?php echo $descricaoProduto ?></div>

                        <div class="card-text"><?php echo $customizacaoProduto ?></div>

                        </div>

                        <hr class="card-produto-dinamico-linha">

                        <div  class="card-produto-dinamico-preco-button">

                            <div class="card-produto-dinamico-preco-button-texto" >R$:<?php echo $precoProduto ?>,00</div>

                            <button ><img width="30%"  src="../assets/img/iconeadd.png" alt=""></button>

                        </div>

                       

                    </div>

                    </div>

                </div>

            </div>

        <?php } }else{

            $sqlNome = "SELECT nome FROM produto WHERE codigoProduto = $TodosidsProdutos";

            $resultNome = mysqli_query($conexao, $sqlNome);

            $rowNome = mysqli_fetch_assoc($resultNome);

            $nomeProduto = $rowNome['nome'];

 

            // Consulta ao banco de dados para obter o preco do produto com base no $idsProdutos

            $sqlPreco = "SELECT preco FROM produto WHERE codigoProduto = $TodosidsProdutos";

            $resultPreco = mysqli_query($conexao, $sqlPreco);

            $rowPreco = mysqli_fetch_assoc($resultPreco);

            $precoProduto = $rowPreco['preco'];

 

            // Consulta ao banco de dados para obter a marca do produto com base no $idsProdutos

            $sqlMarca = "SELECT marca FROM produto WHERE codigoProduto = $TodosidsProdutos";

            $resultMarca = mysqli_query($conexao, $sqlMarca);

            $rowMarca = mysqli_fetch_assoc($resultMarca);

            $marcaProduto = $rowMarca['marca'];

 

            // Consulta ao banco de dados para obter a descricao do produto com base no $idsProdutos

            $sqlDescricao = "SELECT descricao FROM produto WHERE codigoProduto = $TodosidsProdutos";

            $resultDescri = mysqli_query($conexao, $sqlDescricao);

            $rowDescri = mysqli_fetch_assoc($resultDescri);

            $descricaoProduto = $rowDescri['descricao'];

 

            // Consulta ao banco de dados para obter a custoomizacao do produto com base no $idsProdutos

            $sqlCustomizações = "SELECT customizações FROM produto WHERE codigoProduto = $TodosidsProdutos";

            $resultCustomi = mysqli_query($conexao, $sqlCustomizações);

            $rowCustomi = mysqli_fetch_assoc($resultCustomi);

            $customizacaoProduto = $rowCustomi['customizações'];

 

            // Consulta ao banco de dados para obter a imagem do produto com base no $idsProdutos

            $sqlImagem = "SELECT caminho_imagem FROM produto WHERE codigoProduto = $TodosidsProdutos";

            $resultImagem = mysqli_query($conexao, $sqlImagem);

            $rowImagem = mysqli_fetch_assoc($resultImagem);

            $imagemProduto = $rowImagem['caminho_imagem'];

 

            echo '<div class="col-lg-3 col-md-4 col-sm-6  col-12" style="padding: 10px; ">';

            echo '<div class="d-flex justify-content-center">';

            echo    '<div class="card card-produto-dinamico" style="width: 18rem;">';

            echo        '<div class="text-center">';

            echo        "<img  class='card-img-top imagens-prod' src=' $imagemProduto'  alt='...'>";

            echo        '</div>';

            echo        '<div class="card-body " style="display: flex; flex-direction: column; ">';

            echo            '<div class="card-produto-dinamico-titulo">';

            echo            "<h5 style='color: #014961; font-weight: bold' class='card-title'> $nomeProduto </h5>";

            echo            '</div>';

            echo            '<div >';

            echo            "<div class='card-text'> $marcaProduto </div>";

            echo            "<div class='card-text'> $descricaoProduto </div>";

            echo            "<div class='card-text'> $customizacaoProduto </div>";

            echo            '</div>';

            echo            '<hr class="card-produto-dinamico-linha">';

            echo            '<div  class="card-produto-dinamico-preco-button">';

            echo                "<div class='card-produto-dinamico-preco-button-texto' >R$:$precoProduto,00</div>";

            echo                '<button ><img width="30%"  src="../assets/img/iconeadd.png" alt=""></button>';

            echo            '</div>';

                       

            echo        '</div>';

            echo        '</div>';

            echo    '</div>';

            echo '</div>';

        }

       

        ?>

        <?php } ?>

        </div>

        </div>

        <?php } } ?>



<hr class="pro-linn">

    <div class="container">

        <div class="row">

            <div class="col">

                <h1 class="pro-promo">Sobre nosso produtos</h1>

                <p class="pro-formatar">Nossa oficina preza por produtos de altíssima qualidade,

                    buscando sempre o que está em ascêndencia no mercado, tudo licenciado e atestado, com qualidade assegurado pela Anvisa. Produtos fornecidos e distribuídos pela Giancar Distribuidora Auto Peças.</p>

            </div>

        </div>

        <br>

        <br>

        <div class="row forte">

            <div class="col">

                <div class="legal" style="display: flex; justify-content: center;">

                    <div class="pro-aumentar">

                        <div class="pro-pro-pro-card1">

                            <div class="pro-pro-pro-card2">

                                <div style="text-align: center;">

                                    <div style="font-size: 1.2em; color: #014961; margin-top: 15px; margin-bottom: 30px;">Embalagem e Envio</div>

                                    <div style="margin-top: 60px;"> <img width="150px" src="../assets/img/entrega.svg"> </div>

                                    <div style="font-size: 1.1em; color: #014961; margin-top: 50px;">Envio seguro e rápido</div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="col">

                <div class="legal" style="display: flex; justify-content: center;">

                    <div class="pro-aumentar">

                        <div class="pro-pro-pro-card1">

                            <div class="pro-pro-pro-card2">

                                <div style="text-align: center;">

                                    <div style="font-size: 1.2em; color: #014961; margin-top: 15px; margin-bottom: 30px;">Qualidade das peças</div>

                                    <div style="margin-bottom: 30px;"> <img width="150px" src="../assets/img/qualidade.png"> </div>

                                    <div style="font-size: 1.1em; color: #014961" >Peças de primeira linha</div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="col">

                <div class="legal" style="display: flex; justify-content: center;">

                    <div class="pro-aumentar">

                        <div class="pro-pro-pro-card1">

                            <div class="pro-pro-pro-card2">

                                <div style="text-align: center;">

                                    <div style="font-size: 1.2em; color: #014961; margin-top: 15px; margin-bottom: 30px;">Teste e Certificação</div>

                                    <div style="margin-bottom: 30px;"> <img width="150px" src="../assets/img/produto.svg"> </div>

                                    <div style="font-size: 1.1em; color: #014961">Selo de aprovação</div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="col">

                <div class="legal" style="display: flex; justify-content: center;">

                    <div class="pro-aumentar">

                        <div class="pro-pro-pro-card1">

                            <div class="pro-pro-pro-card2">

                                <div style="text-align: center;">

                                    <div style="font-size: 1.2em; color: #014961; margin-top: 15px; margin-bottom: 30px;">Garantia</div>

                                    <div style="margin-bottom: 30px;"> <img width="150px" src="../assets/img/garantia.png"> </div>

                                    <div style="font-size: 1.1em; color: #014961">Garantia estendida</div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="col">

                <div style="display: flex; justify-content: center;">

                    <div class="pro-aumentar">

                        <div class="pro-pro-pro-card1">

                            <div class="pro-pro-pro-card2">

                                <div style="text-align: center;">

                                    <div style="font-size: 1.2em; color: #014961; margin-top: 15px; margin-bottom: 30px;">Atendimento especial</div>

                                    <div style="margin-bottom: 30px;"> <img width="150px" src="../assets/img/atendimento.png"> </div>

                                    <div style="font-size: 1.1em; color: #014961">Você se sentirá em casa</div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

       

    </div>

 

</nav>

    <br>
    <br>
    <?php

    require_once('../assets/components/footer.php');
    ?>
</body>
</html>
<?php
    // Limpar a sessão após a exibição dos resultados da busca
unset($_SESSION['idsProdutos']);
unset($_SESSION['buscaFeita']);
?>