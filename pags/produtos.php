<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Produtos</title>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


	<link rel="stylesheet" href="../assets/css/estilos-importantes.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/estilo-produtos.min.css">

	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

	<script type="text/javascript" src="../assets/js/java.js" defer></script>
	<script src="../assets/js/js-bootstrap/bootstrap.bundle.min.js"></script>
	<link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">
</head>

<body>
	<?php
	require_once('../assets/components/header.php');
	?>

	<main>
		<div class="container">
			<div class="row">
				<div class="col">
					<br class="espaco_diferente">
					<br class="espaco_diferente">
					<br class="espaco_diferente">

					<h1 class="pro-produtos">Personalizações</h1>
					<hr>
				</div>
			</div>
			<br>
			<br>
			<br>
			<div class="row">
				<div class="col">

					<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
						<div class="carousel-inner">
							<div class="carousel-item active">
								<div id="card__carroussel__produtos">
									<div id="alturaMaxima__card__carroussel__produtos" class="card mb-3" style="max-width: 1000px; background-color: #D9D9D9; border: none; border-radius: 20px;">
										<div class="row g-0">
											<div class="col-md-4" style="height: 300px; overflow: hidden; display: flex; justify-content: center; align-items: center;">
												<img src="../assets/img/motorCarrossel.svg" class="img-fluid rounded-start" alt="...">
											</div>
											<div class="col-md-8">
												<div class="card-body">
													<h5 class="card-title text-center titulo__card__carroussel_produtos">Motor</h5>
													<p class="card-text">Reformulado: Feito com base no original – que é removido, desmontado, limpo, inspecionado – além de, quando preciso, reparado e testado, sempre de acordo com os procedimentos descritos em seu manual de fábrica.</p>
													<p class="card-text">Remanufaturado: Os motores recebem uma completa mudança se comparado aos originais. O termo remanufatura se refere ao fato dessa ‘reconstrução do motor’ respeitar especificações limitadas conforme o modelo do veículo e não para descrever um motor que possui peças usadas.</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="carousel-item">
								<div id="card__carroussel__produtos">
									<div id="alturaMaxima__card__carroussel__produtos" class="card mb-3" style="max-width: 1000px; background-color: #D9D9D9; border: none; border-radius: 20px;">
										<div class="row g-0">
											<div class="col-md-4" style="height: 300px; overflow: hidden; display: flex; justify-content: center; align-items: center;">
												<img src="../assets/img/pneu-carrossel2.png" class="img-fluid rounded-start" alt="...">
											</div>
											<div class="col-md-8">
												<div class="card-body">
													<h5 class="card-title text-center titulo__card__carroussel_produtos">Pneu</h5>
													<p class="card-text">Pinturas lisas: Vão do branco ao preto, passando por tons de cinza e azul, vermelho ou até o laranja.</p>
													<p class="card-text">Pinturas personalizadas: Efeito de pigmentação, há vários pigmentos que são misturados à cor ou ao verniz que trazem total exclusividade à personalização. Rodas cromadas podem ser personalizadas também.</p>
													<p class="card-text">Pinturas 2 cores: Rodas com bordas de 2 cores.</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="carousel-item">
								<div id="card__carroussel__produtos">
									<div id="alturaMaxima__card__carroussel__produtos" class="card mb-3" style="max-width: 1000px; background-color: #D9D9D9; border: none; border-radius: 20px;">
										<div class="row g-0">
											<div class="col-md-4" style="height: 300px; overflow: hidden; display: flex; justify-content: center; align-items: center;">
												<img src="../assets/img/carroRebaixado-carrossel.svg" class="img-fluid rounded-start" alt="...">
											</div>
											<div class="col-md-8">
												<div class="card-body">
													<h5 class="card-title text-center titulo__card__carroussel_produtos">Rebaixamento</h5>
													<p class="card-text">Estilo Dropped: Estilo mais comum. Instalação de molas esportivas para o rebaixamento.</p>
													<p class="card-text">Slammed: As rodas são alinhadas de forma que entrem realmente para dentro dos para-lamas do veículo e isso independe de qual suspensão será usada.</p>
													<p class="card-text">HellaFlush: Os carros são extremamente baixos e usam rodas bem largas, normalmente com talas que vão de 9.5″ até 13″. Offset baixo, ou até mesmo negativo que dá a visibilidade da roda estar fora dos pára-lamas.</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="carousel-item">
								<div id="card__carroussel__produtos">
									<div id="alturaMaxima__card__carroussel__produtos" class="card mb-3" style="max-width: 1000px; background-color: #D9D9D9; border: none; border-radius: 20px;">
										<div class="row g-0">
											<div class="col-md-4" style="height: 300px; overflow: hidden; display: flex; justify-content: center; align-items: center;">
												<img src="../assets/img/pinturaCarrossel.svg" class="img-fluid rounded-start" alt="...">
											</div>
											<div class="col-md-8">
												<div class="card-body">
													<h5 class="card-title text-center titulo__card__carroussel_produtos">Pintura</h5>
													<p class="card-text">Pintura sólida: Tipo mais básico, contém pigmentos de cor, geralmente nas opções branco, vermelho e preto.</p>
													<p class="card-text">Pintura metálica: Diante da incidência de luz, a pintura apresenta um reflexo mais intenso, aparentemente dando mais vida à cor. Efeito vibrante da tinta utilizada cria a impressão de um veículo mais limpo e brilhante.</p>
													<p class="card-text">Pintura perolizada: Sua base composta por pó de pérola e mica dão a sensação de haver cores diferentes no veículo, dependendo da luz e do ambiente onde se encontra..</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="carousel-item">
								<div id="card__carroussel__produtos">
									<div id="alturaMaxima__card__carroussel__produtos" class="card mb-3" style="max-width: 1000px; background-color: #D9D9D9; border: none; border-radius: 20px;">
										<div class="row g-0">
											<div class="col-md-4" style="height: 300px; overflow: hidden; display: flex; justify-content: center; align-items: center;">
												<img src="../assets/img/modificacoesCarrossel.svg" class="img-fluid rounded-start" alt="...">
											</div>
											<div class="col-md-8">
												<div class="card-body">
													<h5 class="card-title text-center titulo__card__carroussel_produtos">Modificações externas e internas</h5>
													<p class="card-text">Você, cliente TurnMotors, escolhe as modificações externas e internas que deseja fazer em seu veículo.</p>
													Exemplos:
													<ul>

														<li>Aerofólio</li>
														<li>Personalizações nos Bancos</li>
														<li>Caixa de Música</li>
														<li>Vidros</li>
														<li>Combustível</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="carousel-item">
								<div id="card__carroussel__produtos">
									<div id="alturaMaxima__card__carroussel__produtos" class="card mb-3" style="max-width: 1000px; background-color: #D9D9D9; border: none; border-radius: 20px;">
										<div class="row g-0">
											<div class="col-md-4" style="height: 300px; overflow: hidden; display: flex; justify-content: center; align-items: center;">
												<img src="../assets/img/carroAdesivoCarrossel.svg" class="img-fluid rounded-start" alt="...">
											</div>
											<div class="col-md-8">
												<div class="card-body">
													<h5 class="card-title text-center titulo__card__carroussel_produtos">Adesivos</h5>
													<p class="card-text">Se você busca inovar no estilo do seu veículo, mas sem alterar muito, adquira já adesivo. Você, cliente Turn Motors, pode escolher como será o adesivo, com a garantia que o adesivo não poderá estragar a lataria de seu automóvel.</p>

												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
							<span aria-hidden="true"> <img width="30px" src="../assets/img/setaEsquerdaCarrossel.svg" alt=""></span>
							<span class="visually-hidden">Previous</span>
						</button>
						<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
							<span aria-hidden="true"> <img width="30px" src="../assets/img/setaDireitaCarrossel.svg" alt=""></span>
							<span class="visually-hidden">Next</span>
						</button>
					</div>





				</div>


			</div>


			<br>
			<br>


			<br>
			<div class="row">
				<div class="col">
					<h1 class="pro-promo">Promoção</h1>
					<hr class="pro-pro">
				</div>
			</div>
			<br>
			<br>
			<div class="row forte1">
				<div class="col">
					<div class="legal" style="display: flex; justify-content: center;">
						<a class="pro-a" href="merc-cambio.html">
							<div class="pro-card-pro">
								<div class="pro-card1-pro">
									<div class="pro-cima">
										<img style="margin-top: 10px;" width="100px" src="../assets/img/cambio2.png">
									</div>
									<div class="pro-baixo-c">
										<div class="pro-tite">Câmbio Automático</div>
										<div><span class="material-symbols-outlined pro-star">star</span><span class="material-symbols-outlined pro-star">star</span><span class="material-symbols-outlined pro-star">star</span><span class="material-symbols-outlined pro-star">star</span><span class="material-symbols-outlined">star</span></div>
										<div style="display: flex; flex-direction: row;">
											<div style="text-decoration: line-through; color: #6E6E6E;">R$150</div>
											<div style="margin-left: 15px;"><button class="pro-bnt-pro">-14%</button></div>
										</div>
										<div>R$130</div>
									</div style="margin-bottom: 30px;">
								</div>
							</div>
						</a>
					</div>

				</div>
				<div class="col">
					<div class="legal" style="display: flex; justify-content: center;">
						<a class="pro-a" href="merc-palheta.html">
							<div class="pro-card-pro">
								<div class="pro-card1-pro">
									<div class="pro-cima">
										<img style="margin-top: 20px;" width="200px" src="../assets/img/palheta2.svg">
									</div>
									<div class="pro-baixo-p">
										<div class="pro-tite">Palheta</div>
										<div><span class="material-symbols-outlined pro-star">star</span><span class="material-symbols-outlined pro-star">star</span><span class="material-symbols-outlined pro-star">star</span><span class="material-symbols-outlined pro-star">star</span><span class="material-symbols-outlined">star</span></div>
										<div style="display: flex; flex-direction: row;">
											<div style="text-decoration: line-through; color: #6E6E6E;">R$35</div>
											<div style="margin-left: 15px;"><button class="pro-bnt-pro">-29%</button></div>
										</div>
										<div>R$25</div>
									</div>
								</div>
							</div>
						</a>
					</div>
				</div>
				<div class="col">
					<div class="legal" style="display: flex; justify-content: center;">
						<a class="pro-a" href="merc-volante.html">
							<div class="pro-card-pro">
								<div class="pro-card1-pro">
									<div class="pro-cima">
										<img style="margin-top: 20px;" width="140px" src="../assets/img/volante.svg">
									</div>
									<div class="pro-baixo">
										<div class="pro-tite">Volante Personalizado</div>
										<div><span class="material-symbols-outlined pro-star">star</span><span class="material-symbols-outlined pro-star">star</span><span class="material-symbols-outlined pro-star">star</span><span class="material-symbols-outlined pro-star">star</span><span class="material-symbols-outlined">star</span></div>
										<div style="display: flex; flex-direction: row;">
											<div style="text-decoration: line-through; color: #6E6E6E;">R$350</div>
											<div style="margin-left: 15px;"><button class="pro-bnt-pro">-15%</button></div>
										</div>
										<div>R$300</div>
									</div>
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
			<br>

		</div>
		<hr class="pro-linn">
		<div class="container">
			<div class="row">
				<div class="col">
					<h1 class="pro-produtos">Mais vendidos</h1>
				</div>
			</div>
			<hr>
		</div>

		<br>
		<div class="row somedaqui" id="correcao">
			<div class="col"></div>
			<div class="col-6 ">
				<div style=" margin-left: 11.5px;">
					<div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
						<div class="carousel-indicators">
							<button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
							<button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
							<button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
						</div>
						<div class="carousel-inner">
							<div class="carousel-item active" data-bs-interval="10000">
								<a href="merc-pneu-carrossel.html"><img src="../assets/img/pneu-carrossel.png" class="d-block w-100" alt="..."></a>

								<div class="carousel-caption d-none d-md-block">
									<h5>Pneus 300R$</h5>
									<p>Pneus de altissíma qualidade, com material de primeira linha.</p>
								</div>
							</div>
							<div class="carousel-item" data-bs-interval="2000">
								<a href="merc-cambio.html"><img src="../assets/img/cambio-carrossel.png" class="d-block w-100" alt="..."></a>
								<div class="carousel-caption d-none d-md-block">
									<h5>Cambio de 150R$ por 130R$</h5>
									<p>Cambios flexíveis e de facil manuseio.</p>
								</div>
							</div>
							<div class="carousel-item">
								<a href="merc-calota.html"><img src="../assets/img/calota-carrossel.svg" class="d-block w-100" alt="..."></a>
								<div class="carousel-caption d-none d-md-block">
									<h5>Calotas personalizaveís 120R$</h5>
									<p>Calotas brilhosas e relusentes, com personalização disponível.</p>
								</div>
							</div>
						</div>
						<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="visually-hidden">Previous</span>
						</button>
						<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="visually-hidden">Next</span>
						</button>
					</div>
				</div>

			</div>
			<div class="col"></div>
		</div>
		<div class="row somedaqui222" id="correcao">

			<div class="col ">
				<div style=" margin-left: 11.5px;">
					<div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
						<div class="carousel-indicators">
							<button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
							<button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
							<button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
						</div>
						<div class="carousel-inner">
							<div class="carousel-item active" data-bs-interval="10000">
								<a href="merc-pneu-carrossel.html"><img src="../assets/img/pneu-carrossel.png" class="d-block w-100" alt="..."></a>

								<div class="carousel-caption d-none d-md-block">
									<h5>Pneus 300R$</h5>
									<p>Pneus de altissíma qualidade, com material de primeira linha.</p>
								</div>
							</div>
							<div class="carousel-item" data-bs-interval="2000">
								<a href="merc-cambio.html"><img src="../assets/img/cambio-carrossel.png" class="d-block w-100" alt="..."></a>
								<div class="carousel-caption d-none d-md-block">
									<h5>Cambio de 150R$ por 130R$</h5>
									<p>Cambios flexíveis e de facil manuseio.</p>
								</div>
							</div>
							<div class="carousel-item">
								<a href="merc-calota.html"><img src="../assets/img/calota-carrossel.svg" class="d-block w-100" alt="..."></a>
								<div class="carousel-caption d-none d-md-block">
									<h5>Calotas personalizaveís 120R$</h5>
									<p>Calotas brilhosas e relusentes, com personalização disponível.</p>
								</div>
							</div>
						</div>
						<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="visually-hidden">Previous</span>
						</button>
						<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="visually-hidden">Next</span>
						</button>
					</div>
				</div>

			</div>

		</div>
		<div class="container pro-some-pro">
			<div class="row">
				<div class="col">
					<div style="text-align: center; margin-top: 30px;">
						<h3>Pneu 300R$</h3>
						<p>Pneus de altissíma qualidade, com material de primeira linha.</p>
						<button type="button" class="btn btn-danger">Comprar</button>
					</div>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col">
					<div style="text-align: center; margin: 10px 0px;">
						<h3>Cambio de 150R$ por 130R$</h3>
						<p>Cambios flexíveis e de facil manuseio.</p>
						<button type="button" class="btn btn-danger">Comprar</button>
					</div>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col">
					<div style="text-align: center;">
						<h3>Calotas personalizaveís 120R$</h3>
						<p>Calotas brilhosas e relusentes, com personalização disponível.</p>
						<button type="button" class="btn btn-danger">Comprar</button>
					</div>
				</div>
			</div>
		</div>

		<br>
		<br>
		<br>
		<hr class="pro-linn">
		<br>
		<div class="container">
			<div class="row forte">
				<div class="col ">
					<div class="legal" style="display: flex; justify-content: center;">
						<a class="pro-a" href="merc-capasol.html">
							<div class="pro-pro-card1">
								<div class="pro-pro-card2">
									<div class="pro-cima"> <img width="220px" src="../assets/img/capa-sol.svg"> </div>
									<div style="margin-left: 10px">
										<h5>Capa de sol</h5>
										<h5>R$100</h5>
									</div>

								</div>
							</div>
						</a>
					</div>

				</div>
				<div class="col">
					<div class="legal" style="display: flex; justify-content: center;">
						<a class="pro-a" href="merc-oleo.html">
							<div class="pro-pro-card1">
								<div class="pro-pro-card2">
									<div class="pro-cima1"> <img width="120px" src="../assets/img/oleo.svg"> </div>
									<div style="margin-left: 10px; margin-top: 20px;">
										<h5>Óleo de motor</h5>
										<h5>R$40</h5>
									</div>

								</div>
							</div>
						</a>
					</div>

				</div>
				<div class="col">
					<div class="legal" style="display: flex; justify-content: center;">
						<a class="pro-a" href="merc-tapete.html">
							<div class="pro-pro-card1">
								<div class="pro-pro-card2">
									<div class="pro-cima" style="margin-top: 10px"> <img width="170px" src="../assets/img/tapete.svg"> </div>
									<div style="margin-left: 10px; margin-top:10px;">
										<h5>Tapete</h5>
										<h5>R$40,00 (unidade)</h5>
									</div>

								</div>
							</div>
						</a>
					</div>

				</div>
			</div>
			<br>
			<br>
			<div class="row forte">
				<div class="col">
					<div class="legal" style="display: flex; justify-content: center;">
						<a class="pro-a" href="merc-farol.html">
							<div class="pro-pro-card1">
								<div class="pro-pro-card2">
									<div class="pro-cima" style="margin-top: 10px;"> <img width="200px" src="../assets/img/farol.svg"> </div>
									<div style="margin-left: 10px; margin-top: 20px;">
										<h5>Farol</h5>
										<h5>R$300</h5>
									</div>

								</div>
							</div>
						</a>
					</div>

				</div>
				<div class="col">
					<div class="legal" style="display: flex; justify-content: center;">
						<a class="pro-a" href="merc-vela.html">
							<div class="pro-pro-card1">
								<div class="pro-pro-card2">
									<div class="pro-cima"> <img width="230px" src="../assets/img/vela-motor.svg"> </div>
									<div style="margin-left: 10px">
										<h5>Vela de ignição</h5>
										<h5>R$25</h5>
									</div>

								</div>
							</div>
						</a>
					</div>

				</div>
				<div class="col">
					<div style="display: flex; justify-content: center;">
						<a class="pro-a" href="merc-calota.html">
							<div class="pro-pro-card1">
								<div class="pro-pro-card2">
									<div class="pro-cima"> <img width="230px" src="../assets/img/calota2.svg"> </div>
									<div style="margin-left: 10px">
										<h5>Calota</h5>
										<h5>R$120</h5>
									</div>

								</div>
							</div>
						</a>
					</div>
					<div id="action" style="text-align: end;">
						<input class="pro-bnt-ver" type="button" value="Ver Mais">
					</div>
				</div>

			</div>
		</div>
		<br>
		<br>
		<div class="container" id="sumiu">
			<div class="row forte">
				<div class="col ">
					<div class="legal" style="display: flex; justify-content: center;">
						<a class="pro-a" href="merc-remoleo.html">
							<div class="pro-pro-card1">
								<div class="pro-pro-card2">
									<div style="margin-bottom: -20px; margin-top: -25px; transform: rotate(60deg); "> <img width="60px" src="../assets/img/removedor-oleo.svg"> </div>
									<div style="margin-left: 10px">
										<h5>Removedor de Óleo</h5>
										<h5>R$40,00</h5>
									</div>

								</div>
							</div>
						</a>
					</div>

				</div>
				<div class="col">
					<div class="legal" style="display: flex; justify-content: center;">
						<a class="pro-a" href="merc-remgraxa.html">
							<div class="pro-pro-card1">
								<div class="pro-pro-card2">
									<div style="margin-bottom: -40px; margin-top: -30px; transform: rotate(60deg);"> <img width="100px" src="../assets/img/removedor-graxa.svg"> </div>
									<div style="margin-left: 10px; margin-top: 20px;">
										<h5>Removedor de Graxa</h5>
										<h5>R$35,00</h5>
									</div>

								</div>
							</div>
						</a>
					</div>

				</div>
				<div class="col">
					<div class="legal" style="display: flex; justify-content: center;">
						<a class="pro-a" href="merc-pastilha.html">
							<div class="pro-pro-card1">
								<div class="pro-pro-card2">
									<div class="pro-cima" style="margin-top: 10px;"> <img width="230px" src="../assets/img/pastilha-freio.svg"> </div>
									<div style="margin-left: 10px; margin-top:10px;">
										<h5>Pastilha de Freio</h5>
										<h5>R$40,00</h5>
									</div>

								</div>
							</div>
						</a>
					</div>

				</div>
			</div>
			<br>
			<br>
			<div class="row forte">
				<div class="col">
					<div class="legal" style="display: flex; justify-content: center;">
						<a class="pro-a" href="merc-fusível.html">
							<div class="pro-pro-card1">
								<div class="pro-pro-card2">
									<div class="pro-cima" style="margin-top: 10px;"> <img width="160px" src="../assets/img/fusivel.svg"> </div>
									<div style="margin-left: 10px; margin-top: 20px;">
										<h5>Fusível Automotivo</h5>
										<h5>R$1,00 (a unidade)</h5>
									</div>

								</div>
							</div>
						</a>
					</div>

				</div>
				<div class="col">
					<div class="legal" style="display: flex; justify-content: center;">
						<a class="pro-a" href="merc-extintor.html">
							<div class="pro-pro-card1">
								<div class="pro-pro-card2">
									<div class="pro-cima" style="margin-bottom: 10px"> <img width="60px" src="../assets/img/extintor.svg"> </div>
									<div style="margin-left: 10px">
										<h5>Extintor de Incêndio Automotivo</h5>
										<h5>R$90,00</h5>
									</div>

								</div>
							</div>
						</a>
					</div>

				</div>
				<div class="col">
					<div style="display: flex; justify-content: center;">
						<a class="pro-a" href="merc-filtro.html">
							<div class="pro-pro-card1">
								<div class="pro-pro-card2">
									<div class="pro-cima" style="margin-bottom:5px"> <img width="120px" src="../assets/img/filtro-oleo2.svg"> </div>
									<div style="margin-left: 10px">
										<h5>Filtro de óleo</h5>
										<h5>R$30,00</h5>
									</div>

								</div>
							</div>
						</a>
					</div>
					<div style="text-align: end;">
						<input class="pro-bnt-ver" type="button" value="Ver Menos" id="action1">
					</div>
				</div>

			</div>
		</div>

		<hr class="pro-linn">
		<div class="container">
			<div class="row">
				<div class="col">
					<h1 class="pro-promo">Sobre nosso produtos</h1>
					<p class="pro-formatar">Nossa oficina preza por produtos de altíssima qualidade,
						buscando sempre o que está em ascêndencia no mercado, tudo licenciado e atestado, com qualidade assegurado pela Anvisa. Produtos fornecidos e distribuídos pela Giancar Distribuidora Auto Peças.</p>
				</div>
			</div>
			<br>
			<br>
			<div class="row forte">
				<div class="col">
					<div class="legal" style="display: flex; justify-content: center;">
						<div class="pro-aumentar">
							<div class="pro-pro-pro-card1">
								<div class="pro-pro-pro-card2">
									<div style="text-align: center;">
										<div style="font-size: 1.2em; color: #014961; margin-top: 15px; margin-bottom: 30px;">Embalagem e Envio</div>
										<div style="margin-top: 60px;"> <img width="150px" src="../assets/img/entrega.svg"> </div>
										<div style="font-size: 1.1em; color: #014961; margin-top: 50px;">Envio seguro e rápido</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col">
					<div class="legal" style="display: flex; justify-content: center;">
						<div class="pro-aumentar">
							<div class="pro-pro-pro-card1">
								<div class="pro-pro-pro-card2">
									<div style="text-align: center;">
										<div style="font-size: 1.2em; color: #014961; margin-top: 15px; margin-bottom: 30px;">Qualidade das peças</div>
										<div style="margin-bottom: 30px;"> <img width="150px" src="../assets/img/qualidade.png"> </div>
										<div style="font-size: 1.1em; color: #014961">Peças de primeira linha</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col">
					<div class="legal" style="display: flex; justify-content: center;">
						<div class="pro-aumentar">
							<div class="pro-pro-pro-card1">
								<div class="pro-pro-pro-card2">
									<div style="text-align: center;">
										<div style="font-size: 1.2em; color: #014961; margin-top: 15px; margin-bottom: 30px;">Teste e Certificação</div>
										<div style="margin-bottom: 30px;"> <img width="150px" src="../assets/img/produto.svg"> </div>
										<div style="font-size: 1.1em; color: #014961">Selo de aprovação</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col">
					<div class="legal" style="display: flex; justify-content: center;">
						<div class="pro-aumentar">
							<div class="pro-pro-pro-card1">
								<div class="pro-pro-pro-card2">
									<div style="text-align: center;">
										<div style="font-size: 1.2em; color: #014961; margin-top: 15px; margin-bottom: 30px;">Garantia</div>
										<div style="margin-bottom: 30px;"> <img width="150px" src="../assets/img/garantia.png"> </div>
										<div style="font-size: 1.1em; color: #014961">Garantia estendida</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col">
					<div style="display: flex; justify-content: center;">
						<div class="pro-aumentar">
							<div class="pro-pro-pro-card1">
								<div class="pro-pro-pro-card2">
									<div style="text-align: center;">
										<div style="font-size: 1.2em; color: #014961; margin-top: 15px; margin-bottom: 30px;">Atendimento especial</div>
										<div style="margin-bottom: 30px;"> <img width="150px" src="../assets/img/atendimento.png"> </div>
										<div style="font-size: 1.1em; color: #014961">Você se sentirá em casa</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>

	</main>


	<br>
	<br>

	<?php
	require_once('../assets/components/footer.php');
	?>

	<script src="../assets/js/carroussel.js"></script>
	<script src="../assets/js/java1.js" defer></script>
</body>

</html>