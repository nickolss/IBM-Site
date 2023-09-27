<?php
require_once('../assets/scripts/conexao.php');
require_once('../assets/scripts/iniciarSessao.php');
?>

<!DOCTYPE html>
<html lang='pt-BR'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>

    <link rel='stylesheet' href='../assets/css/veiculos.css'>
    <link rel='stylesheet' href='../assets/css/itens-personalizacoes.min.css'>
    <link rel='stylesheet' href='../assets/css/estilos-importantes.css'>

    <link rel='shortcut icon' href='../assets/img/favicon.ico' type='image/x-icon'>
    <script type='text/javascript' src='../assets/js/java.js' defer></script>
    <script src='../assets/js/js-bootstrap/bootstrap.bundle.min.js'></script>
    <script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
    <title>Turn Motors | Meus Veículos</title>
</head>

<body>
    <?php
    require_once('../assets/components/header.php');
    ?>

    <main>
        <?php
        $idDono = $_SESSION['id'];
        $sql = $pdo->query("SELECT * FROM `carro` WHERE id_dono = $idDono");
        $registros = $sql->fetchAll();
        $quantidadeVeiculos = $sql->rowCount();

        if ($quantidadeVeiculos != 0) {
            $idVeiculoPrinc = $registros[0]['idVeiculo'];
            $apelidoVeiculoPrinc = $registros[0]['apelido'];
            $placaVeiculoPrinc = $registros[0]['placa'];
            $modeloVeiculoPrinc = $registros[0]['modelo'];
            $corVeiculoPrinc = $registros[0]['cor'];

            echo "
            <section class='veiculos'>
                <h2 class='veiculo__titulo'>Veiculo Principal</h2>
                <div class='veiculo-principal'>
                    <div class='card-veiculo principal'>
                        <img src='../assets/img/icone-carro-novo.svg' alt='Ícone de Carro'>
                        <p class='card-veiculo__apelido'>$apelidoVeiculoPrinc</p>
                        <div class='informacoes-veiculo'>
                            <p class='informacoes-veiculo__conteudo'>Placa: $placaVeiculoPrinc</p>
                            <p class='informacoes-veiculo__conteudo'>Modelo: $modeloVeiculoPrinc</p>
                            <p class='informacoes-veiculo__conteudo'>Cor: $corVeiculoPrinc</p>
                        </div>

                        <div class='acoes-card'>
                            <a href='../assets/scripts/excluirVeiculo.php?idVeiculo=$idVeiculoPrinc' class='acoes-card__link'>Excluir Veículo</a>
                            <a href='./personalizacoes.php' class='acoes-card__link'>Personalizar Veículo</a>
                        </div>
                    </div>
                </div>

                <h2 class='veiculo__titulo'>Outros Veiculos</h2>
            ";

            if ($quantidadeVeiculos > 1) {
                echo "<div class='outros-veiculos'>";

                for ($i=1; $i < sizeof($registros); $i++) { 
                    $idVeiculo = $registros[$i]['idVeiculo'];
                    $apelidoVeiculo = $registros[$i]['apelido'];
                    $placaVeiculo = $registros[$i]['placa'];
                    $modeloVeiculo = $registros[$i]['modelo'];
                    $corVeiculo = $registros[$i]['cor'];
                    echo "
                            <div class='card-veiculo outro'>
                                <img src='../assets/img/icone-carro-novo.svg' alt='Ícone de Carro'>
                                <p class='card-veiculo__apelido'>$apelidoVeiculo</p>
                                <div class='informacoes-veiculo'>
                                    <p class='informacoes-veiculo__conteudo'>Placa: $placaVeiculo</p>
                                    <p class='informacoes-veiculo__conteudo'>Modelo: $modeloVeiculo</p>
                                    <p class='informacoes-veiculo__conteudo'>Cor: $corVeiculo</p>
                                </div>

                                <div class='acoes-card'>
                                    <a href='../assets/scripts/excluirVeiculo.php?idVeiculo=$idVeiculo' class='acoes-card__link'>Excluir Veículo</a>
                                    <a href='./personalizacoes.php' class='acoes-card__link'>Personalizar Veículo</a>
                                </div>
                            </div>
                            ";
                }

                echo "
                            </div>
                        </section>
                    ";
            } else {
                echo "
                        <div class='adicione-veiculos'>
                            <p class='sem-outros-veiculos__texto'>Não foram encontrados outros veículos.</p>
                            <p class='sem-veiculos__texto'><a href='./cadastro-veiculo.php' class='sem-outros-veiculos__link'>Cadastre sua família na Turn Motors!</a></p>
                        </div>
                    </section>
                ";
            }
        } else {
            echo "
                <div class='sem-veiculos'>
                    <img src='../assets/img/car illustration.svg' alt='Ilustração de uma pessoa dirigindo um carro' class='sem-veiculos__image'>
                    <div class='sem-veiculos__conteudo'>
                        <p class='sem-veiculos__texto'>Não foi encontrado nenhum veículo cadastrado.</p>
                        <p class='sem-veiculos__texto'><a href='./cadastro-veiculo.php' class='sem-veiculos__link'>Cadastrar Veículo</a></p>
                    </div>
                </div>
                ";
        }
        ?>


    </main>

    <?php
    require_once('../assets/components/footer.php');
    ?>
</body>