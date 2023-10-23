<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/modal.min.css">
        <title>Turn Motors | Troca Realizada</title>
    </head>
    <body>
        <?php
            //importacao dos arquivos
            require_once('./conexao.php');
            require_once('./iniciarSessao.php');

            //atribuindo o valor do id da sessao a variavel idUser
            $idUser = $_SESSION['id'];

            //query SQL para selecionar a quantidade de pontos da tabela cliente 
            $sqlSelectPontosCliente = $pdo->query("SELECT `quantidadePontos` FROM `cliente` WHERE `id`='$idUser'");
            $sqlSelectPontosCliente->execute();
            
            //os dados serão retornados em um array associativo 
            $tuplaQuantidadePontos = $sqlSelectPontosCliente->fetch(PDO::FETCH_ASSOC);

            //atribuindo o valor do registro do campo quantidadePontos, acessado pelo array, a variavel $quantidadePontosAtual
            $quantidadePontosAtual = $tuplaQuantidadePontos['quantidadePontos'];

            $pontos = $_GET['pontos'];

            //caso nao tenha pontos suficientes na conta:
            if($quantidadePontosAtual < $pontos){
                //redirecionando para o modal e exibindo que os pontos sao insuficientes
                $tituloModal = "Pontos insuficientes!";
                $textoModal = "Pontos insuficientes para a realização da troca.";
                require_once('../components/modal.php');
            }else{ //caso tenha pontos suficientes na conta:
                //atribuindo a variavel $quantidadePontoFinal a soma entre a quantidade de pontos atual do cliente e a quantidade de pontos do produto especifico
                $quantidadePontoFinal = $quantidadePontosAtual - $pontos;

                //atualizando o campo 'quantidadePontos' e atribuindo o novo valor sendo a quantidade final de pontos
                $sqlInsertPontosCliente = $pdo->prepare("UPDATE `cliente` SET `quantidadePontos`='$quantidadePontoFinal' WHERE `id`='$idUser' LIMIT 1");
                $sqlInsertPontosCliente->execute();
                                
                $tituloModal = "Troca realizada com sucesso!";
                $textoModal = "Obrigado pela preferência!";
                require_once('../components/modal.php');
            }

        ?>
    </body>
</html>