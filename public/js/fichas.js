$(document).ready(function() {
	var URL_ROOT = $("#url-root").val();

	//Inicializa o sortable e define a ordem a cada update 
	$(function() {
		if ($( "#cardSortable" ).length == 0) {
			return null;
		}
		$( "#cardSortable" ).sortable({
			placeholder: "ui-state-highlight",
			update: function (event, ui) {
        		$("#cardSortable .field-sortable" ).each(function( index ) {
					var id = $(this).attr("data-id");
					var order = index; 
					$(this).attr("data-order", index);

					$("#salvarCamposFicha").removeClass("hidden");
				});
			}

		});
		$( "#cardSortable" ).disableSelection();
	});

	$("#show-new-field-form").mouseenter(function() {
		if ($(".ball-button-option").hasClass("hide")) {
			$("#show-new-field-form .ball-button .info").css("visibility", "hidden");
		} else {
			$("#show-new-field-form .ball-button .info").css("visibility", "visible");
		}
	});

	$("#show-new-field-form").mouseleave(function() {
		if ($(".ball-button-option").hasClass("hide")) {
			$("#show-new-field-form .ball-button .info").css("visibility", "hidden");
		} else {
			$("#show-new-field-form .ball-button .info").css("visibility", "visible");
		}
	});
	
	//Exibi o form novo campo texto      
	$( "#show-new-field-form" ).click(function() {
		if ($(".ball-button-option").hasClass("hide")) {
			$(".ball-button-option").removeClass("hide");
			$("#show-new-field-form .ball-button .info").css("visibility", "visible");
			$("#salvarCamposFicha").css("top", "265px");
		} else {
			$(".ball-button-option").addClass("hide");
			$("#show-new-field-form .ball-button .info").css("visibility", "hidden");
			$("#salvarCamposFicha").css("top", "90px");
		}
	});
	
	//Adiciona um novo campo texto
	$( ".novoCampo" ).click(function() {
		var nome = $("#nomeCampo").val();
		var nomeEdit = $("#nomeCampoEdit").val();
		var tipo = $("input:radio[name=type]:checked").val(); 
		var jedit = $("input[name='text_jedit']:checked").length > 0;
		var medit = $("input[name='text_medit']:checked").length > 0;
		var redit = $("input[name='text_redit']:checked").length > 0;

		var size = $("#cardSortable").children().length;

		if (nomeEdit !== "" && nomeEdit !== null && nomeEdit !== undefined) {
			var nome = nomeEdit;
		}

		if (tipo == "text") {
			$(".ficha-container .campos").append("<div data-order= '"+size+"' class='field-sortable new "+nome +"'>"+nome+"<input disabled type='text'><input class='hidden campodinamico' data-jedit='"+jedit+"' data-medit='"+medit+"' data-redit='"+redit +"' data-type='string' value='"+nome+"'><button class='delete-btn'><i class='fa fa-trash-o' aria-hidden='true'></i></button><button class='edit-btn'><i class='fa fa-pencil' aria-hidden='true'></i></button></div>");

		} else {
			$(".ficha-container .campos").append("<div data-order= '"+size+"' class='field-sortable new "+nome +"'>"+nome +"<button name='diminui' disabled>-</button>0<button name='aumenta' disabled>+</button><input class='hidden campodinamico' data-jedit='"+jedit+"' data-medit='"+medit+"' data-redit='"+redit +"' data-type='numeric' value='"+nome+"'><button class='delete-btn'><i class='fa fa-trash-o' aria-hidden='true'></i></button><button class='edit-btn'><i class='fa fa-pencil' aria-hidden='true'></i></button></div>");
		}

		$("#show-new-field-form .ball-button .info").html("Novo campo");
		$(".ball-button-option").addClass("hide");

		$("#salvarCamposFicha").removeClass("hidden");
		$("#salvarCamposFicha").css("top", "90px");
		$(this).editar();
		$(this).deletar();
		$(this).limpar();
	});

	//Envia por post uma lista de campos para salvar os novos campos da ficha
	 $( "#salvarCamposFicha" ).click(function() {
		var $inputs = $( ".ficha-container .campos" ).find( "input.campodinamico" );
		console.log($inputs); 
		lista = "";
		var camposList = new Array();
		$inputs.each(function( index, element ) {
			var ordem = $(element).parent().attr("data-order");
			var nome = $(element).attr("value"); 
			var tipo = $(element).attr("data-type"); 
			/*var jedit = $(element).attr("data-jedit");
			var medit = $(element).attr("data-medit"); 
			var redit = $(element).attr("data-redit"); */
			//lista += nome+"+"+tipo+"+"+jedit+"+"+medit+"+"+redit+"-";

			let obj= new Object();
			obj.nome = nome;
			obj.tipo = tipo;
			obj.ordem = ordem;

			camposList.push(obj);
		});
		$.post( URL_ROOT+"campos/create", { listaCampos: camposList })
			.done(function( data ) {
				//alerta.showAlertMensage("success","oi");
				alert( "Ficha salva !"  );
			});
				
	});


	//Deleta uma ficha e seus campos
	$( ".delete-ficha" ).click(function() {
		var fichaId = $(this).attr("data-id");
		var item = $(this);
		var pai = item.parent();
		$.post( URL_ROOT+"fichas/delete", { fichaId: fichaId  })
			.done(function() {
				$(pai).remove();
			}
		);
	});
	
	//Exibi o modal para trocar o nome da ficha 
	$( ".alterCardNameIcon" ).click(function() {
		var id = $(this).attr('data-id');
		var name = $(this).attr('data-name');
		$('#alterCardNameModal').modal('show');
		$('#cardName').val(name);
		$('#cardId').val(id);
	});

	//Salva o novo nome da ficha
	$( "#altercardName" ).click(function() {
		var id = $("#cardId").val();
		var name = $("#cardName").val();

		$.post( URL_ROOT+"fichas/editName", { id: id, name: name } )
			.done(function(data) {
				window.location.reload();
			});
	});

	$(this).editar();
	$(this).deletar();

	
	//Exibi o modal com as infromações da fichas

	$(document).on("click", ".showPlayerCard", function(){
		var id = $(this).attr('data-user-id');
		$('#showPlayerCardModal').modal('show');
		$('#cardUserId').val(id);
	
		//Recupera os campos da ficha e os dados preenchidos pelo jogados
		$.ajax({
			url: URL_ROOT+ "fichas/cardReport",
			method: "POST",
			data: { userId: id },
			dataType : "json",
			success : function(data){
				console.log(data);
				$("#showPlayerCardModal .reportCardList").html("");
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
						$(".reportCardList").append("<div class='field'><label>"+fields.name +"</label><input class='number' type='text' data-field-id='"+fields.id+"' value='"+fields.value+"'>");
					} else {
						$(".reportCardList").append("<div class='field'><label>"+fields.name+"</label><input type='text' value='"+fields.value+"' data-field-id='"+fields.id+"'></div>");
					}
				}
			}
		});

	});

});

//Edita um campo da ficha (apenas exibição)
$.fn.editar = function() { 
	$( ".edit-btn" ).click(function() {
		var pai = $(this).parent();
		var inputTextJedit = $("input[name='text_jedit']#edit_text_jedit");
		var inputTextMedit = $("input[name='text_medit']#edit_text_medit");
		var inputTextRedit = $("input[name='text_redit']#edit_text_redit");

		var inputNumJedit = $("input[name='num_jedit']#edit_num_jedit");
		var inputNumMedit = $("input[name='num_medit']#edit_num_medit");
		var inputNumRedit = $("input[name='num_redit']#edit_num_redit");
		var $inputs = $(pai).find( "input.campodinamico" );

		$inputs.each(function( index, element ) {
			nomeEdit = $(element).attr("value"); 
			tipoEdit = $(element).attr("data-type"); 
			jeditEdit = $(element).attr("data-jedit");
			meditEdit = $(element).attr("data-medit"); 
			reditEdit = $(element).attr("data-redit"); 
			console.log(nomeEdit,tipoEdit,reditEdit);
		});

		$(".ball-button-option").removeClass("hide");
		$("#show-new-field-form .ball-button .info").html("Editar campo");
		$("#show-new-field-form .ball-button .info").css("visibility", "visible");
		$("#salvarCamposFicha").css("top", "265px");

		if( tipoEdit == "string"){
			$("#nomeCampo").val(nomeEdit);
			$("input:radio[name=type][value=text]").prop("checked",true); 
		} else if ( tipoEdit == "numeric" ){
			$("#nomeCampo").val(nomeEdit);
			$("input:radio[name=type][value=number]").prop("checked",true);
		}

		$(pai).remove();
		$("#salvarCamposFicha").removeClass("hidden");
	});
};

//Edita um campo da ficha (apenas exibição)
$.fn.deletar = function() { 
	 $( ".delete-btn" ).click(function() {
		var item = $(this);
		var pai = item.parent();
		$(pai).remove();
		$("#salvarCamposFicha").removeClass("hidden");
	}); 
};

//Passa o valor null para todos os inputs
$.fn.limpar = function() { 
	$("#nomeCampo").val('');
	$("#nomeCampoEdit").val('');

	$("input[name='text_jedit']").prop( "checked",false );
	$("input[name='text_medit']").prop( "checked",false );
	$("input[name='text_redit']").prop( "checked",false );
	$("input:radio[name=type]").prop( "checked",false );

	$("#nomeCampoNum").val('');
	$("#nomeCampoNumEdit").val('');

	$("input[name='num_jedit']").prop( "checked",false );
	$("input[name='num_medit']").prop( "checked",false );
	$("input[name='num_redit']").prop( "checked",false );
};
 

 