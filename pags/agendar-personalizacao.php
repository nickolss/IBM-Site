<?php 
    require_once('../assets/scripts/iniciarSessao.php');
    require_once('../assets/scripts/consultaCliente.php');
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
                <h1 class="mainTitle">Agendar Personalização</h1>
            </div>

            <div class="cadastro">
              <?php $categoria = 'rebaixamento-dropped' ?> <!--atribuindo o valor a variável $categoria para passá-la pela url no action do form-->
                <form action="../assets/scripts/cadastrarPedidoOrçamento.php" method="POST">

                    <!--PARTE DA DATA E HORÁRIO DO AGENDAMENTO-->
                    <div class="subTitulo">
                        <h2 class="subTitle">Agende sua data e horário para realizarmos a personalização</h2>
                        <p class="paragrafo__subTitle">Avenida Turbo Nº1</p>
                    </div>

                    <div class="caixa__input">
                        <input type="date" required name="data" id="data" autocomplete="off">
                        <label for="data">Data</label>
                    </div>

                    <div class="caixa__input">
                      <div class="dropdown-categorias">
                        <label id="label__dropdown__categoria" for="horario">Horário:</label>
                        <select required id="horario" name="horario">
                          <option class="opcao__categoria" value="8h">8h</option>
                          <option class="opcao__categoria" value="10h">10h</option>
                          <option class="opcao__categoria" value="12h">12h</option>
                          <option class="opcao__categoria" value="14h">14h</option>
                          <option class="opcao__categoria" value="16h">16h</option>
                          <option class="opcao__categoria" value="18h">18h</option>
                        </select>
                      </div>
                      <br>
                  </div>

                  <!--PARTE DE PAGAMENTO DO AGENDAMENTO-->
                    <div style="margin-top: 50px;" class="subTitulo">
                          <h2 class="subTitle">Informe os dados do seu cartão</h2>
                          <p class="paragrafo__subTitle">Pagamento para a personalização desejada.</p>
                          <p class="paragrafo__subTitle">Após pagar a taxa de orçamento e aprová-lo com nossos mecânicos, entre na sessão de perfil e clique na área "Orçamentos" para agendar uma data a fim de levar seu veículo a nossa oficina e possamos iniciar a sua personalização. </p>
                    </div>

                    <div id="div__inputCartao">

                      <div class="input__endereco">

                        <div class="caixa__input">
                          <input style="height: 52px;" type="date" name="dataValidade" id="dataValidade" autocomplete="off" min="<?= $dataAtual ?>" required>
                          <label for="data">Data de Validade</label>
                        </div>

                        <div class="caixa__input caixa__input__margin">
                          <input type="number" required name="numeroCartao" id="numeroCartao" autocomplete="off">
                          <label for="numeroCartao">Número do Cartão</label>
                        </div>

                      </div>

                      <div class="input__endereco">
                        <div class="caixa__input">
                          <input class="inputCartao" type="number" name="cvvCartao" id="cvvCartao" required maxlength="3" pattern="^\d{3,4}$" title="O CVV deve ter 3 digitos numéricos.">
                          <label for="address">CVV</label>
                        </div>

                        <div class="caixa__input caixa__input__margin">
                          <input type="text" required name="nomeCartao" id="nomeCartao" autocomplete="off" minlength="1">
                          <label for="numero">Nome Completo</label>
                        </div>
                      </div>


                    <div id="div__forma__pagamento__title">
                      <h2 id="forma__pagamento__title">Escolha sua forma de pagamento preferida:</h2>
                    </div>

                    <div class="opcao__cartao">
                      <div class="opcao__radio__cartao">
                        <input class="inputRadio" type="radio" id="credito" name="opcao_cartao" value="credito">
                        <label class="labelRadio" id="labelCredito" for="credito">Crédito</label>
                      </div>
                      <div class="opcao__radio__cartao opcao__radio__cartao__margin">
                        <input class="inputRadio" type="radio" id="debito" name="opcao_cartao" value="debito">
                        <label class="labelRadio" for="debito">Débito</label>
                      </div>
                        <br>
                      

                    </div>
                    <div class="div__preco">
                      <p id="preco">R$29,90</p>
                      <p id="plano">Orçamento</p>
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
    
