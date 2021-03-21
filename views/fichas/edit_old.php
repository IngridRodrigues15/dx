<div class="container">
	
	<div class="row">
		<div class="col-md-12">
			<ul class="nav nav-tabs">

				<li class="active"><a href="<?php echo URL;?>fichas/index">Fichas</a></li>
				<?php if (Session::get('jogotipo') == 0):?>
					<li><a href="<?php echo URL;?>mapas/index"> Mapas</a></li>
					<li><a href="<?php echo URL;?>dados/index">Dados</a></li>
				<?php endif; ?>
				<?php if (Session::get('jogotipo') == 1):?>
					<li><a href="<?php echo URL;?>mapas/index"> Tabuleiro</a></li>
					<li><a href="<?php echo URL;?>perguntas">Perguntas</a></li>
				<?php endif; ?>
			</ul>
		</div>
	</div> 
	<div class="row">
		<div class="col-md-12">
			<div class="painel-container">
				<div class="ball-button-box" id="show-new-field-form">
					<a class="ball-button" data-toggle="tooltip" title="Clique aqui, para criar um novo campo para a ficha">
						<span class="info">Novo Campo</span>
						<span class="icon"><i class="fa fa-plus"></i></span>
					</a>
				</div>
				<div class="ball-button-option hide">
					<div class="campoTextoForm">
						<label for="nomecampo">Nome: </label>
						<input type="text" class="campo" id="nomeCampo" name="nomecampo" placeholder="Nome do Campo"></br>
						<label for="type">Tipo de campo: </label></br>
							<input type="radio" name="type" value="text" id="campo-text"> <label for="campo-text">Texto</label><br>
							<input type="radio" name="type" value="number" id="campo-number"> <label for="campo-number">Numerico</label><br>
						<button class="novoCampo">Criar Campo</button>
					</div>
				</div>

				<div class="ball-button-box hidden" id="salvarCamposFicha">
					<a class="ball-button" id="" data-toggle="tooltip" title="Clique aqui, para salvar a ficha">
						<span class="info">Salvar Ficha</span>
						<span class="icon"><i class="fa fa-floppy-o"></i></span>
					</a>
				</div>

				<input type="hidden" class="helper" value="cardHelper">
				<div class="col-md-9">	
					<div class="card-background">
						<div class="ficha-container">
							 <div class="titulo text-center">
								<?php
								echo '<h2>'. $this->fichaDados[0]["nome"] .'</h2>';
								?>
							</div>
							<div class="campos" id="cardSortable">
							<?php
								foreach($this->campos as $key => $value) {
									if( $value['tipo'] == "s" ){
										echo '<div class="field-sortable delete '.$value['nome'].'" data-order="'.$value['ordem'].'">';
										echo $value['nome'];
										echo '<input type="text" disabled>'
										. '<input class="hidden campodinamico" data-type="string" value="'.$value['nome'].'" data-redit="'.$value['redit'].'" data-medit="'.$value['medit'].'" data-jedit="'.$value['jedit'].'">'
										.'<button class="delete-btn"><i class="fa fa-trash-o" aria-hidden="true"></i></button>'
										.'<button class="edit-btn"><i class="fa fa-pencil" aria-hidden="true"></i></button>';
										echo '</div>';

									}
									 if( $value['tipo'] == "n" ){
										echo '<div class="field-sortable delete '.$value['nome'].'" data-order="'.$value['ordem'].'">';
										echo $value['nome'];
										echo '<button type="submit" name="diminui" disabled>-</button>'
											 . '0'
											 . '<button type="submit" name="aumenta" disabled>+</button>'
											 . '<input class="hidden campodinamico" data-type="numeric" value="'.$value['nome'].'"data-redit="'.$value['redit'].'" data-medit="'.$value['medit'].'" data-jedit="'.$value['jedit'].'">'
											 .'<button class="delete-btn"><i class="fa fa-trash-o" aria-hidden="true"></i></button>'
											 .'<button class="edit-btn"><i class="fa fa-pencil" aria-hidden="true"></i></button>';
										echo '</div>';
									}
								}
							?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>


<div class="back-button">
	<a href="<?php echo URL; ?>fichas/index/" class="back-link">
	  <i class="fa fa-arrow-left"></i>
	  <span class="back-text">Voltar</span>
	</a>
</div>