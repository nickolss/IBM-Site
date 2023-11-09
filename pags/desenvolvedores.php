<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Turn Motors | Meu perfil</title>

	<!-- Arquivos do Bootstrap -->
	<link rel="stylesheet" href="../assets/css/css-bootstrap/bootstrap.min.css">
	<script src="../assets/js/js-bootstrap/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../assets/css/desenvolvedores.css">
	<link rel="stylesheet" href="../assets/css/estilos-importantes.css" />
	<link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
	<?php
	require_once('../assets/components/header.php');
	?>
    <main class="principal text-center">
        <br>
        <div class="container">
            <div class="row">
                <div class="col div__titulos">
                    <p class="equipe2023-title" >Nossa equipe de Programação</p>
                    <p class="fs-4 subtitle-equipe2023">Turn Motors possui um time capacitado de desenvolvedores com o objetivo de oferecer a melhor interatividade e entendimento aos seus usuários. Abrangendo todas as áreas de linguagem de programação para que nossos usuários saiam com suas expectativas realizadas e seu pedido realizado dentro do conforto de seu lar.</p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col equipe">
                    <img src="../assets/img/pedro.jpg" class="img__desenvolvedores" alt="Especialista em Design Turn Motors">
                    <div class="informacoes">
                        <h3 class="informacoes__cargo">Desenvolvedor Front-end</h3>
                        <h2 class="informacoes__nome">Pedro Fernandes</h2>
                        <p class="informacoes__carreira">Especialista em Front-End, Administrador das Mídias Sociais e Designer</p>
                    </div>
                </div>
                <div class="col equipe">
                    <img src="../assets/img/nickolas.jpg" class="img__desenvolvedores" alt="Administrador do banco de dados e Especialista em PHP Turn Motors">
                    <div class="informacoes">
                        <h3 class="informacoes__cargo">Desenvolvedor Back-end</h3>
                        <h2 class="informacoes__nome">Nickolas Maia</h2>
                        <p class="informacoes__carreira">DBA (Administrador do banco de dados)</p>
                    </div>
                </div>
                <div class="col equipe">
                    <img src="../assets/img/vini.jpg" class="img__desenvolvedores" alt="Especialista em JavaScript Turn Motors">
                    <div class="informacoes">
                        <h3 class="informacoes__cargo">Desenvolvedor Back-end</h3>
                        <h2 class="informacoes__nome">Vinicius Valero</h2>
                        <p class="informacoes__carreira">Especializado em JavaScript</p>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col equipe">
                    <img src="../assets/img/tiago.jpg" class="img__desenvolvedores" alt="Especialista em Front-end Turn Motors">
                    <div class="informacoes">
                        <h3 class="informacoes__cargo">Desenvolvedor Back-end</h3>
                        <h2 class="informacoes__nome">Thiago Bryan</h2>
                        <p class="informacoes__carreira">Especialista em PHP (Hypertext Preprocessor)</p>
                    </div>
                </div>
                <div class="col equipe">
                    <img src="../assets/img/miguel.jpg" class="img__desenvolvedores" alt="Tester Turn Motors">
                    <div class="informacoes">
                        <h3 class="informacoes__cargo">Desenvolvedor Front-end</h3>
                        <h2 class="informacoes__nome">Miguel Gustavo</h2>
                        <p class="informacoes__carreira">Especialista em CSS (Cascading Style Sheets)</p>
                    </div>
                </div>
            </div>
        </div>
    </main>    
    <?php
	require_once('../assets/components/footer.php');
	?>
</body>
