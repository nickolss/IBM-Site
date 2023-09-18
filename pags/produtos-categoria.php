<?php

require_once('../assets/scripts/conexao.php');

//variaveis de controle de paginção
$pagina = 1;

if(isset($_GET['pagina']))
    $pagina = filter_input(INPUT_GET, "pagina", FILTER_VALIDATE_INT);

if(!$pagina)
    $pagina = 1;

$limite = 20;
$inicio = ($pagina * $limite) - $limite;

$categoria = null;
$msgNav = null;
$pesquisa = null;
$pesq = "";

if (isset($_GET['busca'])) {

    $pesquisa = ($_GET['busca']);
    $sql = "SELECT codigoProduto FROM produto WHERE nome LIKE :pesquisa OR preco LIKE :pesquisa OR marca LIKE :pesquisa OR descricao LIKE :pesquisa OR customizações LIKE :pesquisa LIMIT $inicio, $limite";
    
    $calcPag = $pdo->query("SELECT COUNT(codigoProduto) count FROM produto WHERE nome LIKE '%$pesquisa%' OR preco LIKE '%$pesquisa%' OR marca LIKE '%$pesquisa%' OR descricao LIKE '%$pesquisa%' OR customizações LIKE '%$pesquisa%'")->fetch()["count"];

    $paginas = ceil($calcPag/$limite);

    $pesq = $pesquisa;
   
    $stmt = $pdo->prepare($sql);

 
    $pesquisaParam = '%' . $pesquisa . '%';
    $stmt->bindParam(':pesquisa', $pesquisaParam, PDO::PARAM_STR);

    
    if ($stmt->execute()) {
      
        $idsProdutos = [];

       
        while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $idsProdutos[] = $linha['codigoProduto'];
        }
    }




    //controle para exibição dos outros produtos
    $sqlCont = "SELECT codigoProduto FROM produto WHERE nome LIKE :pesquisa OR preco LIKE :pesquisa OR marca LIKE :pesquisa OR descricao LIKE :pesquisa OR customizações LIKE :pesquisa";
   
    $stmtCont = $pdo->prepare($sqlCont);

 
    $pesquisaParamCont = '%' . $pesquisa . '%';
    $stmtCont->bindParam(':pesquisa', $pesquisaParamCont, PDO::PARAM_STR);

    
    if ($stmtCont->execute()) {
      
        $idsProdutosCont = [];

       
        while ($linhaCont = $stmtCont->fetch(PDO::FETCH_ASSOC)) {
            $idsProdutosCont[] = $linhaCont['codigoProduto'];
        }
    }
    //fim



     if(!empty($idsProdutos)){
     $sqlTodosNaoEncontrados = "SELECT codigoProduto FROM produto WHERE codigoProduto NOT IN (" . implode(",", $idsProdutosCont) . ") LIMIT 0, 20";


    $stmt2 = $pdo->query($sqlTodosNaoEncontrados);


    $naoEncontrados = [];

    while ($linha2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
    $naoEncontrados[] = $linha2['codigoProduto'];
    }

    
    }else{
        $sqlTodosNaoEncontrados = "SELECT codigoProduto FROM produto LIMIT 0, 20";

        $stmt2 = $pdo->query($sqlTodosNaoEncontrados);

     
        $naoEncontrados = [];

    
        while ($linha2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
        $naoEncontrados[] = $linha2['codigoProduto'];
        }

        
    }
    $chunksProdutos2 = array_chunk($naoEncontrados, ceil(count($naoEncontrados) / 1));

}else{


    if (isset($_GET['categoria'])) {

    $categoria = $_GET['categoria'];

        $msgNav = "da categoria!";

        if (!empty($categoria)) {
      
            $sql = "SELECT codigoProduto FROM produto WHERE TG_categoria = :categoria LIMIT $inicio, $limite";

            $calcPag = $pdo->query("SELECT COUNT(codigoProduto) count FROM produto WHERE TG_categoria = '$categoria'")->fetch()["count"];
            $paginas = ceil($calcPag/$limite);
        
      
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':categoria', $categoria, PDO::PARAM_STR);
        
      
            if ($stmt->execute()) {
             
                $idsProdutos = [];
        
             
                while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $idsProdutos[] = $linha['codigoProduto'];
                }
            } else {
              
                echo "Erro na consulta: " . $stmt->errorInfo()[2];
            }
        }

    }else{

        $idsProdutos = []; 
         
         $sql = "SELECT codigoProduto FROM produto LIMIT $inicio, $limite";
        
         $calcPag = $pdo->query("SELECT COUNT(codigoProduto) count FROM produto")->fetch()["count"];
         $paginas = ceil($calcPag/$limite);
        
         $stmt = $pdo->prepare($sql);
         
     
        
         if ($stmt->execute()) {
            
             $idsProdutos = [];
     
            
             while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                 $idsProdutos[] = $linha['codigoProduto'];
             }
         } else {
        
             echo "Erro na consulta: " . $stmt->errorInfo()[2];
         }
    }
    }

    if(!empty($idsProdutos)){
    $chunksProdutos = array_chunk($idsProdutos, ceil(count($idsProdutos) / 1));}

   
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
    if(!empty($pesquisa)){
       
        echo '<div class="container">';
        echo '<br>';
        echo "<div><h5>Busca por: '$pesq'</h5></div>";
        echo '</div>';

        if(empty($idsProdutos)){
           echo '<div class="container">';
           echo '<br>';
           echo '<div><h5 style="font-weight: bold">Nenhum produto encontrado!</h5></div>';
           echo '</div>';
        }else{}
         
    }else{
      
        echo '<div class="container">';
        echo "<div class='main__title'>Navegue pelos produtos $msgNav</div>";
        echo '<br>';
        echo '</div>';
    } ?>

<?php if(!empty($chunksProdutos)){
    foreach ($chunksProdutos as $chunk) { ?>

        <div class="container"> 
            <div class="row ">
    
                <?php foreach ($chunk as $idsProdutos) {

                    $sql = "SELECT nome, preco, marca, descricao, customizações, caminho_imagem FROM produto WHERE codigoProduto = :idsProdutos";

                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(':idsProdutos', $idsProdutos, PDO::PARAM_INT);
                    $stmt->execute();
                    
                    if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $nomeProduto = $row['nome'];
                        $precoProduto = $row['preco'];
                        $marcaProduto = $row['marca'];
                        $descricaoProduto = $row['descricao'];
                        $customizacaoProduto = $row['customizações'];
                        $imagemProduto = $row['caminho_imagem'];
                    } 
    
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
    
                                <form method="POST" action="?adicionar=<?php echo $idsProdutos ?>">
                                    <button type="submit" name="adicionar" value="<?php echo $idsProdutos ?>">
                                        <img width="30%" src="../assets/img/iconeadd.png" alt="">
                                    </button>
                                </form>
    
                            </div>
    
                           
    
                        </div>
    
                        </div>
    
                    </div>
    
                </div>
    
                <?php }} }?>

            </div>
        </div>


    


    <?php if(!empty($pesquisa)){ 
            if(!empty($idsProdutos) && $paginas>1){
        ?>
        <div class="container text-center">
        <?php echo "<a href='?pagina=1&busca=" . urlencode($pesquisa) . "'>Primeira</a>"; ?>

    <?php if($pagina>1): ?>
        <?php echo "<a href='?pagina=" . ($pagina - 1) . "&busca=" . urlencode($pesquisa) . "'><<</a>"; ?>
    <?php endif; ?>

    <?=$pagina?>

    <?php if($pagina<$paginas): ?>
        <?php echo "<a href='?pagina=" . ($pagina + 1) . "&busca=" . urlencode($pesquisa) . "'>>></a>"; ?>
    <?php endif; ?>
    <?php echo "<a href='?pagina=$paginas&busca=" . urlencode($pesquisa) . "'>Última</a>"; ?>
    </div>
    <?php }}?>

<?php 
    if(!empty($pesquisa)){
        
?>

<div class="container">
<br>
<div><h5>Outras Opções:</h5></div>
</div>
<?php if(empty($naoEncontrados)){
    echo '<div class="container">';
    echo '<br>';
    echo '<div><h5 style="font-weight: bold">Sem Sugestões!</h5></div>';
    echo '</div>';
}else{ ?>

<?php if(!empty($chunksProdutos2)){
    foreach ($chunksProdutos2 as $chunk2) { ?>

        <div class="container"> 
            <div class="row ">
    
                <?php foreach ($chunk2 as $naoEncontrados) {
    
                        $sql2 = "SELECT nome, preco, marca, descricao, customizações, caminho_imagem FROM produto WHERE codigoProduto = :naoEncontrados";

                        $stmt2 = $pdo->prepare($sql2);
                        $stmt2->bindParam(':naoEncontrados', $naoEncontrados, PDO::PARAM_INT);
                        $stmt2->execute();
                        
                        if ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                            $nomeProduto2 = $row2['nome'];
                            $precoProduto2 = $row2['preco'];
                            $marcaProduto2 = $row2['marca'];
                            $descricaoProduto2 = $row2['descricao'];
                            $customizacaoProduto2 = $row2['customizações'];
                            $imagemProduto2 = $row2['caminho_imagem'];
                        } 
    
                ?>
    
                <div class="col-lg-3 col-md-4 col-sm-6  col-12" style="padding: 10px; ">
    
                <div class="d-flex justify-content-center">
    
                    <div class="card card-produto-dinamico" style="width: 18rem;">
    
                        <div class="text-center">
    
                        <img  class="card-img-top imagens-prod" src="<?php echo $imagemProduto2 ?>"  alt="...">
    
                        </div>
    
                        <div class="card-body " style="display: flex; flex-direction: column; ">
    
                            <div class="card-produto-dinamico-titulo">
    
                            <h5 style="color: #014961; font-weight: bold" class="card-title"><?php echo $nomeProduto2 ?></h5>
    
                            </div>
    
                            <div >
    
                            <div class="card-text"><?php echo $marcaProduto2 ?></div>
    
                            <div class="card-text"><?php echo $descricaoProduto2 ?></div>
    
                            <div class="card-text"><?php echo $customizacaoProduto2 ?></div>
    
                            </div>
    
                            <hr class="card-produto-dinamico-linha">
    
                            <div  class="card-produto-dinamico-preco-button">
    
                                <div class="card-produto-dinamico-preco-button-texto" >R$:<?php echo $precoProduto2 ?>,00</div>
    
                                <button > <a href="?adicionar=<?php echo $naoEncontrados ?>"> <img width="30%"  src="../assets/img/iconeadd.png" alt=""> </a></button>
    
                            </div>
    
                           
    
                        </div>
    
                        </div>
    
                    </div>
    
                </div>
    
                <?php } }}}}?>

            </div>
        </div>
                        <div class="container text-center">
                            <?php if(empty($pesquisa) && $paginas>1){ ?>
                        <a href="?pagina=1">Primeira</a>

                        <?php if($pagina>1): ?>
                            <a href="?pagina=<?=$pagina-1?>"><<</a>
                        <?php endif; ?>

                        <?=$pagina?>

                        <?php if($pagina<$paginas): ?>
                        <a href="?pagina=<?=$pagina+1?>">>></a>
                        <?php endif; ?>
                        <a href="?pagina=<?=$paginas?>">Ultima</a>
                            <?php }else{}?>
                               
                        
                        </div>

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
