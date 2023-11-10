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

    <!--LINK ICONES-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <script type='text/javascript' src='../assets/js/java.js' defer></script>
    <script src='../assets/js/js-bootstrap/bootstrap.bundle.min.js'></script>
    <script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
    <title>Turn Motors | Meus Veículos</title>
</head>

<body id="container__body">
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

        ?>
            <section class='veiculos' >
                <h2 class='veiculo__titulo' >Veiculo Principal</h2>
                <div class='veiculo-principal' >
                    <div class='card-veiculo principal'style=" max-width: 100%">
                        <img src='../assets/img/icone-carro-novo.svg' alt='Ícone de Carro'>
                        <p class='card-veiculo__apelido'><?= $apelidoVeiculoPrinc ?></p>
                        <div class='informacoes-veiculo'>
                            <p class='informacoes-veiculo__conteudo'>Placa: <?= $placaVeiculoPrinc ?></p>
                            <p class='informacoes-veiculo__conteudo'>Modelo: <?= $modeloVeiculoPrinc ?></p>
                            <p class='informacoes-veiculo__conteudo'>Cor: <?= $corVeiculoPrinc ?></p>
                        </div>

                        <div class='acoes-card'>
                            <div class='acao__card'>
                                <a href='../assets/scripts/excluirVeiculo.php?idVeiculo=<?= $idVeiculoPrinc ?>' class='acoes-card__link'>Excluir Veículo</a>
                                <i class='bx bx-trash'></i>
                            </div>
                            <div class='acao__card'>
                                <a href='./personalizacoes.php' class='acoes-card__link'>Personalizar Veículo</a>
                                <i class='bx bx-edit-alt'></i>
                            </div>
                        </div>

                    </div>
                </div>

                <h2 class='veiculo__titulo'>Outros Veiculos</h2>
                <?php

                if ($quantidadeVeiculos > 1) {
                ?>
                    <div class='outros-veiculos'>

                        <?php
                        for ($i = 1; $i < sizeof($registros); $i++) {
                            $idVeiculo = $registros[$i]['idVeiculo'];
                            $apelidoVeiculo = $registros[$i]['apelido'];
                            $placaVeiculo = $registros[$i]['placa'];
                            $modeloVeiculo = $registros[$i]['modelo'];
                            $corVeiculo = $registros[$i]['cor'];
                        ?>
                            <div class='card-veiculo outro'>
                                <img src='../assets/img/icone-carro-novo.svg' alt='Ícone de Carro'>
                                <p class='card-veiculo__apelido'><?= $apelidoVeiculo ?></p>
                                <div class='informacoes-veiculo'>
                                    <p class='informacoes-veiculo__conteudo'>Placa: <?= $placaVeiculo ?></p>
                                    <p class='informacoes-veiculo__conteudo'>Modelo: <?= $modeloVeiculo ?></p>
                                    <p class='informacoes-veiculo__conteudo'>Cor: <?= $corVeiculo ?></p>
                                </div>

                                <div class='acoes-card'>
                                    <div class='acao__card'>
                                        <a href='../assets/scripts/excluirVeiculo.php?idVeiculo=<?= $idVeiculoPrinc ?>' class='acoes-card__link'>Excluir Veículo</a>
                                        <i class='bx bx-trash'></i>
                                    </div>
                                    <div class='acao__card'>
                                        <a href='./personalizacoes.php' class='acoes-card__link'>Personalizar Veículo</a>
                                        <i class='bx bx-edit-alt'></i>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>

                    </div>
            </section>

        <?php
                } else {
        ?>
            <div class='adicione-veiculos'>
                <p class='sem-outros-veiculos__texto'>Não foram encontrados outros veículos.</p>
                <p class='sem-veiculos__texto'><a href='./cadastro-veiculo.php' class='sem-outros-veiculos__link'>Cadastre sua família na Turn Motors!</a></p>
            </div>
            </section>
        <?php
                }
            } else {
        ?>
        <div class='sem-veiculos'>
            <img src='../assets/img/car illustration.svg' alt='Ilustração de uma pessoa dirigindo um carro' class='sem-veiculos__image'>
            <div class='sem-veiculos__conteudo'>
                <p class='sem-veiculos__texto'>Não foi encontrado nenhum veículo cadastrado.</p>
                <p class='sem-veiculos__texto'><a href='./cadastro-veiculo.php' class='sem-veiculos__link'>Cadastrar Veículo</a></p>
            </div>
        </div>

    <?php
            }
    ?>


    </main>

    <?php
    require_once('../assets/components/footer.php');
    ?>
</body>