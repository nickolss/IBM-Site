<!DOCTYPE html>
<html lang="pt-BR">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Turn Motors | Agendamento</title>
        <link rel="stylesheet" href="../assets/css/agendamento.min.css">
      <link rel="stylesheet" href="../assets/css/estilos-importantes.css">
      <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
      <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">  
      <script type="text/javascript" src="../assets/js/java.js" defer></script>
      <script src="../assets/js/js-bootstrap/bootstrap.bundle.min.js"></script>
    </head>
    <body id="container__body">
    
        <?php 
          require_once('../assets/components/header.php');
        ?>
        
        <main>
            <div class="titulo">
                <h1 class="mainTitle">Agendamento</h1>
            </div>

            <div class="cadastro">
                <form action="#" method="POST">

                    <div class="subTitulo">
                        <h2 class="subTitle">Informações Atuais do Veículo</h2>
                    </div>

                    <div class="caixa__input">
                        <input type="text" required name="corAtual" id="corAtual" autocomplete="off">
                        <label for="corAtual">Cor</label>
                    </div>

                    <div class="caixa__input">
                        <input type="text" required name="modelo" id="modelo" autocomplete="off">
                        <label for="modelo">Modelo</label>
                    </div>

                    <div class="caixa__input">
                        <input type="text" required name="placa" id="placa" autocomplete="off">
                        <label for="placa">Placa</label>
                    </div>

                    <div class="subTitulo">
                      <h2 class="subTitle">Cor Desejada:</h2>
                  </div>

                  <div class="caixa__input">
                    <input type="text" required name="cor" id="cor" autocomplete="off">
                    <label for="cor">Cor</label>
                </div>

                    <div class="subTitulo">
                        <h2 class="subTitle">Agende sua Data e Horário</h2>
                        <p>Venha em nossa oficina para realizar a inspeção e orçamento de sua personalização.</p>
                        <p>Rua Fictícia Nº1</p>
                    </div>

                    <div class="caixa__input">
                        <input type="date" required name="data" id="data" autocomplete="off">
                        <label for="data">Data</label>
                    </div>

                    <div class="caixa_input">
                        <div class="select-menu">
                            <div class="select-btn">
                              <span class="sBtn-text">Horário</span>
                              <i id="icone__seta" class="bx bx-chevron-down"></i> <!--ICONE BOXICONS SETINHA PARA BAIXO-->
                            </div>
                
                            <ui class="options">
                              <i class="option">
                                <span class="option-text">8h</span>
                              </i>
                              <i class="option">
                                <span class="option-text">10h</span>
                              </i>
                              <i class="option">
                                <span class="option-text">12h</span>
                              </i>
                              <i class="option">
                                <span class="option-text">14h</span>
                              </i>
                              <i class="option">
                                <span class="option-text">16h</span>
                              </i>
                              <i class="option">
                                <span class="option-text">18h</span>
                              </i>
                            </ui>
                
                        </div>
                    </div>

                    <div class="botoes">
                        <div class="linha">
                            <div class="botao">
                                <button class="botao__laranja" type="submit">Agendar</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>

            <script src="../assets/js/drowdown.js"></script>

        </main>

        <?php 
          require_once('../assets/components/footer.php');
        ?>

    </body>
</html
    
