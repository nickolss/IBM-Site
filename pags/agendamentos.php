<?php
require_once('../assets/scripts/conexao.php');
require_once('../assets/scripts/iniciarSessao.php');
require_once('../assets/scripts/consultaCliente.php');

$dataAtual = date('Y-m-d');
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Turn Motors | Agendamento</title>
    <link rel="stylesheet" href="../assets/css/agendamento.min.css">
    <link rel="stylesheet" href="../assets/css/pagamento-cartao.min.css">
    <link rel="stylesheet" href="../assets/css/estilos-importantes.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">
    <script type="text/javascript" src="../assets/js/java.js" defer></script>
    <script src="../assets/js/js-bootstrap/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head> 

<body id="container__body">

    <!--HEADER-->
    <?php
    require_once('../assets/components/header.php');
    ?>

    <main>
        <div class="titulo">
            <h1 class="mainTitle">Agendar Orçamento</h1>
        </div>

        <div class="cadastro">
            <?php $categoria = $_GET['categoria'] ?> <!--atribuindo o valor a variável $categoria para passá-la pela url no action do form-->
            <form action="../assets/scripts/cadastrarPedidoOrçamento.php?categoria=<?= $categoria; ?>" method="POST">

                <!--PARTE DAS INFORMAÇÕES DO VEÍCULO DO AGENDAMENTO-->
                <div class="caixa__input">
                    <div class="dropdown-categorias">
                        <label id="label__dropdown__categoria" for="idCarro">Carros Disponíveis:</label>
                        <select required id="idCarro" name="idCarro">
                            <?php
                            $idDono = $_SESSION['id'];
                            $sql = $pdo->query("SELECT * FROM `carro` WHERE id_dono = $idDono");
                            $registros = $sql->fetchAll();

                            foreach ($registros as $carro) {
                                $idVeiculo = $carro['idVeiculo'];
                                $apelido = $carro['apelido'];
                                echo "
                                        <option class='opcao__categoria' value='$idVeiculo'>$apelido</option>
                                    ";
                            }
                            ?>
                        </select>
                    </div>
                    <br>
                </div>

                <!--PARTE DA DATA E HORÁRIO DO AGENDAMENTO-->
                <div class="subTitulo">
                    <h2 class="subTitle">Agende sua data e horário para realizarmos o orçamento</h2>
                    <p class="paragrafo__subTitle">Venha em nossa oficina para realizar a inspeção e orçamento de sua personalização.</p>
                    <p class="paragrafo__subTitle">No dia indicado, nossos mecânicos irão analisar seu veículo e efetuar o orçamento da personalização.</p>
                    <p class="paragrafo__subTitle">Avenida Turbo Nº1</p>
                </div>

                <div class="caixa__input">
                    <input type="date" required name="data" id="data" autocomplete="off" min="<?= $dataAtual ?>">
                    <label for="data">Data</label>
                </div>

                <div class="caixa__input">
                    <div class="dropdown-categorias">
                        <label id="label__dropdown__categoria" for="horario">Horário:</label>
                        <select required id="horario" name="horario">
                            <option class="opcao__categoria" value="8">8h</option>
                            <option class="opcao__categoria" value="10">10h</option>
                            <option class="opcao__categoria" value="12">12h</option>
                            <option class="opcao__categoria" value="14">14h</option>
                            <option class="opcao__categoria" value="16">16h</option>
                            <option class="opcao__categoria" value="18">18h</option>
                        </select>
                    </div>
                    <br>
                </div>

                <div class="botoes">
                    <div class="botao">
                        <button class="botao__laranja" type="submit">Agendar orçamento</button>
                    </div>
                </div>

            </form>
        </div>
    </main>

    <!--FOOTER-->
    <?php
    require_once('../assets/components/footer.php');
    ?>

</body>

</html