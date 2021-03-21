$(document).ready(function() {
	var urlAtual = $("#url-root").val();

	//Envia para o php, um objeto de pergunta, e uma lista de objetos de repostas
	$(document).on('click', "#editAnswers", function() {
		var answerList = new Array();

		var question = $("#editQuestionText").val();
		var questionId = $('#editQuestionId').val();

		if (questionId !== "undefined" && parseInt(questionId) < 1) {
			return false;
		} 

		var questionObj = new Object();
		questionObj.text = question;
		questionObj.id = questionId;

		$(".editAnswerList").find('input[type="text"]').each(function (index, element) {
			var checkbox = $(element).prev();
			checkbox.attr("value",$(element).val());
			var text = $(checkbox).val();
			var checked = $(checkbox).prop("checked");

			var answerObj= new Object();
			answerObj.texto = text;
			answerObj.repostaCerta = checked;
			answerList.push(answerObj);
		});

		$.post( urlAtual+"perguntas/create", { question: questionObj, answerList: answerList }).done(function( data ) {
			$('#editQuestionId').val(0);
			$('#editAnswerModal').modal('toggle');
			window.location.reload();
		});
	});


	//Envia para o php, um objeto de pergunta, e uma lista de objetos de repostas
	$(document).on('click', "#createQuestion", function() {
		var answerList = new Array();

		var question = $("#question").val();
		var questionObj = new Object();
		questionObj.text = question;

		$(".newAnswerList").find('input[type="text"]').each(function (index, element) {
			var checkbox = $(element).prev();
			checkbox.attr("value",$(element).val());
			var text = $(checkbox).val();
			var checked = $(checkbox).prop("checked");

			var answerObj= new Object();
			answerObj.texto = text;
			answerObj.repostaCerta = checked;
			answerList.push(answerObj);
		});

		$.post( urlAtual+"perguntas/create", { question: questionObj, answerList: answerList }).done(function( data ) {
			window.location.reload();
		});
	});

	//Exibi o modal para editar a pergunta 
	$( ".showEditAnswerModal" ).click(function() {
		var id = $(this).attr('data-question-id');
		var text = $(this).attr('data-question-text');
		$('#editAnswerModal').modal('show');
		$('#editQuestionId').val(id);
		$('#editQuestionText').val(text);
	
		//Recupera as repostas
		$.ajax({
			url: urlAtual +"perguntas/listAnswersByQuestion",
			method: "POST",
			data: { questionId: id },
			dataType : "json",
			success : function(data){
				$("#editAnswerModal .editAnswerList").html("");
				console.log(data);
				for($i=0; $i < data.length; $i++){

					let answer= new Object();
					answer.id = data[$i].id;
					answer.text = data[$i].texto;
					answer.right = data[$i].resp_cert;
					console.log(answer);

					if (answer.right == 1) {
						$("#editAnswerModal .editAnswerList").append('<div class="answerCheckbox"><input type="radio" name="rightAnswer" data-id="'+answer.id+'" value="" checked><input type="text" name="answer" value="'+answer.text+'"></div>');
					} else {
						$("#editAnswerModal .editAnswerList").append('<div class="answerCheckbox"><input type="radio" name="rightAnswer" data-id="'+answer.id+'" value=""><input type="text" name="answer" value="'+answer.text+'"></div>');
					}
				}
			}
		});

	});
	
});