/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var dicefunctions = {};

dicefunctions.rollDice = function(e) {
        var random = Math.floor(Math.random() * 6) + 1;
    if(random == 1){
        $("#dice-3d .dado").css("transform","rotateX(0deg) rotateY(0deg) rotateZ(0deg) scaleX(0.4) scaleY(0.4) scaleZ(0.4)");
        $("#roll-dice .dado").css("transform","translateX(-70px) translateY(-70px) rotateX(0deg) rotateY(0deg) rotateZ(0deg) scaleX(0.15) scaleY(0.15) scaleZ(0.15)");
    }else if(random == 2){
        $("#dice-3d .dado").css("transform","rotateX(0deg) rotateY(-90deg) rotateZ(0deg) scaleX(0.4) scaleY(0.4) scaleZ(0.4)");
        $("#roll-dice .dado").css("transform","translateX(-70px) translateY(-70px) rotateX(0deg) rotateY(-90deg) rotateZ(0deg) scaleX(0.15) scaleY(0.15) scaleZ(0.15)");
    }else if(random == 3){
        $("#dice-3d  .dado").css("transform","rotateX(-90deg) rotateY(0deg) rotateZ(0deg) scaleX(0.4) scaleY(0.4) scaleZ(0.4)");
        $("#roll-dice .dado").css("transform","translateX(-70px) translateY(-70px) rotateX(-90deg) rotateY(0deg) rotateZ(0deg) scaleX(0.15) scaleY(0.15) scaleZ(0.15)");
    }else if(random == 4){
        $("#dice-3d .dado").css("transform","rotateX(90deg) rotateY(0deg) rotateZ(0deg) scaleX(0.4) scaleY(0.4) scaleZ(0.4)");
        $("#roll-dice .dado").css("transform","translateX(-70px) translateY(-70px) rotateX(90deg) rotateY(0deg) rotateZ(0deg) scaleX(0.15) scaleY(0.15) scaleZ(0.15)");
    }else if(random == 5){
        $("#dice-3d .dado").css("transform","rotateX(0deg) rotateY(90deg) rotateZ(0deg) scaleX(0.4) scaleY(0.4) scaleZ(0.4)");
        $("#roll-dice .dado").css("transform","translateX(-70px) translateY(-70px) rotateX(0deg) rotateY(90deg) rotateZ(0deg) scaleX(0.15) scaleY(0.15) scaleZ(0.15)");
    }else if(random == 6){
        $("#dice-3d .dado").css("transform","rotateX(180deg) rotateY(0deg) rotateZ(0deg) scaleX(0.4) scaleY(0.4) scaleZ(0.4)");
        $("#roll-dice .dado").css("transform","translateX(-70px) translateY(-70px) rotateX(180deg) rotateY(0deg) rotateZ(0deg) scaleX(0.15) scaleY(0.15) scaleZ(0.15)");
    }
    $("#diceNumber").attr("value",random);
}

$(document).ready(function(){
   
    $(".item-dado").click(function(){
         //$(this).css("background-color","#ED6B49");
         var nome = $(this).attr("data-nome");
         var id = $(this).attr("data-id");
         var numLados = $(this).attr("data-num-lados");
         $(".criar-dado").addClass("hidden");
         $(".alterar-dado").removeClass("hidden");
         $("input[name='edt-nomeDado']").attr("value",nome);
         $("input[name='edt-id']").attr("value",id);
         $("input[name='edt-numLados']").attr("value",numLados);
         $("input[name='id-delete']").attr("value",id);
    });

    // var randow : numero aleatorio soretado
    // 6 é o numero maximo que ele vai sortear podendo ser substituido por outro 
   // var randow = Math.floor(Math.random() * 6) + 1;
   $(".dado").click(function(e){
        dicefunctions.rollDice();
   });
   $("#roll-dice").click(function(e){
        dicefunctions.rollDice();
   });
});
