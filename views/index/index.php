
<link rel="stylesheet" href="<?php echo URL; ?>public/css/home.css" /> 

<div class="margin-20"></div>
<section class="sec-white">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-10 col-sm-offset-1">
				<h2 class="text-center btm-12">
	              Uma ferramenta para criar jogos de tabuleiro para usar em sala de aula com seus alunos
	            </h2>
	        </div>
	   	</div>
	</div>
</section>

<section class="sec-white">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="h2 text-center btm-12">Criar</div>
			</div>
			<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
				<p class="text-center mobile-copy-btm">É possível criar jogos de tabuleiro, baseado em fichas personalizadas,tabuleiros com casas customizadas e perguntas definifidas pelo professor </p>
			</div>
			<div class="margin-20"></div>
			<section class="sec-tabs">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 hidden-xs">
							<ul class="nav ico-pills nav-justified">
								<li class="active">
									<a class="btn-responsive tab-start" data-toggle="pill" href="#card" data-element-type="tab">
										<i class="fa fa-file-text-o" aria-hidden="true"></i>Fichas 
									</a>
								</li>
								<li class="">
									<a class="btn-responsive tab-middle" data-toggle="pill" href="#map" data-object="logged_element" data-element-type="tab">
										<i class="fa fa-map-o" aria-hidden="true"></i>Tabuleiros
									</a>
								</li>
								<li class="">
									<a class="btn-responsive tab-middle" data-toggle="pill" href="#question" data-element-type="tab">
										<i class="fa fa-question-circle-o" aria-hidden="true"></i>Perguntas
									</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="margin-20"></div>
					<div class="row">
						<div class="col-xs-12">
							<div class="tab-content">
								<div class="tab-pane active" id="card" role="tabpanel">
									<div class="col-xs-6">
										<?php $img = URL. "public/images/ficha.png";
											echo '<img class="img-responsive shadow-md mobile-img-btm" src="'.$img.'">';
										 ?>
									</div>
									<div class="col-xs-6 text-center">
										<div class="h3 semibold btm-12">Informações do aluno</div>
										<p class="btm-30">Crie campos dinamicos, que o aluno preencherá antes do jogo. Possibilitando ter todas as informações  do aluno em um unico lugar</p>
									</div>
								</div>
								<div class="tab-pane" id="map" role="tabpanel">
									<div class="col-xs-6">
										<?php $img = URL. "public/images/mapImage.png";
											echo '<img class="img-responsive shadow-md mobile-img-btm" src="'.$img.'">';
										 ?>
									</div>
									<div class="col-xs-6 text-center">
										<div class="h3 semibold btm-12">Tabuleiro customizado</div>
										<p class="btm-30">Qualquer imagem pode virar um tabuleiro, basta fazer o upload da imagem. Além disso qualquer parte da imagem pode ser uma casa do tabuleiro com sorteio de perguntas, sendo muito util para mapas.</p>
									</div>
								</div>
								<div class="tab-pane" id="question" role="tabpanel">
									<div class="col-xs-6">
										<?php $img = URL. "public/images/question.jpg";
											echo '<img class="img-responsive shadow-md mobile-img-btm" src="'.$img.'">';
										 ?>
									</div>
									<div class="col-xs-6 text-center">
										<div class="h3 semibold btm-12">Perguntas e respostas</div>
										<p class="btm-30">É possível criar perguntas de multipla escolha, e definir suas respostas, recomendamos o uso de perguntas de vestibular</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</section>


<section class="sec-white">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="h2 text-center btm-12">Jogar</div>
			</div>
			<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
				<p class="text-center mobile-copy-btm"> Todos jogando juntos ao mesmo tempo, com relatorio customizado para o professor em tempo real</p>
			</div>
			<div class="margin-20"></div>
			<section class="sec-tabs">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 hidden-xs">
							<ul class="nav ico-pills nav-justified">
								<li class="active">
									<a class="btn-responsive tab-start" data-toggle="pill" href="#card-student" data-element-type="tab">
										<i class="fa fa-file-text-o" aria-hidden="true"></i>Ficha 
									</a>
								</li>
								<li class="">
									<a class="btn-responsive tab-middle" data-toggle="pill" href="#map-student" data-object="logged_element" data-element-type="tab">
										<i class="fa fa-map-o" aria-hidden="true"></i>Tabuleiros
									</a>
								</li>
								<li class="">
									<a class="btn-responsive tab-middle" data-toggle="pill" href="#report" data-element-type="tab">
										<i class="fa fa-question-circle-o" aria-hidden="true"></i>Relatorio
									</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="margin-20"></div>
					<div class="row">
						<div class="col-xs-12">
							<div class="tab-content">
								<div class="tab-pane active" id="card-student" role="tabpanel">
									<div class="col-xs-6">
										<?php $img = URL. "public/images/ficha-aluno.png";
											echo '<img class="img-responsive shadow-md mobile-img-btm" src="'.$img.'">';
										 ?>
									</div>
									<div class="col-xs-6 text-center">
										<div class="h3 semibold btm-12">Informações do aluno</div>
										<p class="btm-30">Para começar é necessario preencher as informações previamente escolhidas pelo professor. Fique tranquilo apenas o professor tem acesso a essas informações</p>
									</div>
								</div>
								<div class="tab-pane" id="map-student" role="tabpanel">
									<div class="col-xs-6">
										<?php $img = URL. "public/images/mapa-aluno.png";
											echo '<img class="img-responsive shadow-md mobile-img-btm" src="'.$img.'">';
										 ?>
									</div>
									<div class="col-xs-6 text-center">
										<div class="h3 semibold btm-12">Tabuleiro customizado</div>
										<p class="btm-30">Você começará o jogo na primeira casa do tabuleiro, assim que girar o dados será sorteado uma pergunta, ao acertar voçê avançará a quantidade de casas do dado.</p>
									</div>
								</div>
								<div class="tab-pane" id="report" role="tabpanel">
									<div class="col-xs-6">
										<?php $img = URL. "public/images/relatorio.png";
											echo '<img class="img-responsive shadow-md mobile-img-btm" src="'.$img.'">';
										 ?>
									</div>
									<div class="col-xs-6 text-center">
										<div class="h3 semibold btm-12">Perguntas Respondidas</div>
										<p class="btm-30">A qualquer momento é possível ver os alunos que jogaram, a quantidade de perguntas que cada um teve, seus acertos e a lista de perguntas em si</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</section>

<section class="sec-white">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="h2 text-center btm-12">Primeiramente ... </div>
			</div>
			<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 text-center">
				<p class="text-center mobile-copy-btm"> Antes de começar o jogo, você poderia responder um questionario bem rapidinho ?</p>
				 <a class="button btn text-center" href="https://goo.gl/forms/bxpe4mRhPys9ScBi1">Questionário</a> 
			</div>
		</div>
	</div>
</section>


<section class="sec-white">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="h2 text-center btm-12">Pronto para começar?</div>
			</div>
			<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 text-center">
				<p class="text-center mobile-copy-btm"> Basta cadastrar-se e criar seu primeiro jogo</p>
				 <a class="button btn text-center" href="<?php echo URL;?>login">Começar agora</a> 
				
			</div>
		</div>
	</div>
</section>