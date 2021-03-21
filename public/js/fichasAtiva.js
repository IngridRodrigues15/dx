$(document).ready(function() {

	var urlAtual = $("#url-root").val();

	//Recupera os campos da ficha principal do jogo
	$.ajax({
		url: urlAtual +"fichas/listFields",
		dataType : "json",
		success : function(data){
			$("#card-list-fields-active").html("");
			for($i=0; $i < data.length; $i++){

				let fields= new Object();
				fields.id = data[$i].id;
				fields.name = data[$i].nome;
				fields.type = data[$i].tipo;
				if (fields.type == "n" && data[$i].conteudo == undefined ){
				   fields.value = 0;
				} else if (data[$i].conteudo == undefined)  {
					fields.value = "";
				} else {
					 fields.value = data[$i].conteudo;
				}
				

				if (fields.type == "n") {
				   $("#card-list-fields-active").append("<div class='save "+fields.id +"'>"+fields.name +"<button class='diminui' data-fild-id='"+fields.id+"'>-</button><input class='number' type='text' data-field-id='"+fields.id+"' value='"+fields.value+"'><button class='aumenta' data-fild-id='"+fields.id+"'>+</button>");
				} else {
				   $("#card-list-fields-active").append("<div class='save "+fields.id +"'>"+fields.name+"<input type='text' value='"+fields.value+"' data-field-id='"+fields.id+"'></div>");
				}
			}
			if (data.length > 0) {
				$("#save-student-card").removeClass("hide");
			}

		}
	});


	//Envia para o php, um objeto de ficha, e uma lista de objetos de campos
	$( "#save-student-card" ).click(function() {
		$("#save-student-card").prop("disabled", true);
		var fieldsList = new Array();

		$("#card-list-fields-active").find('input').each(function (index, element) {
			 var text = $(element).val();
			 var id = $(element).attr('data-field-id');

			var fieldsObj= new Object();
			fieldsObj.id = id;
			fieldsObj.value = text;
			fieldsList.push(fieldsObj);
			

			$(element).prop("disabled", true);
		});

		$.post( urlAtual+"fichas/fillCard", { fields: fieldsList }).done(function( data ) {
			$("#save-student-card").prop("disabled", true);
			alert(" salvo");
		});
		$("#ativo-ficha").addClass("hidden");
   		//$("#ativo-tabuleiro").removeClass("hidden");
		$("#show-card").removeClass("hidden");
	});

	$("#show-card").click(function(){
		//$("#ativo-tabuleiro").addClass("hidden");
		$("#save-student-card").prop("disabled", false);
		$("#show-card").addClass("hidden");
   		$("#ativo-ficha").removeClass("hidden");
 	});

	$(document).on("click", ".aumenta", function(){
		var id = $(this).attr("data-fild-id");
		var element = $("input[type='text'][data-field-id='"+id+"'");
		var number = element.val();
		number++;
		element.val(number);
	});

	$(document).on("click", ".diminui", function(){
		var id = $(this).attr("data-fild-id");
		var element = $("input[type='text'][data-field-id='"+id+"'");
		var number = element.val();
		number--;
		element.val(number);
	});

});