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
        <div class="main__title">
            <h1>Personalizações</h1>
        </div>

        <!--REBAIXAMENTO-->
        <div class="linha__cards">
            <div class="card__subtitle">
                <h2>Rebaixamento</h2>
            </div>
            <div class="cards">
                <div class="card">
                    <a href="agendamentos.php?categoria=rebaixamento-dropped" class="a__card">
                        <div class="card__img">
                            <img class="imagem__card" src="../assets/img/personalizacao-rebaixamento-dropped.png" alt="Estilização Sólida">
                        </div>
                        <div class="card__title">
                            <h3>Estilo Dropped</h3>
                        </div>
                        <div class="card__descricao">
                            <p> Estilo comum. Instalação de molas esportivas para o rebaixamento do veículo.</p>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <a href="agendamentos.php?categoria=rebaixamento-slammed" class="a__card">
                        <div class="card__img">
                            <img class="imagem__card" src="../assets/img/personalizacao-rebaixamento-slammed.png" alt="Estilização Sólida">
                        </div>
                        <div class="card__title">
                            <h3>Estilo Slammed</h3>
                        </div>
                        <div class="card__descricao">
                            <p>Rodas alinhadas de forma que entrem para dentro dos para-lamas do veículo.</p>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <a href="agendamentos.php?categoria=rebaixamento-hellaflush" class="a__card">
                        <div class="card__img">
                            <img class="imagem__card" src="../assets/img/personalizacao-rebaixamento-hellaflush.png" alt="Estilização Duas Cores">
                        </div>
                        <div class="card__title">
                            <h3>HellaFlush</h3>
                        </div>
                        <div class="card__descricao">
                            <p>Os carros são extremamente baixos e usam rodas bem largas. <br> Offset baixo ou negativo.</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!--PINTURA-->
        <div class="linha__cards">
            <div class="card__subtitle">
                <h2>Pintura</h2>
            </div>
            <div class="cards">
                <div class="card">
                    <a href="agendamentos.php?categoria=pintura-solida" class="a__card">
                        <div class="card__img">
                            <img class="imagem__card" src="../assets/img/personalizacao-pintura-solida.png" alt="Estilização Sólida">
                        </div>
                        <div class="card__title">
                            <h3>Sólida</h3>
                        </div>
                        <div class="card__descricao">
                            <p>Tipo mais básico, contém pigmentos de cor, sendo mais opaco.</p>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <a href="agendamentos.php?categoria=pintura-metalica" class="a__card">
                        <div class="card__img">
                            <img class="imagem__card" src="../assets/img/personalizacao-pintura-metalica.png" alt="Estilização Sólida">
                        </div>
                        <div class="card__title">
                            <h3>Metálica</h3>
                        </div>
                        <div class="card__descricao">
                            <p>Pintura apresenta um reflexo mais intenso, dando mais vida à cor.</p>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <a href="agendamentos.php?categoria=pintura-perolizada" class="a__card">
                        <div class="card__img">
                            <img class="imagem__card" src="../assets/img/personalizacao-pintura-perolizada.png" alt="Estilização Sólida">
                        </div>
                        <div class="card__title">
                            <h3>Perolizada</h3>
                        </div>
                        <div class="card__descricao">
                            <p>Sensação de haver diferentes cores no veículo dependendo do ambiente onde se encontra.</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!--PNEU-->
        <div class="linha__cards">
            <div class="card__subtitle">
                <h2>Pneu</h2>
            </div>
            <div class="cards">
                <div class="card">
                    <a href="agendamentos.php?categoria=pneu-solido" class="a__card">
                        <div class="div__card__img__pneu">
                            <img class="card__img__pneu" src="../assets/img/personalizacao-roda-solida-dourado.png" alt="Estilização Sólida">
                        </div>
                        <div class="card__title">
                            <h3>Sólida</h3>
                        </div>
                        <div class="card__descricao">
                            <p>Utilizada uma cor única para toda a roda, tipo de pintura mais básica.</p>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <a href="agendamentos.php?categoria=pneu-personalizado" class="a__card">
                        <div class="div__card__img__pneu">
                            <img class="card__img__pneu" src="../assets/img/personalizacao-roda-perso-azulrosa.png" alt="Estilização Personalizada">
                        </div>
                        <div class="card__title">
                            <h3>Personalizada</h3>
                        </div>
                        <div class="card__descricao">
                            <p>Efeito de pigmentação, há vários pigmentos que são misturados à cor ou ao verniz.</p>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <a href="agendamentos.php?categoria=pneu-duasCores" class="a__card">
                        <div class="div__card__img__pneu">
                            <img class="card__img__pneu" src="../assets/img/personalizacao-roda-duas-pretored.png" alt="Estilização Duas Cores">
                        </div>
                        <div class="card__title">
                            <h3>Duas Cores</h3>
                        </div>
                        <div class="card__descricao">
                            <p>Rodas com bordas de duas cores, possibilitando uma essência mais esportiva.</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!--ADESIVOS-->
        <div class="linha__cards">
            <div class="card__subtitle">
                <h2>Adesivos</h2>
            </div>
            <div class="cards">
                <div class="card">
                    <a href="agendamentos.php?categoria=adesivo-pequeno" class="a__card">
                        <div class="card__img">
                            <img class="imagem__card__adesivo" src="../assets/img/personalizacao-adesivo-pequeno.png" alt="Estilização Sólida">
                        </div>
                        <div class="card__title">
                            <h3>Pequeno</h3>
                        </div>
                        <div class="card__descricao">
                            <p>Adesivos de tamanho pequeno.</p>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <a href="agendamentos.php?categoria=adesivo-medio" class="a__card">
                        <div class="card__img">
                            <img class="imagem__card__adesivo" src="../assets/img/personalizacao-adesivo-medio.png" alt="Estilização Sólida">
                        </div>
                        <div class="card__title">
                            <h3>Médio</h3>
                        </div>
                        <div class="card__descricao">
                            <p>Adesivos de tamanho medio.</p>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <a href="agendamentos.php?categoria=adesivo-grande" class="a__card">
                        <div class="card__img">
                            <img class="imagem__card__adesivo" src="../assets/img/personalizacao-adesivo-grande.png" alt="Estilização Sólida">
                        </div>
                        <div class="card__title">
                            <h3>Grande</h3>
                        </div>
                        <div class="card__descricao">
                            <p>Adesivos de tamanho grande.</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!--MODIFICAÇÕES EXTERNAS-->
        <div class="linha__cards">
            <div class="card__subtitle">
                <h2>Modificações externas</h2>
            </div>
            <div class="cards cards2">
                <div class="card">
                    <a href="agendamentos.php?categoria=aerofolio" class="a__card">
                        <div class="card__img">
                            <img class="imagem__card imagem__card__modificacoes-ex" src="../assets/img/personalizacao-modificacao-aerofolio.png" alt="Estilização Sólida">
                        </div>
                        <div class="card__title">
                            <h3>Aerofólio</h3>
                        </div>
                        <div class="card__descricao">
                            <p>Tem como objetivo aumentar a aderência do veículo à estrada e melhorar seu desempenho.</p>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <a href="agendamentos.php?categoria=insulfilm" class="a__card">
                        <div class="card__img">
                            <img class="imagem__card imagem__card__modificacoes-ex" src="../assets/img/personalizacao-modificacao-vidro.png" alt="Estilização Sólida">
                        </div>
                        <div class="card__title">
                            <h3>Vidros</h3>
                        </div>
                        <div class="card__descricao">
                            <p>Insulfilm diminui o esforço ocular, conserva o interior do carro, fornece maior segurança, etc.</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!--MODIFICAÇÕES INTERNAS-->
        <div class="linha__cards">
            <div class="card__subtitle">
                <h2>Modificações internas</h2>
            </div>
            <div class="cards cards2">
                <div class="card">
                    <a href="agendamentos.php?categoria=caixaDeSom" class="a__card">
                        <div class="card__img">
                            <img class="imagem__card imagem__card__modificacoes-in" id="imagem__card__caixa-som" src="../assets/img/personalizacao-modificacao-caixasom.png" alt="Estilização Sólida">
                        </div>
                        <div class="card__title">
                            <h3>Caixa de Som</h3>
                        </div>
                        <div class="card__descricao">
                            <p>Caixas de som de diversos tamanhos e potências para serem acopladas no seu veículo.</p>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <a href="agendamentos.php?categoria=banco" class="a__card">
                        <div class="card__img">
                            <img class="imagem__card" id="imagem__card__banco" src="../assets/img/personalizacao-modificacao-bancos.png" alt="Estilização Sólida">
                        </div>
                        <div class="card__title">
                            <h3>Bancos</h3>
                        </div>
                        <div class="card__descricao">
                            <p>Bancos personalizados trazem mais sofisticação para seu veículo.</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!--Tunagem-->
        <div class="linha__cards">
            <div class="card__subtitle">
                <h2>Tunagem</h2>
            </div>
            <div class="cards cards2">
                <div class="card">
                    <a href="agendamentos.php?categoria=tunagem-reformulada" class="a__card">
                        <div class="div__card__img__pneu">
                            <img class="imagem__card imagem__card__tunagem" src="../assets/img/personalizacao-motor1.png" alt="Estilização Sólida">
                        </div>
                        <div class="card__title">
                            <h3>Reformulado</h3>
                        </div>
                        <div class="card__descricao">
                            <p>Feito com base no original: É removido, desmontado, limpo, inspecionado, quando preciso, reparado e testado.</p>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <a href="agendamentos.php?categoria=tunagem-remanufaturada" class="a__card">
                        <div class="div__card__img__pneu">
                            <img class="imagem__card" id="imagem__card__tunagem2" src="../assets/img/personalizacao-motor2.png" alt="Estilização Personalizada">
                        </div>
                        <div class="card__title">
                            <h3 id="titulo__card__remanufaturado">Remanufaturado</h3>
                        </div>
                        <div class="card__descricao">
                            <p>Motores têm uma completa mudança se comparado ao original. Respeita as limitações do modelo.</p>
                        </div>
                        
                    </a>
                </div>
            </div>
        </div>
    
  </main> 
  

  <?php
  require_once('../assets/components/footer.php');
  ?>

</body>

</html
