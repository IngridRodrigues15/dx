var mapafunction = {};
var imageSrc = $('#image-src').attr('src');

var urlAtual = $("#url-root").val();
var mapPage = $("#map-page").val();
var gamePage = $("#game-page").val();
var questionsList = [];
var questionsLottery = [];
mapafunction.pointsList = [];
var map;
var point;
var gameOver = false;

//Ponto com icone do jogogador
var playerIcon = L.icon({
	iconUrl: 'http://www.dxsmartgames.com.br/public/js/images/marker-point-person2.png',

	iconSize:     [38, 41], // size of the icon
	iconAnchor:   [22, 40], // point of the icon which will correspond to marker's location
	popupAnchor:  [-5, -30] // point from which the popup should open relative to the iconAnchor
});

var blueCircleIcon = L.icon({
	iconUrl: 'http://www.dxsmartgames.com.br/public/js/images/bluemarker.png',

	iconSize:     [30, 30], // size of the icon
	iconAnchor:   [15, 15], // point of the icon which will correspond to marker's location
	popupAnchor:  [-5, -30] // point from which the popup should open relative to the iconAnchor
});

// Cria os marcadores para jogadores ativos
var increase = 0
var playeresMarkers = new Array();
var markers = new Array();


//Exibi a opção selecionada na listagem de mapas na tela principal do mapa 
/*$( ".dropdown-item-map" ).click(function() {
	var mapName = $(this).text();
	var mapId = $(this).attr("data-value");
	$("#default-map-text").text("Mapa principal do jogo: "+ mapName);

	$.post( urlAtual+"mapas/changeDefaultMap", { mapId: mapId}).done(function( data ) {
		alert("mapa default alterado");
	});
});*/

//Exibi a opção selecionada na listagem de mapas na tela principal do mapa 
/*$(".dropdown-menu-map > .dropdown-item-map").each( function(index, value) {
	var defaultMap = $(this).attr('data-default');
	if (defaultMap == 1) {
		var mapName = $(this).text();
		$("#default-map-text").text("Tabuleiro principal do jogo: "+ mapName);
	}
});*/

//Exibi o modal para criar um novo mapa	
mapafunction.createMapItem = function() {
	$( ".createMapIcon" ).click(function() {
		$('#createMapModal').modal('show');
		$(".newMapForm .error").empty();		
	});
}

//Salva o novo jogo
mapafunction.createMap = function() {
	$( "#createMap" ).click(function() {
		var name = $("#newMapName").val();
		if (name.length < 3) {
			$(".newMapForm .error").append("Digite o nome do mapa");
			return;
		}
		urlAtual = $("#url-root").val();
		$.post( urlAtual+"mapas/create", { nome: name }).done(function( data ) {
			 var response = $.parseJSON(data);
			 var id = response.id;
			 var href = urlAtual + "mapas/changeImage/"+id;
			 window.location.assign(href);
		});
	});
}

mapafunction.deleteMap = function() {
	$( ".delete-mapa" ).click(function() {
		var id = $(this).attr("data-id");
		var item = $(this);
		var pai = item.closest(".col-md-3");
		urlAtual = $("#url-root").val();
		$.post( urlAtual +"mapas/delete", { mapaId: id  })
			.done(function() {
				$(pai).remove();
			}
		);
	});
}

//Exibi o modal para trocar o nome do mapa na listagem 
mapafunction.alterMapNameIcon = function() {
	$( ".alterMapNameIcon" ).click(function() {
		var id = $(this).attr('data-id');
		var name = $(this).attr('data-name');
		$('#alterMapNameModal').modal('show');
		$('#mapName').val(name);
		$('#mapId').val(id);
	});
}

//Salva o novo nome do mapa
mapafunction.alterMapName = function() {
	$( "#alterMapName" ).click(function() {
		var id = $("#mapId").val();
		var name = $("#mapName").val();

		urlAtual = $("#url-root").val();
		$.post( urlAtual+"mapas/editName", { id: id, name: name }).done(function( data ) {
			 window.location.reload();
		});
	});
}


//Inicializa o sortable e define a ordem a cada update 
mapafunction.inicializeSortable = function() {
	$(function() {
		if ($( "#sortable" ).length == 0) {
			return null;
		}
		$( "#sortable" ).sortable({
			placeholder: "ui-state-highlight",
			update: function (event, ui) {
				$("#sortable li" ).each(function( index ) {
					var id = $(this).attr("data-id");
					var order = index; 
					$(this).attr("data-order", index);

					$(".saveMap").removeClass("hidden");
				});
			}

		});
		$( "#sortable" ).disableSelection();
	});
}

popup = L.popup();
function onMapClick(e) {
	popup
		.setLatLng(e.latlng)
		.setContent("Deseja marcar um ponto aqui ?</br> <button id='new-point' data-toggle='modal' data-target='#newPointModal'>Ok</button>")
		.openOn(map);
	point = e.latlng;
}

mapafunction.loadMapImage = function() {
	mapPage = $("#map-page").val();
	var imageHeight = $('#image-src').height();
	var imageWidth = $('#image-src').width();
	$('#image-src').css('visibility',"hidden");

	map = L.map('map-main-image', {
		maxZoom: 2,
		minZoom: 1,
		crs: L.CRS.Simple
	}).setView([0, 0], 1);

	map.setMaxBounds(new L.LatLngBounds([0,imageHeight], [imageWidth,0]));

	imageSrc = $('#image-src').attr('src');
	var imageUrl = imageSrc;
	var imageBounds = [[300,0], [0,400]];
	L.imageOverlay(imageUrl, imageBounds).addTo(map);
	
	if (mapPage == "edit") {
		map.on('click', onMapClick);
		mapafunction.createSpot();
	}
	
	mapafunction.getAllPoints();
}

//Recupera os pontos de um mapa existente
mapafunction.getAllPoints = function() {
	urlAtual = $("#url-root").val();
	mapPage = $("#map-page").val();

	$.ajax({
		url: urlAtual + "mapas/listPoints",
		dataType : "json",
		async: false,
		
		success : function(data){
			for($i=0; $i < data.length; $i++){
				let latLng = data[$i].coordenadas;
				let coordenada = latLng.replace("LatLng(", "").replace(")", "").split(",");
				let latitude = parseFloat(coordenada[0]);
				let longitude = parseFloat(coordenada[1]);
				let submapaId = data[$i].submapa;
				let submapa = $("#submapalist option[value="+data[$i].submapa+"]").text();
				let triggerQuestion = data[$i].disparar_pergunta;
				let order = data[$i].ordem;

				if (data[$i].submapa == 0) {
					var submapaText = "Submapa:"+ submapa;
				} else if (mapPage == "preview") {
					var submapaText = "Submapa:<a href='"+urlAtual+"mapas/preview/"+data[$i].submapa+"'>"+ submapa +"</a>";
				} else if (mapPage == "edit") {
					var submapaText = "Submapa:"+ submapa;
				}
				
				var questionButton = "";
				var deleteButton = "";
				if (mapPage == "preview") {
					var questionButton = "<button class='randowQuestion'>Sortear Pergunta</button>"
				} else if (mapPage == "edit") {
					var deleteButton = "<input type='button' class='marker-delete-button' value='Delete'/>";
				}
				
				if (triggerQuestion == 1) {
					triggerQuestion = true;
					popUpContent = '<b>'+data[$i].nome+'</b></br><b>Sorteio de Pergunta</b></br>'+ questionButton + deleteButton;
				} else {
					triggerQuestion = false;
					popUpContent = "<b>"+data[$i].nome+"</b></br>"+data[$i].texto+"</br> "+submapaText+"</br>"+deleteButton;
				}
				
				var marker = L.marker([latitude,longitude], {icon: blueCircleIcon}).addTo(map);
				//let marker = new L.marker([latitude,longitude], {icon: playerIcon});
				marker.bindPopup(popUpContent);
				marker.on("popupopen", onPopupOpen);

				let obj= new Object();
				obj.id = data[$i].id;
				obj.nome = data[$i].nome;
				obj.descricao = data[$i].texto;
				obj.idsubmapa = submapaId;
				obj.ponto = latLng;
				obj.dispararPergunta = triggerQuestion;
				obj.ordem = order;
				mapafunction.creatSortableListOfPoints(obj);
				mapafunction.pointsList.push(obj);
			}
		}
	});
	mapafunction.loadQuestionList();
}

//Funções que serão executadas ao abrir o pop up no mapa
function onPopupOpen() {
	var tempMarker = this;
	// Deleta o marcador
	$(".marker-delete-button:visible").click(function () {
		$( ".saveMap" ).removeClass("hidden");
		let obj= new Object();
		obj.ponto = "LatLng("+tempMarker._latlng.lat+", "+tempMarker._latlng.lng+")";
		$('li[data-point="'+obj.ponto+'"]').remove();

		mapafunction.pointsList = mapafunction.removeByAttr(pointsList, 'ponto', obj.ponto);  
		map.removeLayer(tempMarker);
	});

	// Sorteia uma pergunta da lista
	$(".randowQuestion:visible").click(function () {
		mapafunction.loadQuestionList();
		mapafunction.randowQuestion();
	});
}


mapafunction.loadQuestionList = function() {
	gamePage = $("#game-page").val();
	if (gamePage == "active") {
		questionsList = exportQuestionList();
		console.log(exportQuestionList());
	}
}

// Sorteia a pergunta
mapafunction.randowQuestion = function() {	
	var maxNumber = questionsList.length;
	if (maxNumber == 0) {
		alert("não tem perguntas");
		return null;
	}
	var randow = Math.floor(Math.random() * maxNumber) + 1;
	var lottery = questionsList[parseInt(randow - 1)]
	// Adiciona a escolhida ao array de perguntas sorteadas
	questionsLottery.push(lottery);
	// Remove a escolhida do array de perguntas
	var lotteryId = lottery.id;
	questionsList = mapafunction.removeByAttr(questionsList, 'id', lotteryId);
	showQuestion(lottery);
}


mapafunction.createSpot = function() {
	//Apos clicar no mapa, criar o ponto com as informacoes do formulario
	$( ".createSpot" ).click(function() {
		console.log("toaqui");
		var name = $("#nomePonto").val();
		var description = $("#descPonto").val();
		var idSubmap = $( "#submapalist" ).val();
		var nameSubmap = $( "#submapalist option:selected" ).text();
		var triggerQuestion = $("#disparar_pergunta").prop("checked");
		console.log(point);
		
		var obj= new Object();

		obj.nome = name;
		obj.descricao = description;
		obj.idsubmapa = idSubmap;
		obj.ponto = point.toString();
		obj.dispararPergunta = triggerQuestion;
		obj.ordem = 0;

		mapafunction.pointsList.push(obj);

		var popUpContent;
		if (triggerQuestion == true) {
			 popUpContent = '<b>'+name+'</b></br><b>Sorteio de Pergunta</b></br> ';
		} else {
			 popUpContent = '<b>'+name+'</b></br> '+description+'</br> Submapa: '+ nameSubmap;
		}
		
		mapafunction.cleanFormCreatePoint();
		mapafunction.creatSortableListOfPoints(obj);

		$( ".saveMap" ).removeClass("hidden");
		L.marker(point, {icon: blueCircleIcon}).addTo(map)
		.bindPopup(popUpContent)
		.openPopup();
	});
}

// Função para salvar os pontos e a ordenação 
mapafunction.saveMap = function() {
	$( ".saveMap" ).click(function() {
		var pointsListFinal = new Array();
		$("#sortable li").each(function(index, element) {
			let obj= new Object();
			obj.id = $(element).attr("data-id");
			obj.nome = $(element).attr("data-name");
			obj.descricao = $(element).attr("data-description");
			obj.idsubmapa = $(element).attr("data-submap");
			obj.ponto =  $(element).attr("data-point");
			obj.dispararPergunta = $(element).attr("data-question");
			obj.ordem = index;
			pointsListFinal.push(obj);
		});
		$.post( urlAtual + "mapas/createPoints", { pointsList: pointsListFinal })
			.done(function( data ) {
				alert( "Pontos salvos !"  );
			});
	});
}

// Remove um item do array
mapafunction.removeByAttr = function(arr, attr, value){
	var i = arr.length;
	while(i--){
		if(arr[i] && arr[i].hasOwnProperty(attr) && (arguments.length > 2 && arr[i][attr] === value )){ 
			arr.splice(i,1);
		}
	}
	return arr;
}
	
// Procura por um item do array
mapafunction.findByAttr = function(arr, attr, value, result = "elem"){
	var i = arr.length;
	while(i--){
		if(arr[i] && arr[i].hasOwnProperty(attr) && (arguments.length > 2 && arr[i][attr] === value )){
			if (result == "elem") {
				return arr[i];
			} else if (result == "position") {
				return i;
			}
		}
	}
	return false;
}

// Limpa o formulario para adicionar novo ponto 
mapafunction.cleanFormCreatePoint = function(){
	$("#nomePonto").val("");
	$("#descPonto").val("");
	$("#submapalist").val("0");
	$("#disparar_pergunta").attr('checked', false);
}

// Criar os li (listagem) para o sorteio de perguntas
mapafunction.creatSortableListOfPoints = function(obj){
	if (obj.dispararPergunta == true) {
		var dispararPergunta = "Sorteio Pergunta: Sim";
	} else {
		var dispararPergunta = "Sorteio Pergunta: Não";
	}
	$("ul#sortable").append('<li class="ui-state-default" data-id="'+obj.id+'" data-name="'+obj.nome+'" data-description="'+obj.descricao+'" data-point="'+obj.ponto+'" data-submap="'+obj.idsubmapa+'" data-question="'+obj.dispararPergunta+'" data-order=0>  <span class="point-name">'+obj.nome+'</span><span class="point-description">'+obj.descricao+'</span><span class="point-question">'+dispararPergunta+'</span><i class="fa fa-arrows"></i> </li>');
}

	
mapafunction.createMarkerForPlayers = function(user){
//window.createMarkerForPlayers = function(user){
	increase = increase + 5.50;
	console.log(mapafunction.pointsList);
	if (mapafunction.pointsList[0]["ordem"] === 0) {
		let initialPoint = mapafunction.pointsList[0]["ponto"];
		let coordinate = initialPoint.replace("LatLng(", "").replace(")", "").split(",");
		let latitude = parseFloat(coordinate[0]) - increase;
		let longitude = parseFloat(coordinate[1]) - increase;
		let popUpContent = user.name;
		let markerLatLng = "LatLng("+latitude+", "+longitude+")";

		let obj= new Object();
		obj.point = markerLatLng;
		obj.pointId = mapafunction.pointsList[0]["id"];
		obj.userName = user.name;
		obj.userId = user.userId;
		
		//Adiciona o novo ponto
		mapafunction.createPlayerMarker(latitude,longitude,obj.pointId,obj.userId,obj.userName);
	}
}
		//window.createMarkerForPlayers=createMarkerForPlayers;

//Muda o marcador do player de lugar
mapafunction.changePlayersMarker = function(currentPoint){
	//function changePlayersMarker(currentPoint) {
	destinyPoint = findByAttr(mapafunction.pointsList, 'id', parseInt(currentPoint.point),"elem");  
	if (destinyPoint.hasOwnProperty('ponto')) {
		let coordinate = destinyPoint['ponto'].replace("LatLng(", "").replace(")", "").split(",");
		let latitude = parseFloat(coordinate[0]) - 5.50;
		let longitude = parseFloat(coordinate[1]) -  5.50;
		let markerLatLng = "LatLng("+latitude+", "+longitude+")";

		 //pegar o nome do usaurio 
		let obj= new Object();
		obj.point = markerLatLng;
		obj.userName = currentPoint.name;
		obj.userId = currentPoint.userId;
		obj.pointId = currentPoint.point;

		//Deleta o ponto anterior do jogodor
		mapafunction.deletePlayerMarker(obj.userId);

		//Adiciona o novo ponto
		mapafunction.createPlayerMarker(latitude,longitude,obj.pointId,obj.userId,obj.userName);
	
	}
}
		//window.changePlayersMarker=changePlayersMarker;

//Encontra o novo ponto do jogador de acordo com o numero de casas que ele vai avançar
mapafunction.findNewPlayerPoint = function(diceNumber,userId,$rightAnswer = false){
	//function findNewPlayerPoint(diceNumber,userId,$rightAnswer = false) {
	var actualPoint = findByAttr(playeresMarkers, 'userId', userId,"elem");  
	if (actualPoint.hasOwnProperty('pointId')) {
		var numberOfPoints = mapafunction.pointsList.length - 1;
		var actualPointInMapList = mapafunction.findByAttr(mapafunction.pointsList, 'id', parseInt(actualPoint.pointId),"position");
		var destinyPointIndex = parseInt(actualPointInMapList) + parseInt(diceNumber);

	
		if (parseInt(actualPointInMapList) == numberOfPoints) {
			gameOver = true;
		}
		
		if (gameOver == true) {
			alert("Você chegou ao final");
			return null;
		}
		
		if (destinyPointIndex > numberOfPoints) {
			destinyPointIndex = numberOfPoints;
		}
		
		console.log("novo destiny");
		console.log(destinyPointIndex);
		console.log(mapafunction.pointsList[destinyPointIndex]);

		var destinyPoint = mapafunction.pointsList[destinyPointIndex];
		var triggerQuestion = destinyPoint["dispararPergunta"];
		var coordinate = destinyPoint['ponto'].replace("LatLng(", "").replace(")", "").split(",");
		var latitude = parseFloat(coordinate[0]) - 5.50;
		var longitude = parseFloat(coordinate[1]) -  5.50;
		var newPosition;

		if ($rightAnswer == true) {
			mapafunction.deletePlayerMarker(userId);
			newPosition = mapafunction.createPlayerMarker(latitude,longitude,destinyPoint['id'],actualPoint['userId'],actualPoint['userName']);
			if (destinyPointIndex == numberOfPoints) {
				alert("Você chegou ao final");
				gameOver = true;
			}
		} else if (triggerQuestion == true){
			mapafunction.randowQuestion();
		} else {
			mapafunction.deletePlayerMarker(userId);
			newPosition = mapafunction.createPlayerMarker(latitude,longitude,destinyPoint['id'],actualPoint['userId'],actualPoint['userName']);
			if (destinyPointIndex == numberOfPoints) {
				alert("Você chegou ao final");
				gameOver = true;
			}
		}
		return newPosition;
		
	}
}
//	window.findNewPlayerPoint=findNewPlayerPoint;

mapafunction.deletePlayerMarker = function(userId){
	//Deleta o marker do player pelo id 
	//function deletePlayerMarker(userId) {
	console.log(markers)
	mapafunction.removeByAttr(playeresMarkers, 'userId', parseInt(userId));
	console.log("objeto de ponto que será removido");
	if (markers[userId] == undefined){
		return false;
	}
	console.log(markers[userId]);
	map.removeLayer(markers[userId]);
	console.log("objeto de ponto removido");
	
	console.log(markers[userId]);

	//removeByAttr(markers, '_latlng', actuaLatLng);
	console.log("array de markes");
	console.log(markers);
}

//Criar um novo ponto para o usuario 
//Recebe latitude,longitude e id do ponto e id e nome do usuario
mapafunction.createPlayerMarker = function(latitude,longitude,pointId,userId,userName){
	//function createPlayerMarker(latitude,longitude,pointId,userId,userName) {
		 urlAtual = $("#url-root").val();
		 console.log(urlAtual);
		let markerLatLng = "LatLng("+latitude+", "+longitude+")";
		let obj= new Object();
		obj.point = markerLatLng;
		obj.userName = userName;
		obj.userId = userId;
		obj.pointId = pointId;

		playeresMarkers.push(obj);
		let marker = new L.marker([latitude,longitude], {icon: playerIcon});
		markers[obj.userId] = marker;
		map.addLayer(marker);
		marker.bindPopup(obj.userName).openPopup();

		console.log("markes após novo ponto");
		console.log(markers[userId]);

		return obj;
}

	
$(document).ready(function() {
	mapafunction.createMapItem();
	mapafunction.createMap();
	mapafunction.deleteMap();
	mapafunction.alterMapNameIcon();
	mapafunction.alterMapName();
	mapafunction.inicializeSortable();
	mapafunction.saveMap();
	
	$('#image-src').load(function() {
		
		mapafunction.loadMapImage();
		setInterval(function(){
			var gameId = $("#gameId").val();
			ws.send("onliners");
			ws.send("fetch", {"gameId": gameId});
		}, 5000); 
		mapmovefunction.connect();

	});
});
