<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/modal.min.css">
        <title>Turn Motors | Compra Aprovada</title>
    </head>
    <body>
        <?php
            //importacao dos arquivos
            require_once('./conexao.php');
            require_once('./iniciarSessao.php');

            //atribuindo o valor do id da sessao a variavel idUser
            $idUser = $_SESSION['id'];

            //para cada produto no carrinho:
            foreach ($_SESSION['carrinho'] as $idProd => $value) {
                $nomeProduto = $value['nome']; 
                $quantidadeProduto = $value['quantidade'];
                
                //query SQL para selecionar todas as informacoes do produto
                $sqlSelectProduto = $pdo->query("SELECT * FROM `produto` WHERE `nome`='$nomeProduto'");
                $sqlSelectProduto->execute();
                $produtoInfos = $sqlSelectProduto->fetchAll(PDO::FETCH_ASSOC);

                    //estrutura de repeticao para percorrer todos os itens e informacoes dos produtos
                    foreach($produtoInfos as $produtoInfo){

                        //passando as informacoes dos produtos para as variaveis correspondentes
                        $idProduto = $produtoInfo['codigoProduto'];
                        $nomeProduto = $produtoInfo['nome'];
                        $precoProduto = $produtoInfo['preco'];
                        $pontoProduto = $produtoInfo['pontos'];
                        
                        //estrutura de repeticao para fazer INSERT INTO dos produtos comprados no bd. Caso tenha mais de uma unidade de um mesmo produto o INSERT INTO sera executado de acordo com a variavel $quantidadeProduto
                        for($i=1; $i<=$quantidadeProduto; $i++){
                            $sqlInsertCompra = $pdo->prepare("INSERT INTO `produtosComprados` (`idProdutos`, `nomeProdutos`, `preco_final`, `id_comprador`) VALUES('$idProduto','$nomeProduto', '$precoProduto', '$idUser')");
                        }
                        
                        //caso a variavel $sqlInsertCompra tenha sido executada:
                        if($sqlInsertCompra->execute()){

                            if($_SESSION['plano'] == 'turbinado'){
                                //query SQL para selecionar a quantidade de pontos da tabela cliente 
                                $sqlSelectPontosCliente = $pdo->query("SELECT `quantidadePontos` FROM `cliente` WHERE `id`='$idUser'");
                                $sqlSelectPontosCliente->execute();
                                
                                //os dados serão retornados em um array associativo 
                                $tuplaQuantidadePontos = $sqlSelectPontosCliente->fetch(PDO::FETCH_ASSOC);

                                //atribuindo o valor do registro do campo quantidadePontos, acessado pelo array, a variavel $quantidadePontosAtual
                                $quantidadePontosAtual = $tuplaQuantidadePontos['quantidadePontos'];

                                //atribuindo a variavel $quantidadePontoFinal a soma entre a quantidade de pontos atual do cliente e a quantidade de pontos do produto especifico
                                $quantidadePontoFinal = $pontoProduto + $quantidadePontosAtual;

                                //atualizando o campo 'quantidadePontos' e atribuindo o novo valor sendo a quantidade final de pontos
                                $sqlInsertPontosCliente = $pdo->prepare("UPDATE `cliente` SET `quantidadePontos`='$quantidadePontoFinal' WHERE `id`='$idUser' LIMIT 1");
                                $sqlInsertPontosCliente->execute();
                            }
                            
                            // Limpar todos os itens do carrinho
                            $_SESSION['carrinho'] = array();

                            header("Location: ../../pags/pedido-feito.php");
                        }
                    }
            }
        ?>
    </body>
</html>