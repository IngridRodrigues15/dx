$(document).ready(function() {

	var urlAtual = $("#url-root").val();

	//Redireciona para a pagina de edição de jogos
	$( ".goEditGame" ).click(function() {
		var id = $(this).attr('data-id');

		$.post( urlAtual+"jogos/goEditGamePage", { id: id }).done(function( data ) {
			window.location.assign( urlAtual+"fichas/index");
		});
	});

	//Redireciona para a pagina para inicializar o jogo
	$( ".goStartGame" ).click(function() {
		var id = $(this).attr('data-id');

		$.post( urlAtual+"jogos/goActiveGamePage", { id: id }).done(function( data ) {
			window.location.assign( urlAtual+"jogos/active");
		});
	});

	//Exibi o modal para trocar o nome do jogo na listagem 
	$( ".alterGameNameIcon" ).click(function() {
		var id = $(this).attr('data-id');
		var name = $(this).attr('data-name');
		$('#alterGameNameModal').modal('show');
		$('#gameName').val(name);
		$('#gameId').val(id);
		
	});

	//Salva o novo nome do jogo
	$( "#alterGameName" ).click(function() {
		var id = $("#gameId").val();
		var name = $("#gameName").val();

		$.post( urlAtual+"jogos/editName", { id: id, name: name }).done(function( data ) {
			window.location.reload();
		});

	});

	//Exibi o modal para criar um novo jogo
	$( ".createGameIcon" ).click(function() {
		$('#createGameModal').modal('show');
		$(".newGameForm .error").empty();		
	});

	//Salva o novo jogo
	$( "#createGame" ).click(function() {
		var name = $("#newGameName").val();
		if (name.length < 3) {
			$(".newGameForm .error").append("Digite o nome do jogo");
			return;
		}
		$.post( urlAtual+"jogos/create", { tipo: 1, nome: name }).done(function( data ) {
			 var response = $.parseJSON(data);
			 var id = response.id;
			 var href = urlAtual + "jogos/edit/" + id;
			 window.location.assign(href);
		});

	});
		   
	$( ".delete-jogo" ).click(function() {
		var jogoId = $(this).attr("data-id");
		var item = $(this);
		var pai = item.parent();
		console.log(jogoId);
		$.post( urlAtual +"jogos/delete", { jogoId: jogoId  })
			.done(function() {
				$(pai).remove();
			}
		);
	});

	$('[data-toggle="tooltip"]').tooltip();
 

});


 
	
