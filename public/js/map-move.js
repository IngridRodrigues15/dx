var userList = new Array();
mapmovefunction = {};

// Remove um item do array
var findByAttr = function(arr, attr, value){
	var i = arr.length;
	while(i--){
		if(arr[i] && arr[i].hasOwnProperty(attr) && (arguments.length > 2 && arr[i][attr] === value )){ 
			return arr[i];
		}
	}
	return false;
}

mapmovefunction.connect = function(){
	window.ws = $.websocket("ws://www.dxsmartgames.com.br:8080", {
		open: function() {
			$(".connectionBox .status").text("Online");
			var userName = $("#userName").val();
			var userId = $("#userId").val();
			var gameId = $("#gameId").val();

			console.log("Conectei");
			ws.send("register", {"name": userName,"userId": userId, "gameId": gameId});
			//ws.send("fetch", {"gameId": gameId});
		},
		close: function() {
			$(".connectionBox .status").text("Offline");
		},
		events: {
			fetch: function(e) {
				$(".connectionBox .msgs").html('');
				$.each(e.data, function(i, elem){
					let user = findByAttr(userList, "userId", elem.id_usuario);
					console.log("fetch");
					console.log(elem);
					if (user["name"] !== undefined) {
						let obj= new Object();
						obj.userId = elem.id_usuario;
						obj.point = elem.id_ponto_mapa_atual;
						obj.name = user["name"];
						console.log("Uusuario que terá ponto no inicio");
						console.log(obj);
						mapafunction.changePlayersMarker(obj);
					}
				});
			},
			onliners: function(e){
				$(".connectionBox  .users").html('');
				$.each(e.data, function(i, elem){
					$(".connectionBox .users").append("<div class='user'>"+ elem.name +"</div>");
					userExists = findByAttr(userList, 'name', elem.name);  
					console.log("onlines");
					console.log(elem);
					if (userExists == false) {
						let obj= new Object();
						obj.name = elem.name;
						obj.userId = elem.userId;
						userList.push(obj);
						console.log(obj);
						mapafunction.createMarkerForPlayers(obj);
					}
				});
			}
		}
	});
};
$(document).ready(function(){

	$(".dado").click(function(){
		var diceNumber = $("#diceNumber").val();
		var userId = $("#userId").val();
		var gameId = $("#gameId").val();

		var newPosition = mapafunction.findNewPlayerPoint(diceNumber,userId,false);
		console.log("Nova posicao pelo dado");
		console.log(newPosition);
		if (newPosition != undefined) {
			newPosition.gameId = gameId;
			ws.send("send", newPosition);
		}
		
	});
	$(".connectionBox .status").on("click", function(){
		if($(this).text() == "Offline"){
			mapmovefunction.connect();
		}
	});
	$("#game-points").on("change", function(){
		var diceNumber = $("#diceNumber").val();
		var userId = $("#userId").val();
		var gameId = $("#gameId").val();

		var newPosition = mapafunction.findNewPlayerPoint(diceNumber,userId,true);
		console.log(newPosition);
		if (newPosition != undefined) {
			newPosition.gameId = gameId;
			console.log("Nova posicao pelo game point");
			console.log(newPosition);
			ws.send("send", newPosition);
		}
	});

	
});