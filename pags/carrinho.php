<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Turn Motors | Concurso</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <link rel="stylesheet" href="../assets/css/estilos-importantes.css">
    <link rel="stylesheet" href="../assets/css/vagas.min.css">
    <link rel="stylesheet" href="../assets/css/carrinho.min.css">


    <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">
    <script type="text/javascript" src="assets/js/java.js" defer></script>
    <script src="../assets/js/js-bootstrap/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php
    require_once('../assets/components/header.php');
    ?>


    <main id="carrinho_pag">
        <div class="area_carrinho_pag">
            <div class="row">
                <div class="col">
                    <h1>Carrinho de Compras</h1>
                    <h4>Desmarcar todos os itens</h4>
                </div>
            </div>
            <hr>
            <div>
                <table class="table table-responsive">
                    <tbody>
                        <tr>
                            <td>

                                <div class="d-flex carrinho_pag_itens">
                                    <div class="carrinho_pag__img">
                                        <img class="img-fluid" src="../assets/img/tapete.svg" alt="">
                                    </div>
                                    <div class="carrinho_pag__info">
                                        <h1>Tapete</h1>
                                        <h2>R$100</h2>
                                        <div class="d-flex ">
                                            <div class="carrinho_pag_botoes_mais_menos d-flex justify-content-between">
                                                <button>-</button>
                                                <span>1</span>
                                                <button>+</button>
                                            </div>

                                            <div>Excluir</div>
                                        </div>
                                    </div>
                                </div>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>


            <hr>

            <div class="row">
                <div class="col">
                    <div class="d-flex justify-content-end carrinho_pag_preco">
                        <p>Subtotal (x itens): <strong>R$x</strong></p>
                    </div>

                </div>
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