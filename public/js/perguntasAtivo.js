$(document).ready(function() {
    var urlAtual = $("#url-root").val();
    var gamePage = $("#game-page").val(); 
    var questionsList = new Array();
    var answeredList = new Array();

    //Carrega a lista de perguntas do jogo
    function loadQuestionList() {
        $.ajax({
            url: urlAtual + "perguntas/listQuestions",
            method: "POST",
            dataType : "json",
            async: false,
            success : function(data){
                for($i=0; $i < data.length; $i++){
                    
                    let question= new Object();
                    question.id = data[$i].id;
                    question.text = data[$i].texto;
                    questionsList.push(question);
                }
            }
        });
    }

    //Torna a lista de perguntas globais
    function exportQuestionList() {
        if (gamePage == "active") {
            loadQuestionList();
            return questionsList;
        }
    }
    window.exportQuestionList=exportQuestionList;

    

    // Mostra a pergunta escolhida 
    function showQuestion(question) {
        var id = question.id;
        var text = question.text;
        $('#activeAnswerModal').modal('show');
        $('#activeQuestionId').empty();
        $('#activeQuestionText').empty();
        $('#activeQuestionId').val(id);
        $('#activeQuestionText').append(text);

        //Recupera as repostas
		$.ajax({
			url: urlAtual +"perguntas/listAnswersByQuestion",
            method: "POST",
            data: { questionId: id },
			dataType : "json",
			success : function(data){
                $("#activeAnswerModal .activeAnswerList").empty();
				for($i=0; $i < data.length; $i++){

                    let answer= new Object();
                    answer.id = data[$i].id_resposta;
                    answer.text = data[$i].texto;
                    answer.right = data[$i].resp_cert;

                    $("#activeAnswerModal .activeAnswerList").append('<div class="answerCheckbox"><input type="radio" name="chosenAnswer" data-id="'+answer.id+'" value="'+answer.id+'" data-text="'+answer.text+'"  data-right="'+answer.right+'">'+answer.text+'</div>');
                    
				}
			}
		});
    }
    window.showQuestion = showQuestion;


    //Envia para o php, um objeto de pergunta, e a resposta selecionada
    $( "#answerQuestion" ).click(function() {
		$("#answerQuestion").prop("disabled", true);
        var questionId = $("#activeQuestionId").val();
        var questionText = $("#activeQuestionText").text();
        var pointsElement = $("#game-points");
        var points = pointsElement.text();

        var questionObj = new Object();
        questionObj.id = questionId;
        questionObj.text = questionText;

        var checkedAnswer = $("input[name='chosenAnswer']:checked");
        var checkedAnswerId = checkedAnswer.val();
        var checkedAnswerText = checkedAnswer.attr("data-text");
        var checkedAnswerRight = checkedAnswer.attr("data-right");

        if (typeof checkedAnswerId == "undefined") {
            $("#activeAnswerModal .alert-info").removeClass("hide");
        } else {
            $.post( urlAtual+"perguntas/saveAnswerByQuestion", { questionId: parseInt(questionObj.id), answerId: parseInt(checkedAnswerId) }).done(function( data ) {
                $('#activeAnswerModal').modal('toggle');
                $("#activeAnswerModal .alert-info").addClass("hide");
                if (checkedAnswerRight == 1) {
                    points++;
                    var templateRight = ('<i class="fa fa-check"></i>');
                    pointsElement.text(points);
                    pointsElement.trigger('change');
                } else {
                    var templateRight = ('<i class="fa fa-times"></i>');
                }
                pointsElement.removeClass("hide");
                $("#questions-answered-list").append('<span>'+questionObj.text+'</span></br><span>'+checkedAnswerText+'</span>'+templateRight+'</br>');
            });
        }
		$("#answerQuestion").prop("disabled", false);
    });


    //Carrega a lista de perguntas respondidas
    function loadAnsweredQuestionList() {
        var pointsElement = $("#game-points");
        var points = pointsElement.text();

        $.ajax({
            url: urlAtual + "perguntas/listAnsweredQuestions",
            method: "POST",
            dataType : "json",
            success : function(data){
                for($i=0; $i < data.length; $i++){
                    
                    let question= new Object();
                    question.id = data[$i].id_pergunta;
                    question.text = data[$i].pergunta_texto;
                    
                    let answer= new Object();
                    answer.id = data[$i].id_resposta;
                    answer.text = data[$i].resposta_texto;
                    answer.right = data[$i].resp_cert;

                    if (answer.right == 1) {
                        points++;
                        var templateRight = ('<i class="fa fa-check"></i>');
                    } else {
                        var templateRight = ('<i class="fa fa-times"></i>');
                    }
                    pointsElement.removeClass("hide");
                    pointsElement.text(points);
                    $("#questions-answered-list").append('<span>'+question.text+'</span></br><span>'+answer.text+'</span>'+templateRight+'</br>');
                    
                }
            }
        });
    }
    if (gamePage == "active") {
        loadAnsweredQuestionList();
    }
    
   
    
    
});