<div class="container">
	
	<div class="row">
		<div class="col-md-12">
			<ul class="nav nav-tabs">
				<li class="active"><a href="#maps-list">Mapas</a></li>
				<li><a href="<?php echo URL;?>fichas">Fichas</a></li>
				<li><a href="<?php echo URL;?>dados">Dados</a></li>
				<li><a href="<?php echo URL;?>perguntas">Perguntas</a></li>
			</ul>
		</div>
	</div>  
	
	<input type="hidden" class="helper" value="mapHelper">
	<div class="painel" id="maps-list">
		<div class="row">
			<div class="col-md-12">
				<div class="default-map">
					<div class="dropdown">
						<button class="btn btn-secondary dropdown-toggle" type="button" id="default-map-select" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<span id="default-map-text">Definir mapa principal do jogo</span> <span class="fa fa-caret-down"></span>
						</button>
						<div class="dropdown-menu dropdown-menu-map" aria-labelledby="default-map-select">
							<?php
								foreach($this->mapaLista as $key => $value) {
								echo '<a class="dropdown-item dropdown-item-map" data-value='.$value['id'].' data-default='.$value['principal'].'>'.$value["nome"] .'</a>';
								}
							?>
						</div>
					</div>
				</div>
				<div class="new-map">
					<form action="<?php echo URL;?>mapas/create" method="post">
						<input type="text" name="nomeMapa" placeholder="Digite o nome do novo mapa">
						<button type="submit" >Criar</button>
					</form>
				</div>
				<div class="painel-list">
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
											echo "<span>". $value["nome"]. "</span>";
											echo '<a data-toggle="tooltip" title="Preview" class="button" href="'. URL . 'mapas/preview/' . $value['id'].'" data-id="'.$value['id'].'">Preview</a>';
											echo '<a data-toggle="tooltip" title="Editar tabuleiro"  href="'. URL . 'mapas/edit/' . $value['id'].'" class="button primary" data-id="'.$value['id'].'">Editar</a>';
										echo '</a>';
										echo '<div class="grid-box-options">';
											echo "<span>". $value["nome"]. "</span>";
											echo '<a data-toggle="tooltip" title="Alterar o nome desse jogo" class="alterGameNameIcon" data-name="'.$value['nome'].'" data-id="'.$value['id'].'"><i class="fa fa-pencil" aria-hidden="true"></i>Alterar nome</a>';
											echo '<a data-toggle="tooltip" title="Excluir esse jogo" class="delete-jogo" data-id="'.$value['id'].'"><i class="fa fa-trash" aria-hidden="true"></i> Excluir </a>';

											/*echo '<a class="change-image-map" href="'. URL . 'mapas/changeImage/' . $value['id'].'"><i class="fa fa-picture-o"></i></a>';
											echo '<a class="editar-mapa-icone" href="'. URL . 'mapas/edit/' . $value['id'].'"><i class="fa fa-map-marker" aria-hidden="true"></i></a>';
											echo '<a class="alterMapNameIcon" data-name="'.$value['nome'].'" data-id="'.$value['id'].'"><i class="fa fa-pencil" aria-hidden="true"></i></a>';
											echo '<a class="preview-map" href="'. URL . 'mapas/preview/' . $value['id'].'"><i class="fa fa-eye"></i></a>';
											echo '<a class="delete-mapa" data-id="'.$value['id'].'"><i class="fa fa-trash"></i></a>';*/
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
