<script type="text/javascript" src="<?php echo URL; ?>public/js/report.js"></script>

<div class="row">
	<div class="col-md-12">
		<div class="painel-list">
			<table class="table" id="reportTable">
				<thead>
					<tr>
						<th>Email</th>
						<th>Ficha</th>
						<th>Perguntas</th>
						<th>Acertos</th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
	</div>
</div>

<?php include DIR.'/fichas/filledCard.php';?>
<?php include DIR.'/perguntas/answeredQuestionsByStudents.php';?>