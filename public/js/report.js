$(document).ready(function() {

	var URL_ROOT = $("#url-root").val();

	//Carrega a lista de jogadores
	function loadPlayersList() {
		$.ajax({
			url: URL_ROOT + "jogos/report",
			method: "POST",
			dataType : "json",
			success : function(data){
				$('#reportTable tbody tr').remove();
				for($i=0; $i < data.length; $i++){

					let email = data[$i].email;
					let userId = data[$i].id;
					let questionsQuantity = data[$i].qtdPerguntas;
					let rightQuantity = data[$i].acertos;
					let cardIcon = '<a class="showPlayerCard showPlayerCardModal" data-user-id="'+userId+'"><i class="fa fa-file-text-o" aria-hidden="true"></i></a>';
					let questionsIcon = '<a class="showPlayerQuestions showPlayerQuestionsModal" data-user-id="'+userId+'"><i class="fa fa-file-text-o" aria-hidden="true"></i></a>';


					var row = "<tr><td>"+email+"</td><td>"+cardIcon+"</td><td>"+questionsQuantity+" "+ questionsIcon +"</td><td>"+rightQuantity+"</td></tr>";
					$('#reportTable tbody').append(row);
				}
			}
		});
	}

loadPlayersList();
setInterval(function(){
	loadPlayersList();
}, 180000);


// Carrega o modal com as perguntas repondidas pelo jogador 
$(document).on("click", ".showPlayerQuestions", function(){
	var id = $(this).attr('data-user-id');
	$('#showPlayerQuestionsModal').modal('show');
	$('#cardUserId').val(id);

	//Recupera os campos da ficha e os dados preenchidos pelo jogados
	$.ajax({
		url: URL_ROOT + "perguntas/listAnsweredQuestionsByStudent",
		method: "POST",
		data: { userId: id },
		dataType : "json",
		success : function(data){
			$("#showPlayerQuestionsModal .reportAnsweredQuestionsList").html("");
			for($i=0; $i < data.length; $i++){

				let question= new Object();
				question.id = data[$i].id_pergunta;
				question.text = data[$i].pergunta_texto;
				
				let answer= new Object();
				answer.id = data[$i].id_resposta;
				answer.text = data[$i].resposta_texto;
				answer.right = data[$i].resp_cert;

				if (question.text.length > 100) {
					question.text = question.text.slice(0, 100); 
					question.text += " ...";
				}
				

				 if (answer.right == 1) {
					var templateRight = ('<i class="fa fa-check"></i>');
				} else {
					var templateRight = ('<i class="fa fa-times"></i>');
				}
				$(".reportAnsweredQuestionsList").append('<div class="item"><span>'+question.text+'</span></br><span>'+answer.text+'</span>'+templateRight+'</div>');
				
			}
		}
	});

});


});