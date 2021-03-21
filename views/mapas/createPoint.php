<div class="modal fade" id="newPointModal" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Adicionar</h4>
			</div>
			<div class="modal-body">
				<div class="pontoForm">
					<label for="nomeponto">Nome:</label>
					<input type="text" id="nomePonto" name="nomeponto" placeholder="Digite o nome"><br/>
					<label for="descponto">Descricao:</label><br>
					<textarea id="descPonto" name="descponto" placeholder="Digite a descrição"></textarea><br/>
					

					<?php if (Session::get('jogotipo') == 1):?>
						 <input type="checkbox" id="disparar_pergunta"> 
						 <label for="disparar_pergunta">Sortear Pergunta</label> 
					<?php endif; ?>

					<?php if (Session::get('jogotipo') == 0):?>
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
					<?php endif; ?>
					<button class="createSpot" data-dismiss="modal" aria-label="Close">Criar</button><br/><br/>
				</div>
			</div>
		</div>
	</div>
</div>