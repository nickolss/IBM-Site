<?php
    session_start();//cookie
    if (!isset($_SESSION['carrinho'])) {
        $_SESSION['carrinho'] = array(); // Inicializar o carrinho como um array vazio
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Turn Motors | Carrinho</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <link rel="stylesheet" href="../assets/css/estilos-importantes.css">
    <link rel="stylesheet" href="../assets/css/vagas.min.css">
    <link rel="stylesheet" href="../assets/css/carrinho.min.css">
    <link rel="stylesheet" href="../assets/css/produtos.min.css">


    <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">
    <script type="text/javascript" src="assets/js/java.js" defer></script>
    <script src="../assets/js/js-bootstrap/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php
        require_once('../assets/components/header.php');
    ?>
    <main id="carrinho_pag">
        <div class="area_carrinho_pag justify-content-center">
            <div class="row">
                <div class="col">
                    <h1 class="text-center">Carrinho de Compras</h1>
                </div>
            </div>
            <hr>
			<!--TELA GRANDE-->
			<div class="container__grande__categorias">
				<div class="container__produtos">
					<div class="linha">
                        <?php foreach ($_SESSION['carrinho'] as $item) { ?>
                        <br>
						<div class="coluna">
							<div class="card">    
								<img class="categoria__img" src="<?php echo $item['imagem'] ?>" alt="">
								<div class="botoes">
									<div class="produtos">
										<p class="preco-produto">Preço: R$<?php echo $item['preco'] ?></p>
										<p><a href="?adicionar=<?php echo $item['id'] ?>">Adicionar ao carrinho</a>
										<?php if (isset($_SESSION['carrinho'][$item['id']])) { ?>
										<a href="?remover=<?php echo $item['id'] ?>">Remover do carrinho</a></p>
										<?php } else { ?>
										<span href="produtos.php"></span>
										<?php } ?>
									</div>    
								</div>    
							</div>
						</div>
						<?php } ?> 
					</div>
				</div> 
				<hr>
                <div class="col">
                    <p class="fs-2">Total: R$<?php echo getTotalPurchaseAmount($_SESSION['carrinho']); ?></p>
                </div>
				<?php
                    if(isset($_GET['adicionar'])){
                        //Adicionando ao carrinho
                        $id = (int) $_GET['adicionar'];
                        
                        //$session = $_SESSION['carrinho']; 
                        // print_r ($session);
                        // print_r ($items);

                        $index = array_search($id, array_column($item, 'id'));
                        
                            if(array_key_exists($id, $_SESSION['carrinho'])){
                                $_SESSION['carrinho'][$id]['quantidade']++;
                                echo '<script>window.location.href = "carrinho.php";</script>';
                                exit();
                            } else {
                                $_SESSION['carrinho'][$id] = array('index' => $index, 'imagem' => $items[$index]['imagem'], 'quantidade'=>1, 'id'=> $id,'nome'=>$items[$index]['nome'], 'preco'=>$items[$index]['preco']);
                                //header("Location: index.php"); // Redireciona de volta ao carrinho após a remoção
                                echo '<script>window.location.href = "carrinho.php";</script>';
                                exit();
                            }
                            //Adicionado ao carrinho
                    }
                    if(isset($_GET['remover'])){
                        $id = (int) $_GET['remover'];
                        if(isset($_SESSION['carrinho'][$id])){
                            unset($_SESSION['carrinho'][$id]);
                            //header("Location: index.php"); // Redireciona de volta ao carrinho após a remoção
                            echo '<script>window.location.href = "carrinho.php";</script>';
                            exit();
                        }
                    }

                    function getIndexById($array, $id) {
                        foreach ($array as $index => $object) {
                            if ($object['id'] === $id) {
                                return $index; // Return the index if ID matches
                            }
                        }
                        return 0; // Return -1 if ID is not found in the array
                    }
                            
                ?>
			</div>
        </div>
        <br>    
        <div class="text-center carrinho_pag_finalizar">
            <button>Finalizar Compra</button>
        </div>
    </main>

    <?php
    require_once('../assets/components/footer.php');
    ?>

</body>

</html>

<?php
    if(isset($_GET['adicionar'])){
        //Adicionando ao carrinho
        $idProduto = (int) $_GET['adicionar'];
        if(isset($items[$idProduto])){
            if(isset($_SESSION['carrinho'][$idProduto])){
                $_SESSION['carrinho'][$idProduto]['quantidade']++;
            } else {
                $_SESSION['carrinho'][$idProduto] = array('quantidade'=>1, 'nome'=>$items[$idProduto]['nome'], 'preco'=>$items[$idProduto]['preco']);
                //header("Location: index.php"); // Redireciona de volta ao carrinho após a remoção
                echo '<script>window.location.href = "carrinho.php";</script>';
                exit();
            }
            //Adicionado ao carrinho
        } else{
            die('Você não pode adicionar um item que não existe.');
        }
    }
    if(isset($_GET['remover'])){
        $idProdutoRemover = (int) $_GET['remover'];
        if(isset($_SESSION['carrinho'][$idProdutoRemover])){
            unset($_SESSION['carrinho'][$idProdutoRemover]);
            //header("Location: index.php"); // Redireciona de volta ao carrinho após a remoção
            echo '<script>window.location.href = "carrinho.php";</script>';
            exit();
        }
    }
            ?>
