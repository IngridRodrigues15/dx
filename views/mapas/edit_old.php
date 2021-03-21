<div class="container">
	<div class="row">
		<div class="col-md-12">
			<ul class="nav nav-tabs">
				 <?php if (Session::get('jogotipo') == 0):?>
                    <li class="active"><a href="<?php echo URL;?>mapas">Mapas</a></li>
					<li><a href="<?php echo URL;?>fichas">Fichas</a></li>
                    <li><a href="<?php echo URL;?>dados/index">Dados</a></li>
                <?php endif; ?>
                <?php if (Session::get('jogotipo') == 1):?>
                    <li class="active"><a href="<?php echo URL;?>mapas">Tabuleiro</a></li>
					<li><a href="<?php echo URL;?>fichas">Fichas</a></li>
                    <li><a href="<?php echo URL;?>perguntas">Perguntas</a></li>
                <?php endif; ?>
			</ul>
		</div>
	</div>
	<input type="hidden" class="helper" value="mapEditHelper">
	<input type="hidden" id="map-page" value="edit">
	<div class="row" id="maps-list">
		<div class="col-md-12">
			<div class="painel-container">
				<div class="col-md-9">
					<div class="titulo text-center">
						<?php
						   echo '<h2 class="map-title">'. $this->mapaDados[0]["nome"].'</h2>';
						?>
						<?php if (Session::get('jogotipo') == 1):?>
							<p>Clique na imagem para selecionar as casas do tabuleiro !</p>
						<?php endif; ?>
						<?php if (Session::get('jogotipo') == 0):?>
							<p>Clique na imagem para criar pontos no mapa !</p>
						<?php endif; ?>
					</div>

					<div class="map-image" id="map-main-image">
						<?php
						 $nomeimg = $this->mapaDados[0]["endereco"];
						 $img = UPLOADSERVER . "/".$nomeimg;
						 echo '<img id="image-src" src="'.$img.'" alt="mapa">';
						?>
					</div>
				</div>

				<div class="col-md-3">
					<div class="painel-options">
						<div class="ball-button-box hidden saveMap">
							<a class="ball-button" id="" data-toggle="tooltip" title="Clique aqui, para salvar o tabuleiro">
								<span class="info">Salvar Tabuleiro</span>
								<span class="icon"><i class="fa fa-floppy-o"></i></span>
							</a>
						</div>
						<div class="sortable-box">
							<p>Defina abaixo a ordem de movimentação das casas</p>
							<ul id="sortable"></ul>
						</div>
					</div>
				</div> 
			</div>
		</div>
	</div>
</div>


<?php include 'createPoint.php';?>
<?php include 'alterPoint.php';?>

<div class="back-button">
    <a href="<?php echo URL; ?>mapas/index/" class="back-link">
      <i class="fa fa-arrow-left"></i>
      <span class="back-text">Voltar</span>
    </a>
</div>