<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Turn Motors | Personalizacoes</title>

  <link rel="stylesheet" href="../assets/css/personalizacoes.min.css">
  <link rel="stylesheet" href="../assets/css/estilos-importantes.css">

  <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">
  <script type="text/javascript" src="../assets/js/java.js" defer></script>
  <script src="../assets/js/js-bootstrap/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body id="container__body">

  <?php
  require_once('../assets/components/header.php');
  ?>

  <main>
    <div class="conteudo__body">

        <div class="main__title">
            <h1>Personalizações</h1>
        </div>

        <!--PERSONALIZAÇÃO REBAIXAMENTO E PINTURA-->
        <div class="tela__media">
            <div class="linha">
                <div class="coluna">
                    <div class="sub__title">
                        <h2>Rebaixamento</h2>
                    </div>
                    <div class="container__card">
                        <div class="card card__maior">
                            <a href="agendamento-dropped.php" class="a__card">
                                <div class="card__img">
                                    <img class="card__img__rebaixamento" src="../assets/img/personalizacao-rebaixamento-dropped.png" alt="Estilização Sólida">
                                </div>
                                <div class="card__titulo">
                                    <h3>Estilo Dropped</h3>
                                </div>
                                <div class="card__descricao">
                                    <p> Estilo comum. Instalação de molas esportivas para o rebaixamento.</p>
                                </div>
                            </a>
                        </div>

                        <div class="card card__maior">
                            <a href="agendamento-slammed.php" class="a__card">
                                <div class="card__img">
                                    <img class="card__img__rebaixamento" src="../assets/img/personalizacao-rebaixamento-slammed.png" alt="Estilização Sólida">
                                </div>
                                <div class="card__titulo">
                                    <h3>Estilo Slammed</h3>
                                </div>
                                <div class="card__descricao">
                                    <p> As rodas são alinhadas de forma que entrem realmente para dentro dos para-lamas do veículo e isso independe de qual suspensão será usada.</p>
                                </div>
                            </a>
                        </div>

                        <div class="card card__maior">
                            <a href="agendamento-hellaflush.php" class="a__card">
                                <div class="card__img">
                                    <img class="card__img__rebaixamento" src="../assets/img/personalizacao-rebaixamento-hellaflush.png" alt="Estilização Duas Cores">
                                </div>
                                <div class="card__titulo">
                                    <h3>HellaFlush</h3>
                                </div>
                                <div class="card__descricao">
                                    <p>Os carros são extremamente baixos e usam rodas bem largas, normalmente com talas que vão de 9.5″ até 13″. <br> Offset baixo, ou até mesmo negativo que dá a visibilidade da roda estar fora dos pára-lamas.</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!--PERSONALIZAÇÃO PINTURA-->
                <div class="coluna segunda__coluna">
                    <div class="sub__title">
                        <h2>Pintura</h2>
                    </div>
                    <div class="container__card">

                        <div class="card card__maior">
                            <a href="agendamento-pintura-solida.php" class="a__card">
                                <div class="card__img">
                                    <img class="card__img__rebaixamento" src="../assets/img/personalizacao-pintura-solida.png" alt="Estilização Sólida">
                                </div>
                                <div class="card__titulo">
                                    <h3>Sólida</h3>
                                </div>
                                <div class="card__descricao">
                                    <p>Tipo mais básico, contém pigmentos de cor, sendo mais opaco.</p>
                                </div>
                            </a>
                        </div>

                        <div class="card card__maior">
                            <a href="agendamento-pintura-metalica.php" class="a__card">
                                <div class="card__img">
                                    <img class="card__img__rebaixamento" src="../assets/img/personalizacao-pintura-metalica.png" alt="Estilização Sólida">
                                </div>
                                <div class="card__titulo">
                                    <h3>Metálica</h3>
                                </div>
                                <div class="card__descricao">
                                    <p>Diante da incidência de luz, a pintura apresenta um reflexo mais intenso, aparentemente dando mais vida à cor. <br> Efeito vibrante da tinta utilizada cria a impressão de um veículo mais limpo e brilhante.</p>
                                </div>
                            </a>
                        </div>

                        <div class="card card__maior">
                            <a href="agendamento-pintura-perolizada.php" class="a__card">
                                <div class="card__img">
                                    <img class="card__img__rebaixamento" src="../assets/img/personalizacao-pintura-perolizada.png" alt="Estilização Sólida">
                                </div>
                                <div class="card__titulo">
                                    <h3>Perolizada</h3>
                                </div>
                                <div class="card__descricao">
                                    <p>Sua base composta por pó de pérola e mica dão a sensação de haver cores diferentes no veículo, dependendo da luz e do ambiente onde se encontra.</p>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>
            </div>

            <!--ESTILO PNEU E ADESIVOS-->
            <div class="linha">
                <div class="coluna">
                    <div class="sub__title">
                        <h2>Pneu</h2>
                    </div>
                    <div class="container__card container__card__pneu">

                        <div class="card card__pneu">
                            <a href="pneu-solido.php" class="a__card">
                                <div class="div__card__img__pneu">
                                    <img class="card__img__pneu" src="../assets/img/personalizacao-roda-solida-dourado.png" alt="Estilização Sólida">
                                </div>
                                <div class="card__titulo">
                                    <h3>Sólida</h3>
                                </div>
                                <div class="card__descricao">
                                    <p>A pintura sólida é utilizado uma cor única para toda a roda, esse tipo de pintura mais básica, possibilita a remoção das ranhuras.</p>
                                </div>
                            </a>
                        </div>

                        <div class="card card__pneu">
                            <a href="pneu-personalizado.php" class="a__card">
                                <div class="div__card__img__pneu">
                                    <img class="card__img__pneu" src="../assets/img/personalizacao-roda-perso-azulrosa.png" alt="Estilização Personalizada">
                                </div>
                                <div class="card__titulo">
                                    <h3>Personalizada</h3>
                                </div>
                                <div class="card__descricao">
                                    <p>Efeito de pigmentação, há vários pigmentos que são misturados à cor ou ao verniz. <br> Rodas cromadas podem ser personalizadas também.</p>
                                </div>
                            </a>
                        </div>

                        <div class="card card__pneu">
                            <a href="pneu-duasCores.php" class="a__card">
                                <div class="div__card__img__pneu">
                                    <img class="card__img__pneu" src="../assets/img/personalizacao-roda-duas-pretored.png" alt="Estilização Duas Cores">
                                </div>
                                <div class="card__titulo">
                                    <h3>Duas Cores</h3>
                                </div>
                                <div class="card__descricao">
                                    <p>Rodas com bordas de duas cores, a fim de possibilitar um ar mais esportivo.</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!--ESTILO ADESIVOS-->
                <div class="coluna segunda__coluna">
                    <div class="sub__title">
                        <h2>Adesivos</h2>
                    </div>
                    <div class="container__card">

                        <div class="card card__maior">
                            <a href="adesivo-pequeno.php" class="a__card">
                                <div class="card__img">
                                    <img class="card__img__rebaixamento" src="../assets/img/personalizacao-adesivo-pequeno.png" alt="Estilização Sólida">
                                </div>
                                <div class="card__titulo">
                                    <h3>Pequeno</h3>
                                </div>
                                <div class="card__descricao card__descricao__aparece">
                                    <p class="card__pagrafo__adesivos">Adesivos de tamanho pequeno. <br>⠀ <br>⠀ <br>⠀ <br>⠀ <br>⠀</p>
                                </div>
                                <div class="card__descricao card__descricao__some">
                                    <p class="card__pagrafo__adesivos">Adesivos de tamanho pequeno.</p>
                                </div>
                            </a>
                        </div>

                        <div class="card card__maior">
                            <a href="adesivo-medio.php" class="a__card">
                                <div class="card__img">
                                    <img class="card__img__rebaixamento" src="../assets/img/personalizacao-adesivo-medio.png" alt="Estilização Sólida">
                                </div>
                                <div class="card__titulo">
                                    <h3>Médio</h3>
                                </div>
                                <div class="card__descricao">
                                    <p class="card__pagrafo__adesivos">Adesivos de tamanho médio.</p>
                                </div>
                            </a>
                        </div>

                        <div class="card card__maior">
                            <a href="adesivo-grande.php" class="a__card">
                                <div class="card__img">
                                    <img class="card__img__rebaixamento" src="../assets/img/personalizacao-adesivo-grande.png" alt="Estilização Duas Cores">
                                </div>
                                <div class="card__titulo">
                                    <h3>Grande</h3>
                                </div>
                                <div class="card__descricao">
                                    <p class="card__pagrafo__adesivos">Adesivos de tamanho grande.</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!--PERSONALIZAÇÃO MODIFICACOES EXTERNAS E INTERNAS-->
            <div class="sub__title">
                <h2>Modificações externas e internas</h2>
            </div>
            <!--TELA GRANDE-->
            <div class="linha modificacao__grande">
                <div class="coluna">
                    <div class="container__card">

                        <div class="card card__modificacao">
                            <a href="aerofolio.php" class="a__card">
                                <div class="card__img">
                                    <img class="card__img__rebaixamento" src="../assets/img/personalizacao-modificacao-aerofolio.png" alt="Estilização Sólida">
                                </div>
                                <div class="card__titulo">
                                    <h3>Aerofólio</h3>
                                </div>
                                <div class="card__descricao">
                                    <p>Aerofólio tem como objetivo aumentar a aderência do veículo à estrada e melhorar seu desempenho.
                                    <br> Projetado para gerar uma força de pressão que pressiona o veículo contra o solo, aumentando a aderência e a estabilidade do veículo.</p>
                                </div>
                            </a>
                        </div>

                        <div class="card card__modificacao">
                            <a href="agendamento-vidro.php" class="a__card">
                                <div class="card__img">
                                    <img class="card__img__rebaixamento" src="../assets/img/personalizacao-modificacao-vidro.png" alt="Estilização Sólida">
                                </div>
                                <div class="card__titulo">
                                    <h3>Vidros</h3>
                                </div>
                                <div class="card__descricao">
                                    <p>Insulfilm diminui o esforço ocular ao dirigir, conserva o interior do carro, fornece uma maior segurança, torna o carro um ambiente agradável e proporciona maior privacidade e segurança.</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="coluna segunda__coluna segunda__coluna__modificacoes">
                    <div class="container__card">

                        <div class="card card__modificacao">
                            <a href="caixaDeSom.php" class="a__card">
                                <div class="card__img card__img__caixasom">
                                    <img id="img__caixasom" class="card__img__rebaixamento" src="../assets/img/personalizacao-modificacao-caixasom.png" alt="Estilização Sólida">
                                </div>
                                <div class="card__titulo">
                                    <h3>Caixa de Som</h3>
                                </div>
                                <div class="card__descricao">
                                    <p>Feito com base no original:
                                       <br> É removido, desmontado, limpo, inspecionado, quando preciso, reparado e testado.
                                       <br> Sempre de acordo com os procedimentos descritos em seu manual de fábrica.</p>
                                </div>
                            </a>
                        </div>

                        <div class="card card__modificacao">
                            <a href="banco.php" class="a__card">
                                <div class="card__img">
                                    <img class="card__img__rebaixamento" src="../assets/img/personalizacao-modificacao-bancos.png" alt="Estilização Sólida">
                                </div>
                                <div class="card__titulo">
                                    <h3>Bancos</h3>
                                </div>
                                <div class="card__descricao">
                                    <p>Os bancos de couro personalizados, trazem ainda mais sofisticação para o seu veículo.
                                       <br> A personalização é feita através de máquinas de costura modernas que personalizam o seu banco através da costura.
                                       <br> ⠀
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!--TELA MEDIA/PEQUENA-->
            <div class="card__modificacoes modificacoes__mediapequena">
                <div class="cards__centralizados">
                    <div class="container__card">

                        <div class="card card__modificacao">
                            <a href="aerofolio.php" class="a__card">
                                <div class="card__img">
                                    <img class="card__img__rebaixamento card__img__modificacoes" src="../assets/img/personalizacao-modificacao-aerofolio.png" alt="Aerofólio">
                                </div>
                                <div class="card__titulo">
                                    <h3>Aerofólio</h3>
                                </div>
                                <div class="card__descricao">
                                    <p>Aerofólio tem como objetivo aumentar a aderência do veículo à estrada e melhorar seu desempenho. <br> Projetado para gerar uma força de pressão que pressiona o veículo contra o solo, aumentando a aderência e a estabilidade do veículo.</p>
                                </div>
                            </a>
                        </div>

                        <div class="card card__modificacao">
                            <a href="agendamento-vidro.php" class="a__card">
                                <div class="div__card__img__rebaixamento">
                                    <img class="card__img__rebaixamento" src="../assets/img/personalizacao-modificacao-vidro.png" alt="Estilização Personalizada">
                                </div>
                                <div class="card__titulo">
                                    <h3>Vidros</h3>
                                </div>
                                <div class="card__descricao">
                                    <p>Insulfilm diminui o esforço ocular ao dirigir, conserva o interior do carro, fornece uma maior segurança, torna o carro um ambiente agradável e proporciona maior privacidade e segurança.</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="cards__centralizados segunda__coluna__modificacoes">
                    <div class="container__card">

                        <div class="card card__modificacao">
                            <a href="caixaDeSom.php" class="a__card">
                                <div class="div__card__img__pneu">
                                    <img class="card__img__pneu" src="../assets/img/personalizacao-modificacao-caixasom.png" alt="Estilização Sólida">
                                </div>
                                <div class="card__titulo">
                                    <h3>Caixa de Som</h3>
                                </div>
                                <div class="card__descricao">
                                    <p>Feito com base no original: <br> É removido, desmontado, limpo, inspecionado, quando preciso, reparado e testado. <br> Sempre de acordo com os procedimentos descritos em seu manual de fábrica.
                                    </p>
                                </div>
                            </a>
                        </div>

                        <div class="card card__modificacao">
                            <a href="banco.php" class="a__card">
                                <div class="div__card__img__pneu">
                                    <img class="card__img__pneu" src="../assets/img/personalizacao-modificacao-bancos.png" alt="Estilização Personalizada">
                                </div>
                                <div class="card__titulo">
                                    <h3>Bancos</h3>
                                </div>
                                <div class="card__descricao">
                                    <p>Os bancos de couro personalizados, trazem ainda mais sofisticação para o seu veículo. <br> A personalização é feita através de máquinas de costura modernas que personalizam o seu banco através da costura.</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!--PERSONALIZAÇÃO TUNAGEM-->
            <div class="sub__title">
                <h2>Tunagem</h2>
            </div>
            <div class="cards__centralizados">
                <div class="container__card">

                    <div class="card">
                        <a href="agendamento-reformulado.php" class="a__card">
                            <div class="div__card__img__pneu">
                                <img class="card__img__pneu" src="../assets/img/personalizacao-motor1.png" alt="Estilização Sólida">
                            </div>
                            <div class="card__titulo">
                                <h3>Reformulado</h3>
                            </div>
                            <div class="card__descricao">
                                <p>Feito com base no original: <br> É removido, desmontado, limpo, inspecionado, quando preciso, reparado e testado. <br> Sempre de acordo com os procedimentos descritos em seu manual de fábrica.
                                </p>
                            </div>
                        </a>
                    </div>

                    <div class="card">
                        <a href="agendamento-remanufaturado.php" class="a__card">
                            <div class="div__card__img__pneu">
                                <img class="card__img__pneu" src="../assets/img/personalizacao-motor2.png" alt="Estilização Personalizada">
                            </div>
                            <div class="card__titulo">
                                <h3>Remanufaturado</h3>
                            </div>
                            <div class="card__descricao">
                                <p>Os motores recebem uma completa mudança se comparado aos originais. <br> O termo remanufatura se refere ao fato dessa "reconstrução do motor" respeitar especificações limitadas conforme o modelo do veículo e não para descrever um motor que possui peças usadas.</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <br>
  </main> 
  <br>

  <?php
  require_once('../assets/components/footer.php');
  ?>

</body>

</html
