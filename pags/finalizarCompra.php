<?php
require_once('../assets/scripts/conexao.php');
require_once('../assets/scripts/iniciarSessao.php');
require_once('../assets/scripts/consultaCliente.php');
$anoAt = date("Y");
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turn Motors | Finalizar Compra</title>
    <link rel="stylesheet" href="../assets/css/finalizar-compra.min.css">
    <link rel="stylesheet" href="../assets/css/cadastro.min.css">
    <link rel="stylesheet" href="../assets/css/pagamento-cartao.min.css">
    <link rel="stylesheet" href="../assets/css/estilos-importantes.css">
    <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">
    <script src="../assets/js/cadastro-endereco.js" defer></script>
    <script type="text/javascript" src="../assets/js/java.js" defer></script>
    <script type="text/javascript" src="../assets/js/mascaraCartao.js" defer></script>
    <script type="text/javascript" src="../assets/js/escolherPagamento.js" defer></script>
    <script src="../assets/js/js-bootstrap/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script> <!-- CDN para gerar QR Code -->
</head>

<body id="container__body">
    <?php
    require_once('../assets/components/header.php');
    ?>

    <main>
        <?php
        $id = $_SESSION['id'] || null;
        $sql = "SELECT * FROM `endereco` WHERE `id_morador` = '$id'";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $quantidadeTupla = $stmt->rowCount();
        $endereco = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <div class="container__endereco-cartao-resumo">
            <!--RESUMO DO PEDIDO-->
            <div class="resumo-pedido">
                <h2>Resumo do Pedido</h2>
                <h3 class="subtitles__resumo-pedido">Itens:</h3>
                <?php
                foreach ($_SESSION['carrinho'] as $idProd => $value) { ?>
                    <div class="row">
                        <div class="col">
                            <p id="titulo-produto__carinho"><?php echo $value['nome'] . " " . $value['quantidade'] . "x"; ?></p>
                        </div>
                    </div>
                <?php
                }
                ?>
                <?php
                $totalCarrinho = 0; // Variável para calcular o preço total
                $totalItens = 0; // Variável para calcular a quantidade total de itens

                foreach ($_SESSION['carrinho'] as $idProd => $value) {
                    $subtotal = $value['preco'] * $value['quantidade'];
                    $totalCarrinho += $subtotal;
                    $totalItens += $value['quantidade'];
                } ?>
                <h3 class="subtitles__resumo-pedido">Preço Final: </h3>
                <?php
                echo "R$$totalCarrinho";
                ?>


            </div>

            <!--ENDERECO E CARTAO-->
            <form action="../assets/scripts/cadastrarCompra.php" method="POST">
                <div class="container__endereco-cartao">
                    <div class="container__endereco">
                        <h1>Endereço</h1>
                        <div class="cadastro">
                            <div class="caixa__input">
                                <?php
                                if ($_SESSION['id'] == null) {
                                ?>
                                    <input type="text" required name="cep" id="cep" autocomplete="off" minlength="8" maxlength="8">
                                <?php
                                } else {
                                ?>
                                    <input type="text" required name="cep" id="cep" autocomplete="off" minlength="8" maxlength="8" value="<?= $endereco[0]['cep'] ?>">
                                <?php
                                }
                                ?>
                                <label for="cep">CEP</label>
                            </div>
                            <div class="input__endereco">
                                <div class="caixa__input">
                                    <input type="text" required name="address" id="address" autocomplete="off" disabled data-input>
                                    <label for="address">Rua</label>
                                </div>
                                <div class="caixa__input caixa__input__margin">
                                    <input type="number" required name="numero" id="numero" autocomplete="off" minlength="1" maxlength="5" disabled data-input>
                                    <label for="numero">Número</label>
                                </div>
                            </div>
                            <div class="input__endereco">
                                <div class="caixa__input">
                                    <input type="text" name="complemento" id="complemento" autocomplete="off" disabled data-input>
                                    <label for="complemento">Complemento</label>
                                </div>
                                <div class="caixa__input caixa__input__margin">
                                    <input type="text" required name="neighborhood" id="neighborhood" autocomplete="off" disabled data-input>
                                    <label for="neighborhood">Bairro</label>
                                </div>
                            </div>
                            <div class="input__endereco input__endereco__last">
                                <div class="caixa__input">
                                    <input type="text" required name="city" id="city" autocomplete="off" disabled data-input>
                                    <label for="city">Cidade</label>
                                </div>
                                <div class="caixa__input caixa__input__select">
                                    <div class="dropdown-categorias">
                                        <label id="label__dropdown__categoria" for="region">Estado:</label>
                                        <select id="region" name="region" required disabled data-input>
                                            <option class="opcao__categoria" selected>Estado</option>
                                            <option class="opcao__categoria" value="AC">Acre</option>
                                            <option class="opcao__categoria" value="AL">Alagoas</option>
                                            <option class="opcao__categoria" value="AP">Amapá</option>
                                            <option class="opcao__categoria" value="AM">Amazonas</option>
                                            <option class="opcao__categoria" value="BA">Bahia</option>
                                            <option class="opcao__categoria" value="CE">Ceará</option>
                                            <option class="opcao__categoria" value="ES">Espírito Santo</option>
                                            <option class="opcao__categoria" value="GO">Goiás</option>
                                            <option class="opcao__categoria" value="MA">Maranhão</option>
                                            <option class="opcao__categoria" value="MT">Mato Grosso</option>
                                            <option class="opcao__categoria" value="MS">Mato Grosso do Sul</option>
                                            <option class="opcao__categoria" value="MG">Minas Gerais</option>
                                            <option class="opcao__categoria" value="PA">Pará</option>
                                            <option class="opcao__categoria" value="PB">Paraíba</option>
                                            <option class="opcao__categoria" value="PR">Paraná</option>
                                            <option class="opcao__categoria" value="PE">Pernambuco</option>
                                            <option class="opcao__categoria" value="PI">Piauí</option>
                                            <option class="opcao__categoria" value="RJ">Rio de Janeiro</option>
                                            <option class="opcao__categoria" value="RN">Rio Grande do Norte</option>
                                            <option class="opcao__categoria" value="RS">Rio Grande do Sul</option>
                                            <option class="opcao__categoria" value="RO">Rondônia</option>
                                            <option class="opcao__categoria" value="RR">Roraima</option>
                                            <option class="opcao__categoria" value="SC">Santa Catarina</option>
                                            <option class="opcao__categoria" value="SP">São Paulo</option>
                                            <option class="opcao__categoria" value="SE">Sergipe</option>
                                            <option class="opcao__categoria" value="TO">Tocantins</option>
                                        </select>
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container__cartao">
                        <h1>Pagamento</h1>

                        <div class="opcao__cartao d-flex justify-content-center">
                            <div class="opcao__radio__cartao">
                                <input class="inputRadio" type="radio" id="pix" name="opcao_cartao" value="pix" required>
                                <label class="labelRadio" id="labelPix" for="pix">Pix</label>
                            </div>
                            <div class="opcao__radio__cartao opcao__radio__cartao__margin">
                                <input class="inputRadio" type="radio" id="cartao" name="opcao_cartao" value="cartao" required>
                                <label class="labelRadio" for="cartao">Cartão</label>
                            </div>
                            <br>
                        </div>

                        <div class="cadastro" id="divPix">
                            <div>
                                <div id="qrcode-container">
                                    <div id="qrcode" class="qrcode"></div>
                                </div>
                            </div>
                        </div>

                        <div class="cadastro d-flex justify-content-start" id="divCartao">
                            <div class="input__endereco">
                                <div class="caixa__input">
                                    <input type="text" required name="numeroCartao" id="numeroCartao" autocomplete="off" maxlength="19">
                                    <label for="numeroCartao">Número do Cartão</label>
                                </div>
                            </div>
                            <div class="input__endereco">
                                <div class="caixa__input">
                                    <input class="inputCartao" type="number" name="mesCartao" id="mesCartao" required maxlength="2" minlength="2" min="1" max="12" title="O mês deve ter 2 digitos numéricos.">
                                    <label for="address">Mês de Validade</label>
                                </div>
                                <div class="caixa__input caixa__input__margin">
                                    <input type="number" required name="anoCartao" id="anoCartao" autocomplete="off" maxlength="4" minlength="4" title="O ano deve ter 4 digitos numéricos." min=<?= $anoAt ?>>
                                    <label for="numero">Ano de Validade</label>
                                </div>
                            </div>
                            <div class="input__endereco">
                                <div class="caixa__input">
                                    <input class="inputCartao" type="text" id="cvv" name="cvvCartao" id="cvvCartao" size="4" maxlength="4" pattern="\d{3,3}" title="O CVV deve ter 3 digitos numéricos." required>
                                    <label for="address">CVV</label>
                                </div>
                                <div class="caixa__input caixa__input__margin">
                                    <input type="text" required name="nomeCartao" id="nomeCartao" autocomplete="off" minlength="1" value="<?= $_SESSION['nomeCliente'] ?>">
                                    <label for="numero">Nome Completo</label>
                                </div>
                            </div>
                            <div id="div__forma__pagamento__title">
                                <h2 id="forma__pagamento__title">Escolha sua forma de pagamento preferida:</h2>
                            </div>
                            <div class="opcao__cartao">
                                <div class="opcao__radio__cartao">
                                    <input class="inputRadio" type="radio" id="credito" name="opcao_cartao" value="credito" required>
                                    <label class="labelRadio" id="labelCredito" for="credito">Crédito</label>
                                </div>
                                <div class="opcao__radio__cartao opcao__radio__cartao__margin">
                                    <input class="inputRadio" type="radio" id="debito" name="opcao_cartao" value="debito" required>
                                    <label class="labelRadio" for="debito">Débito</label>
                                </div>
                                <br>
                            </div>
                        </div>

                    </div>
                    <div class="div__btn-finalizar">
                        <button class="btn__finalizar-compra" type="submit">Finalizar Compra</button>
                    </div>
                </div>
            </form>
        </div>
    </main>

    <?php
    require_once('../assets/components/footer.php');
    ?>
</body>

</html>