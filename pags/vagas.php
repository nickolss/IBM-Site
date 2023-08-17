<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Turn Motors | Vagas</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!--LINK ICONES-->
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  <link rel="stylesheet" href="../assets/css/mainvagas.min.css">
  <link rel="stylesheet" href="../assets/css/carrossel.min.css">
  <link rel="stylesheet" href="../assets/css/estilos-importantes.css">


  <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">
  <script type="text/javascript" src="../assets/js/java.js" defer></script>
  <script src="../assets/js/js-bootstrap/bootstrap.bundle.min.js"></script>
</head>

<body id="container__body">

  <?php
  require_once('../assets/components/header.php');
  ?>

  <main>
    <div class="container">
        <div class="titles">
            <h1 class="main__title">Seja parte do time Turn Motors</h1>
            <h2 class="sub__title">Veja as vagas de emprego disponível para você fazer parte da equipe Turn Motors</h2>
        </div>

        <div class="slider">
            <div class="slides">
                <!--RADIO BUTTONS-->
                <input type="radio" name="radio-btn" id="radio1">
                <input type="radio" name="radio-btn" id="radio2">
                <input type="radio" name="radio-btn" id="radio3">
                <!--FIM RADIO BUTTONS-->

                <!--SLIDE IMAGENS-->
                <div class="slide primeiro">
                    <a href="concurso.php"><img src="../assets/img/concurso.jpg" alt="Concurso"></a>
                </div>
                <div class="slide">
                    <a href="funcionariames.php"><img src="../assets/img/funcionaria.jpg" alt="Funcionária do Mês"></a>
                </div>
                <div class="slide">
                    <a href="equipe.php"><img src="../assets/img/equipe.jpg" alt="Equipe 2023"></a>
                </div>
                <!--FIM SLIDE IMAGENS-->

                <!--AUTO NAVEGAÇÃO-->
                <div class="auto-navegacao">
                    <div class="auto-btn1">

                    </div>
                    <div class="auto-btn2">
                        
                    </div>
                    <div class="auto-btn3">
                        
                    </div>
                </div>

            </div>

            <div class="navegacao-manual">
                <label for="radio1" class="manual-btn"></label>
                <label for="radio2" class="manual-btn"></label>
                <label for="radio3" class="manual-btn"></label>
            </div>
        </div>

        <div class="titles">
            <h3>Vagas a serem preenchidas</h3>
        </div>

        <!--TELA GRANDE/MEDIA-->
        <div class="tela__media">
            <div class="container__horizontal__cards">
                <!--MECANICO AUTOMOTIVO-->
                <a class="a__card" href="mecanicoautomotivo.php">
                    <div class="horizontal__card">
                        <div class="coluna">
                            <div class="card__img">
                                <img id="card__imagem" src="../assets/img/mecanica.jpg" alt="Mecânica">
                            </div>
                        </div>
                        <div class="coluna horizontal__card__text">
                            <div class="card__title">
                                <h4>Mecânico Automotivo</h4>
                            </div>
                            <div class="card__info">
                                <p>Profissional para diagnosticar problemas em automóveis. Realiza reparos e manutenção em carros e motos. Precisa ser capaz de desmontar o automóvel, reparar e substituir qualquer peça, ajustar e lubrificar o motor de um veículo.</p>
                            </div>
                        </div>
                    </div>
                </a>
                <!--FUNILEIRO-->
                <a class="a__card" href="funileiro.php">
                    <div class="horizontal__card">
                        <div class="coluna">
                            <div class="card__img">
                                <img id="card__imagem" src="../assets/img/funileiro.jpg" alt="Funileiro">
                            </div>
                        </div>
                        <div class="coluna horizontal__card__text">
                            <div class="card__title">
                                <h4>Funileiro</h4>
                            </div>
                            <div class="card__info">
                                <p>Reparo e instalação de peças e elementos em chapas de metal. Fabrica e repara recipientes e elementos de chapas de aço. Atua com recorte, modelagem e trabalho de barras perfiladas de materiais ferrosos e não ferrosos.</p>
                            </div>
                        </div>
                    </div>
                </a>
                <!--OPERADOR INJETORA-->
                <a class="a__card" href="operadorinjecao.php">
                    <div class="horizontal__card">
                        <div class="coluna">
                            <div class="card__img">
                                <img id="card__imagem" src="../assets/img/operadorinjecao.jpg" alt="Operador de Injeção">
                            </div>
                        </div>
                        <div class="coluna horizontal__card__text">
                            <div class="card__title">
                                <h4>Operador de Injetora</h4>
                            </div>
                            <div class="card__info">
                                <p>Manuseia máquina injetora, fazendo os ajustes e regulagem durante o processo. <br> Faz a manutenção preventiva e corretiva, limpeza e conservação das máquinas e equipamentos.</p>
                            </div>
                        </div>
                    </div>
                </a>
            
            </div>
            <div class="titles">
                <h3>Outras Vagas</h3>
            </div>
            <div class="container__vertical__card">
                <!--INSTALADOR DE ALARMES-->
                <a href="instaladoralarme.php" class="a__card vertical__card__margem">
                    <div class="vertical__card vertical__card__margem">
                        <div class="card__img__card">
                            <img src="../assets/img/instalador-alarme.jpg" alt="Instalador de Alarme">
                        </div>
                        <div class="card__titulo">
                            <h3>Instalador de Alarmes</h3>
                        </div>
                        <div class="card__descricao">
                            <p>Atua com instalação e manutenção de alarmes monitorados e CFTV digital. Faz passagem de cabeamento, reparos e faz elaboração de laudos técnicos.</p>
                        </div>
                    </div>
                </a>
                <!--MECANICO CARRO HIBRIDO-->
                <a href="mecanicohibrido.php" class="a__card vertical__card__margem">
                    <div class="vertical__card">
                        <div class="card__img__card">
                            <img src="../assets/img/hibrido.jpg" alt="Carro Hibrido">
                        </div>
                        <div class="card__titulo">
                            <h3>Mecânico de Carros Híbridos</h3>
                        </div>
                        <div class="card__descricao">
                            <p>São engenheiros mecânicos com seu conhecimento voltado para carros de técnologia híbrida e na manutenção de carros com esse padrão.</p>
                        </div>
                    </div>
                </a>
                <!--REPARADOR DE CAMBIOS-->
                <a href="reparadorcambio.php" class="a__card">
                    <div class="vertical__card">
                        <div class="card__img__card">
                            <img src="../assets/img/reparadorcambio.jpg" alt="Reparador de câmbios">
                        </div>
                        <div class="card__titulo">
                            <h3>Reparador de câmbios</h3>
                        </div>
                        <div class="card__descricao">
                            <p>Responsável pela reparação, manutenção e possível troca de câmbios automáticos. <br>⠀ <br>⠀ <br>⠀</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <!--MOBILE-->
        <div class="mobile">
            <div class="container__horizontal__cards">
                <div class="linha">
                    <div class="coluna">
                        <!--MECANICO AUTOMOTIVO-->
                        <a href="mecanicoautomotivo.php" class="a__card vertical__card__margem">
                            <div class="vertical__card vertical__card__margem">
                                <div class="card__img__card">
                                    <img src="../assets/img/mecanica-mobile.jpg" alt="Mecanico Automotivo">
                                </div>
                                <div class="card__titulo">
                                    <h3>Mecânico Automotivo</h3>
                                </div>
                                <div class="card__descricao">
                                    <p>Diagnosticar problemas em automóveis. Realiza reparos e manutenção em carros e motos. Precisa ser capaz de desmontar o automóvel, reparar e substituir qualquer peça, ajustar e lubrificar o motor de um veículo.</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="coluna">
                        <!--FUNILEIRO-->
                        <a href="funileiro.php" class="a__card vertical__card__margem">
                            <div class="vertical__card vertical__card__margem">
                                <div class="card__img__card">
                                    <img src="../assets/img/funileiro-mobile.jpg" alt="Funileiro">
                                </div>
                                <div class="card__titulo">
                                    <h3>Funileiro</h3>
                                </div>
                                <div class="card__descricao">
                                    <p>Reparo e instalação de peças e elementos em chapas de metal. Fabrica e repara recipientes e elementos de chapas de aço. Atua com recorte, modelagem e trabalho de barras perfiladas de materiais ferrosos e não ferrosos.</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="linha">
                    <div class="coluna">
                        <!--OPERADOR DE INJETORA-->
                        <a href="operadorinjecao.php" class="a__card vertical__card__margem">
                            <div class="vertical__card vertical__card__margem">
                                <div class="card__img__card">
                                    <img src="../assets/img/operadorinjecao-mobile.jpg" alt="Operador de Injetora">
                                </div>
                                <div class="card__titulo">
                                    <h3>Operador de Injetora</h3>
                                </div>
                                <div class="card__descricao">
                                    <p>Manuseia máquina injetora, fazendo os ajustes e regulagem durante o processo. <br> Faz a manutenção preventiva e corretiva, limpeza e conservação das máquinas e equipamentos.</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="coluna">
                        <!--INSTALADOR DE ALARMES-->
                        <a href="instaladoralarme.php" class="a__card vertical__card__margem">
                            <div class="vertical__card vertical__card__margem">
                                <div class="card__img__card">
                                    <img src="../assets/img/instalador-alarme.jpg" alt="Instalador de Alarme">
                                </div>
                                <div class="card__titulo">
                                    <h3>Instalador de Alarmes</h3>
                                </div>
                                <div class="card__descricao">
                                    <p>Atua com instalação e manutenção de alarmes monitorados e CFTV digital. Faz passagem de cabeamento, reparos e faz elaboração de laudos técnicos. <br>⠀</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="linha">
                    <div class="coluna">
                        <!--MECANICO CARRO HIBRIDO-->
                        <a href="mecanicohibrido.php" class="a__card vertical__card__margem">
                            <div class="vertical__card">
                                <div class="card__img__card">
                                    <img src="../assets/img/hibrido.jpg" alt="Carro Hibrido">
                                </div>
                                <div class="card__titulo">
                                    <h3>Mecânico de Carros Híbridos</h3>
                                </div>
                                <div class="card__descricao">
                                    <p>São engenheiros mecânicos com seu conhecimento voltado para carros de técnologia híbrida e na manutenção de carros com esse padrão.</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="coluna">
                        <!--REPARADOR DE CAMBIOS-->
                        <a href="reparadorcambio.php" class="a__card">
                            <div class="vertical__card">
                                <div class="card__img__card">
                                    <img src="../assets/img/reparadorcambio.jpg" alt="Reparador de câmbios">
                                </div>
                                <div class="card__titulo">
                                    <h3>Reparador de câmbios</h3>
                                </div>
                                <div class="card__descricao">
                                    <p>Responsável pela reparação, manutenção e possível troca de câmbios automáticos. <br>⠀ <br>⠀ <br>⠀</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>

    </div>
  </main>

  <?php
  require_once('../assets/components/footer.php');
  ?>


  <script src="../assets/js/carrossel.js"></script>
</body>

</html