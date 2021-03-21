<div class="modal fade" id="alterPointModal" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Alterar ponto ao mapa</h4>
			</div>
			<div class="modal-body">
				<div class="pontoForm">
					<label for="nomeponto">Nome</label><br/>
					<input type="text" id="nomePonto" name="nomeponto" placeholder="Nome do Ponto"><br/>
					<label for="descponto">Descricao</label><br/>
					<textarea id="descPonto" name="descponto" placeholder="Descrição do Ponto"></textarea>
					<div class="submapa-list">
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
					<button class="alterSpot" data-dismiss="modal" aria-label="Close">Alterar Ponto</button><br/><br/>
				</div>
			</div>
		</div>
	</div>
</div>