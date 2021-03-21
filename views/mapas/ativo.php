 

	<input type="hidden" id="map-page" value="preview">
	<div class="row" id="maps-list">
		<div class="painel-container active">
			<div class="titulo active text-center">
				<?php
					if (!empty($this->map[0])) {
						echo '<h2>'. $this->map[0]["nome"].'</h2>';
					}
				?>
			</div>

			<div class="map-image active" id="map-main-image">
					<?php
					if (empty($this->map[0])) { 
						echo '<p>Ops! Não há nenhum tabuleiro para esse jogo</p>';
					} else {
						$nomeimg = $this->map[0]["endereco"];
						$img = UPLOADSERVER . "/".$nomeimg;
						echo '<img id="image-src" src="'.$img.'" alt="mapa">';
					}
					?>
			</div>

				
			<div class="submapa-list hidden">
				<label for="submapa">Submapa</label>
				<select name="submapa" id="submapalist">
				<option value="0">Nenhum</option>
					<?php
						/*foreach($this->submapaLista as $key => $value) {
						echo '<option value='.$value['id'].'>'.$value["nome"] .'</option>';
						}*/
					?>
				</select>
			</div>		
		</div>
	</div>
