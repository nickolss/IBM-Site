<!DOCTYPE html>
<html lang="pt-BR">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Turn Motors | Sobre Nós</title>

      <!--ARQUIVOS BOOTSTRAP-->
      
     
      
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <link rel="stylesheet" href="../assets/css/estilos-importantes.css">
      <link rel="stylesheet" href="../assets/css/sobrenos.min.css">

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
                <h1 class="mainTitle">Sobre Nós</h1>
                <div class="historia">
                    <div class="hist__text">
                        <h2 id="hist__title">História</h2>
                        <p class="paragrafo__hist">Desde que fomos fundados satisfazemos as necessidades dos clientes com os seus veículos de maneira eficiente e com um baixo custo.</p>
                        <p class="paragrafo__hist">A ideia da criação da empresa surgiu com o objetivo de inovar no mercado, trazendo um sistema de negócios com um diferencial, visando um maior dinamismo na personalização do veículos e fazer com que os clientes pudessem expressar melhor sua criatividade e transpor-las sem dificuldades e sem podar suas ideias.</p>
                        <p class="paragrafo__hist">Valorizamos e acreditamos nos funcionários, pois prestam um papel fundamental no desenvolvimento da empresa. E principalmente temos um grande comprometimento com o cliente.
                        </p>
                    </div>
                    <div class="Divhist__img">
                        <img id="hist__img" src="../assets/img/about-hist.png" alt="Homem com carros">
                    </div>
                </div>
                <div class="cards">
                    <div class="card cardMargem">
                        <img class="card__img" src="../assets/img/icone-grupo.svg" alt="Icone grupo de pessoas">
                        <div class="card__content">
                            <p class="card__title">Quem Somos?</p>
                            <p class="card__description">Uma oficina dedicada que busca tornar os carros simples em únicos e especiais, sempre prezando pela satisfação do cliente</p>
                        </div>
                    </div>
                    <div class="card cardMargem">
                        <img class="card__img" src="../assets/img/icone-ferramentas.svg" alt="Icone O que Somos">
                        <div class="card__content">
                            <p class="card__title">O que fazemos?</p>
                            <p class="card__description">Somos uma oficina responsável pela <a class="card__link" href="personalizacoes.php">personalização</a> de carros e <a class="card__link" href="produtos.php">venda</a> de peças.</p>
                        </div>
                    </div>
                    <div class="card" id="card__associar">
                        <img class="card__img" src="../assets/img/icone-redesocial.svg" alt="Icone Rede Social">
                        <div class="card__content">
                            <p class="card__title">Como se comunicar?</p>
                            <p class="card__description">Entre nas nossas redes sociais <a target="_blank" class="card__link" href="https://www.instagram.com/turn_motors/">Instagram</a> ou <a target="_blank" class="card__link" href="https://twitter.com/MotorsTurn">Twitter</a>.</p>
                        </div>
                    </div>
                </div>
                <div class="aspectos">
                    <div class="influ-local">
                        <img class="img__map-bar" src="../assets/img/icone-mapa.svg" alt="Mapa">
                        <h3 class="aspecto__title">Influência Local</h3>
                        <p class="aspecto__paragrafo">Com a Turn Motors perto da sua rua, seu carro sempre teria uma cara mais sua.</p>
                    </div>
                    <div class="representatividade">
                        <img class="img__map-bar" src="../assets/img/icone-barra.svg" alt="Grafico">
                        <h3 class="aspecto__title">Representatividade</h3>
                        <p class="aspecto__paragrafo">Todos podem ter um carro com o estilo único, independente da condição financeira.</p>
                    </div>
                    <div class="influ-regional">
                        <img class="img__map-bar" src="../assets/img/icone-mapa.svg" alt="Mapa">
                        <h3 class="aspecto__title">Influência Regional</h3>
                        <p class="aspecto__paragrafo">Nossa influência exerce o papel de diminuir os custos com automóveis, sem trocá-los.</p>
                    </div>
                </div>
                <div class="cards__aspectos">
                    <div class="visao aspectosMargem">
                        <h3 class="aspecto__title">Visão</h3>
                        <img src="../assets/img/about-visao.png" alt="Mulher Pensando">
                        <p class="cards__paragrafo">Iindependente do ano ou modelo do carro, ele pode ser único e apenas seu.</p>
                    </div>
                    <div class="proposito aspectosMargem">
                        <h3 class="aspecto__title">Propósito</h3>
                        <img src="../assets/img/about-proposito.png" alt="Homem Subindo Montanha">
                        <p class="cards__paragrafo">Tornar carros populares mais únicos e consequentemente mais seus.</p>
                    </div>
                    <div class="valores">
                        <h3 class="aspecto__title">Valores</h3>
                        <img id="img__valores" src="../assets/img/about-valores.png" alt="Pessoas Unidas">
                        <p class="cards__paragrafo">Maior confiança e satisfação dos clientes com seus veículos.</p>
                    </div>
                </div>
            </div>
        </main>

        <?php 
          require_once('../assets/components/footer.php');
        ?>

    </body>
</html
    
