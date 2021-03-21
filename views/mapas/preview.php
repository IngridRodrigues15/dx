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
                    <<li class="active"><a href="<?php echo URL;?>mapas">Tabuleiro</a></li>
					<li><a href="<?php echo URL;?>fichas">Fichas</a></li>
                    <li><a href="<?php echo URL;?>perguntas">Perguntas</a></li>
                <?php endif; ?>
			</ul>
		</div>
	</div>  
	<input type="hidden" class="helper" value="mapHelper">
	<input type="hidden" id="map-page" value="preview">
	<div class="row" id="maps-list">
		<div class="col-md-9">
			<div class="painel-container">
				 <div class="titulo text-center">
					<?php
					   echo '<h2>'. $this->mapaDados[0]["nome"].'</h2>';
					?>
					<p>Preview do tabuleiro</p>
				 </div>

				<div class="map-image" id="map-main-image">
					<?php
					 $nomeimg = $this->mapaDados[0]["endereco"];
					 $img = UPLOADSERVER . "/".$nomeimg;
					 //echo '<input id="image-src" type="hidden" data-image="'.$img.'">';
					 echo '<img id="image-src" src="'.$img.'" alt="mapa">';
					?>
				</div>

				<div class="submapa-list hidden">
					<label for="submapa">Submapa</label>
					<select name="submapa" id="submapalist">
						<option value="0">Nenhum</option>
						<?php
							foreach($this->submapaLista as $key => $value) {
							echo '<option value='.$value['id'].'>'.$value["nome"] .'</option>';
							}
						?>
					</select>
				</div>
				
			</div>
		</div>
	</div>
</div>

<div class="back-button">
    <a href="<?php echo URL; ?>mapas/index/" class="back-link">
      <i class="fa fa-arrow-left"></i>
      <span class="back-text">Voltar</span>
    </a>
</div>