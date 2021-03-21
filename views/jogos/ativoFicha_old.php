<link rel="stylesheet" href="<?php echo URL; ?>public/css/jogo-ativo.css" /> 

<script type="text/javascript" src="<?php echo URL; ?>public/js/ws.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>public/js/map-move.js"></script>


<div class="container">
	 <input type="hidden" class="helper" value="activeGameHelper">

	<?php 
		echo "<input type='hidden' id='gameId' value='".Session::get('jogoid')."'>";
		echo "<input type='hidden' id='userName' value='".Session::get('login')."'>";
		echo "<input type='hidden' id='userId' value='".Session::get('userid')."'>";
	?>
	<div class="connectionBox">
		<div class="status">Offline</div>
		<div class="msgs"></div>
		<div class="users"></div>
	</div>

	<div class="row">
		<ul class="nav nav-tabs margin-correction">
			<li class="active"><a href="#games-list" class="unique-tab">Jogos</a></li>
		</ul>
	</div> 
	<input type="hidden" id="game-page" value="active">
	<div class="painel active">
		
			<?php 
				if (Session::get('userType') == 1): 
					echo '	
						<div class="row">
							<div class="col-md-offset-2 col-md-8 col-xs-12">';
								include DIR.'/jogos/report.php
					';
					echo '
							</div>
						</div>
						<div class="row">
							<div class="col-md-offset-2 col-md-8 col-xs-12">
								<div class="painel-mapa-dado">
								 	<input type="hidden" id="diceNumber" value="">';
								 	include DIR.'/mapas/ativo.php';
								 	include DIR.'/dados/ativo.php';
					echo'		</div>
							</div>
						</div>';
				endif; 
			 	if (Session::get('userType') == 0):
			 		echo '
						<div class="row hidden" id="ativo-tabuleiro">
							<div class="col-md-11 col-xs-10">
								<div class="painel-mapa-dado">
								 	<input type="hidden" id="diceNumber" value="">';
								 	include DIR.'/mapas/ativo.php';
								 	include DIR.'/dados/ativo.php';
					echo'		
								</div>
							</div>
							<div class="col-md-1 col-xs-2">
								<button class="btn btn- ball-button" id="show-card" legenda="Ficha"><i class="fa fa-file-text-o" aria-hidden="true"></i></button>
							</div>
						</div>
					';
			 		echo '	
			 			<div class="row" id="ativo-ficha">	
			 				<div class="col-md-offset-2 col-md-8 col-xs-10">';
								include DIR.'/fichas/ativo.php';
					
					echo '		
							</div>	
							<div class="col-md-2 col-xs-2">
								<button class="btn btn- ball-button" id="save-student-card" legenda="Salvar Jogo"><i class="fa fa-check" aria-hidden="true"></i></button>
							</div>
						</div>
					';

			 	endif; 
			?>	
		</div>
	</div>
</div>
<?php include DIR.'/perguntas/activeQuestion.php';?>