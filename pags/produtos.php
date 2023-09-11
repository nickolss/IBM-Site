<?php
require_once('../assets/scripts/conexao.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


// Verificar se os IDs dos produtos estão na sessão
if (isset($_SESSION['idsProdutos'])) {
    $idsProdutos = $_SESSION['idsProdutos'];
	$pesq = $_SESSION['buscaFeita'];
	


    // Aqui você tem acesso aos IDs dos clientes na array $idsProdutos
} else {
    // Lidar com a situação em que não há IDs na sessão
    $idsProdutos = []; // Inicialize uma matriz vazia
	$pesq = "";
	

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
	<link rel="stylesheet" type="text/css" href="../assets/css/produtos.min.css">
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
	echo '<div class="main__title">Navegue pelos produtos</div>';
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
							<button > <a href="?adicionar=<?php echo $idsProdutos ?>"> <img width="30%"  src="../assets/img/iconeadd.png" alt=""> </a></button>
						</div>
						
					</div>
					</div>
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
			echo	'<div class="card card-produto-dinamico" style="width: 18rem;">';
			echo		'<div class="text-center">';
			echo		"<img  class='card-img-top imagens-prod' src=' $imagemProduto'  alt='...'>";
			echo		'</div>';
			echo		'<div class="card-body " style="display: flex; flex-direction: column; ">';
			echo			'<div class="card-produto-dinamico-titulo">';
			echo			"<h5 style='color: #014961; font-weight: bold' class='card-title'> $nomeProduto </h5>";
			echo			'</div>';
			echo			'<div >';
			echo			"<div class='card-text'> $marcaProduto </div>";
			echo			"<div class='card-text'> $descricaoProduto </div>";
			echo			"<div class='card-text'> $customizacaoProduto </div>";
			echo			'</div>';
			echo			'<hr class="card-produto-dinamico-linha">';
			echo			'<div  class="card-produto-dinamico-preco-button">';
			echo				"<div class='card-produto-dinamico-preco-button-texto' >R$:$precoProduto,00</div>";
			echo				'<button ><img width="30%"  src="../assets/img/iconeadd.png" alt=""></button>';
			echo			'</div>';
						
			echo		'</div>';
			echo		'</div>';
			echo	'</div>';
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