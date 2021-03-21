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
				echo '	<div class="row">';
				echo '		<div class="col-md-offset-1 col-md-10 col-xs-12">';
				echo '			<div class="painel-mapa-dado">';
				echo '				<input type="hidden" id="diceNumber" value="">';
									include DIR.'/mapas/ativo.php';
				echo'			</div>';
				echo'		</div>';
				echo'	</div>';
				echo'	<hr/>';
				include DIR.'/jogos/report.php';
			endif; 
			if (Session::get('userType') == 0):
			 	echo '	<div class="row" id="ativo-ficha">	';
			 	echo '		<div class="col-md-offset-2 col-md-8 col-xs-10">';
				include DIR.	'/fichas/ativo.php';
				echo '		</div>';
				echo '		<div class="col-md-2 col-xs-2">';
				echo '			<button class="btn btn- ball-button" id="save-student-card" legenda="Salvar Jogo"><i class="fa fa-check" aria-hidden="true"></i></button>';
				echo '		</div>';
				echo '	</div>';
			 	echo '	<div class="row" id="ativo-tabuleiro">';
				echo '		<div class="col-md-11 col-xs-10">';
				echo '			<div class="painel-mapa-dado">';
				include DIR.		'/mapas/ativo.php';
				echo '				<div id="dice-3d">';
				echo '					<input type="hidden" id="diceNumber" value="">';
				include DIR.			'/dados/ativo.php';
				echo'				</div>';
				echo'			</div>';
				echo'		</div>';
				echo'		<div class="col-md-1 col-xs-2">';
				echo'			<button class="ball-button hidden" id="show-card" legenda="Abrir Ficha"><i class="fa fa-file-text-o" aria-hidden="true"></i></button>';
				echo'			<div class="ball-button" id="roll-dice" legenda="Rolar Dado">';
				include DIR.		'/dados/ativo.php';
				echo'			</div>';
				echo'		</div>';
				echo'	</div>';
			 	
			endif; 
		?>	
	</div>
</div>
<?php include DIR.'/perguntas/activeQuestion.php';?>

<section class="sec-white">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="h2 text-center btm-12">Obrigada por usar nossa ferramenta</div>
			</div>
			<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 text-center">
				<p class="text-center mobile-copy-btm"> Sua opnião é muito importante para melhoramos</p>
				 <a class="button btn text-center" href="https://goo.gl/forms/1dhg6tbqA5HjITrr2">Dar minha opnião</a> 
			</div>
		</div>
	</div>
</section>