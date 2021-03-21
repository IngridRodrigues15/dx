<div class="container">
	<div class="row">
		<div class="col-md-12">
			<ul class="nav nav-tabs">
				<li class="active"><a href="#games-list" class="unique-tab">Jogos</a></li>
			</ul>
		</div>
	</div>   
	<div class="painel" id="games-list">
		<div class="row">
			<div class="col-md-12">
				<input type="hidden" class="helper" value="gameHelper">
				<div class="painel-list">

					<div class="ball-button-box">
						<a class="ball-button createGameIcon" data-toggle="tooltip" title="Clique aqui, para criar um novo jogo">
							<span class="info">Novo Jogo</span>
							<span class="icon"><i class="fa fa-plus"></i></span>
						</a>
					</div>
				
					<form action="<?php echo URL;?>jogos/edit" method="post">
					 <?php 
						echo '<div class="grid">';
						foreach($this->jogoLista as $key => $value) {
							echo '<div class="col-md-3">';
								echo '<div class="grid-item">';
									echo '<input type="hidden" name="jogoid" value='. $value['id'].'>';
									echo '<div class="grid-box">';
										echo '<a class="main-link" data-toggle="tooltip" title="Clique aqui, para editar esse jogo ou inicia-lo" href="'. URL . 'jogos/edit/' . $value['id'].'">';
											$mapa = $this->mapaLista[$value['id']];
											if (!empty($mapa)) {
												$mapa = $mapa[0];
											}
											if (array_key_exists("endereco",$mapa)) {
												$src = $mapa['endereco'];
											}
											if (!empty($src)) {
												 $img = UPLOADSERVER . "/".$src;
											} else {
												$img = URL. "public/images/defaultmap.jpg";
											}
											echo '<img src="'.$img.'">';
											unset($src);
											echo '<a data-toggle="tooltip" title="Iniciar jogo" class="button goStartGame" data-id="'.$value['id'].'">Iniciar</a>';
											echo '<a data-toggle="tooltip" title="Editar jogo" class="button goEditGame primary" data-id="'.$value['id'].'">Editar</a>';
										echo '</a>';
										echo '<div class="grid-box-options">';
											echo "<span>". $value["nome"]. "</span>";
											echo '<a data-toggle="tooltip" title="Alterar o nome desse jogo" class="alterGameNameIcon" data-name="'.$value['nome'].'" data-id="'.$value['id'].'"><i class="fa fa-pencil" aria-hidden="true"></i>Alterar nome</a>';
											echo '<a data-toggle="tooltip" title="Excluir esse jogo" class="delete-jogo" data-id="'.$value['id'].'"><i class="fa fa-trash" aria-hidden="true"></i> Excluir </a>';
										echo '</div>';
									echo '</div>';
								echo '</div>';
							echo '</div>';
						}
						echo '<div>';
					?>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include 'createGameModal.php';?>

<div class="modal fade" id="alterGameNameModal" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Alterar nome do jogo</h4>
			</div>
			<div class="modal-body">
				<div class="gameForm">
					<input type="hidden" id="gameId" name="gameId">
					<label for="gameName">Nome do jogo:</label>
					<input type="text" id="gameName" name="gameName" placeholder="Nome do jogo"><br>
					<button id="alterGameName" class="pull-right" data-dismiss="modal" aria-label="Close">Alterar Nome</button><br/><br/>
				</div>
			</div>
		</div>
	</div>
</div>