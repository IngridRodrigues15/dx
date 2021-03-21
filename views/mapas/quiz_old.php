<div class="container">
	
	<div class="row">
		<div class="col-md-12">
			<ul class="nav nav-tabs">
				<li class="active"><a>Tabuleiro</a></li>
				<li><a href="<?php echo URL;?>fichas">Fichas</a></li>
				<li><a href="<?php echo URL;?>perguntas">Perguntas</a></li>
			</ul>
		</div>
	</div>  
	
	<input type="hidden" class="helper" value="mapHelper">
	<div class="painel" id="maps-list">
		<div class="row">
			<div class="col-md-12">
				<div class="ball-button-box">
					<a class="ball-button createMapIcon" data-toggle="tooltip" title="Clique aqui, para criar um novo tabuleiro">
						<span class="info">Novo Tabuleiro</span>
						<span class="icon"><i class="fa fa-plus"></i></span>
					</a>
				</div>
			
				<div class="painel-list">
					<p> Selecione um tabuleiro para definir as casas e perguntas que ele terá </p>
					<?php
						echo '<div class="grid">';
						foreach($this->mapaLista as $key => $value) {
							echo '<div class="col-md-3">';
								echo '<div class="grid-item">';
									echo '<div class="grid-box">';
										echo '<a class="main-link" data-toggle="tooltip" title="Clique aqui, para editar as casas desse tabuleiro" href="'. URL . 'mapas/edit/' . $value['id'].'">';
											if (array_key_exists("endereco",$value)) {
												$src = $value['endereco'];
											} else {
												$src;
											}
											if (!empty($src)) {
												 $img = UPLOADSERVER . "/".$src;
												echo '<img src="'.$img.'">';
											}
											echo '<a data-toggle="tooltip" title="Preview" class="button" href="'. URL . 'mapas/preview/' . $value['id'].'" data-id="'.$value['id'].'">Preview</a>';
											echo '<a data-toggle="tooltip" title="Editar tabuleiro"  href="'. URL . 'mapas/edit/' . $value['id'].'" class="button primary" data-id="'.$value['id'].'">Editar</a>';
										echo '</a>';
										echo '<div class="grid-box-options">';
											echo "<span>". $value["nome"]. "</span>";
											echo '<a data-toggle="tooltip" title="Alterar o nome desse tabuleiro" class="alterMapNameIcon" data-name="'.$value['nome'].'" data-id="'.$value['id'].'"><i class="fa fa-pencil" aria-hidden="true"></i>Alterar nome</a>';
											echo '<a data-toggle="tooltip" title="Excluir esse tabuleiro?"  class="delete-mapa" data-id="'.$value['id'].'"><i class="fa fa-trash" aria-hidden="true"></i> Excluir </a>';
											echo '<a data-toggle="tooltip" title="Alterar a imagem do tabuleiro" class="change-image-map" href="'. URL . 'mapas/changeImage/' . $value['id'].'"><i class="fa fa-picture-o"></i>Alterar imagem</a>';

										echo '</div>';
									echo '</div>';
								echo '</div>';
							echo '</div>';
						}
						
						echo '</div>';
					?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include 'createMapModal.php';?>

<div class="modal fade" id="alterMapNameModal" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Alterar nome do mapa</h4>
            </div>
            <div class="modal-body">
                <div class="mapForm">
                    <input type="hidden" id="mapId" name="mapId">
                    <label for="mapName">Nome do mapa</label>
                    <input type="text" id="mapName" name="mapName" placeholder="Nome do mapa"><br/>
                    <button id="alterMapName" data-dismiss="modal" aria-label="Close">Alterar Nome</button><br/><br/>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="back-button">
    <a href="<?php echo URL; ?>jogos/" class="back-link">
      <i class="fa fa-arrow-left"></i>
      <span class="back-text">Voltar</span>
    </a>
</div>