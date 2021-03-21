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
		<div class="row">
			<div class="col-md-5">
				<?php if (Session::get('userType') == 1):?>
					<?php include DIR.'/jogos/report.php';?>
				<?php endif; ?>
				<?php if (Session::get('userType') == 0):?>
					<?php include DIR.'/fichas/ativo.php';?>
				<?php endif; ?>
			</div>
			<div class="col-md-7 text-center">
				<div class="painel-mapa-dado">
					<input type="hidden" id="diceNumber" value="">
					<?php include DIR.'/mapas/ativo.php';?>
					<?php include DIR.'/dados/ativo.php';?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include DIR.'/perguntas/activeQuestion.php';?>

