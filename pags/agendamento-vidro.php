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
      <link rel="stylesheet" href="../assets/css/estilos-importantes.css">
      <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
      <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">  
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                <form action="../assets/scripts/cadastrarAgendamento.php" method="POST">

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
                        <h2 class="subTitle">Agende sua Data e Horário</h2>
                        <p>Venha em nossa oficina para realizar a inspeção e orçamento de sua personalização.</p>
                        <p>Avenida Turbo Nº1</p>
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

                  <div class="botoes">
                          <div class="botao">
                            <button class="botao__laranja" type="submit">Agendar</button>
                        </div>
                    </div>

                    <div style="display:none;" class="caixa__input">
                      <div class="dropdown-categorias">
                        <select required id="categoria" name="categoria">
                          <option class="opcao__categoria" value="insulfilm">Insulfilm</option>
                        </select>
                      </div>
                      <br>
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
    
