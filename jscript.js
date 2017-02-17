var ws_host = 'localhost';
var ws_port = '8080';
var ws_folder = '';
var ws_path = '/websocket';

var ws_url = 'ws://' + ws_host;

if (ws_port != '8080' && ws_port.length > 0) {
    ws_url += ':' + ws_port;
}

ws_url += ws_folder + ws_path;

var conn = new WebSocket(ws_url);

conn.onopen = function(e) {
    console.log("Connection established!");
};

conn.onmessage = function(e) {
    
    if(isJson(e.data)){
        
        var response = jQuery.parseJSON(e.data);
        $("#opponent").text(response.opponent);
        $("#opponent").append( '<br><i' +response.opponent + '></i>');
        $("#winner").text(response.result);
        
        if(response.winner === "Player 1" || response.winner === "It's a tie !"){
            j1Score = $("#j1").text();
            $("#j1").text(++j1Score);
        }
        
        if(response.winner === "Player 2" || response.winner === "It's a tie !"){
            j2Score = $("#j2").text();
            $("#j2").text(++j2Score);  
        }
        
        $("#playAgain").css("visibility","visible");

    }
    else
    {
        $('#multiplayers').append(e.data + '<br />');
    }
    

};

function isJson(str) {
    try {
        JSON.parse(str);
    } catch (e) {
        return false;
    }
    return true;
}


var playGame = function()
{
    $(this).closest('div').children(".chooseWeapon")
        .css("background-color","#b9b9b9")
        .unbind('mouseenter').unbind('mouseleave');
    $(this).css('background-color','cadetblue');
    $(".chooseWeapon").off('click',playGame);

    var chosenWeapon = $(this).attr("name");
    conn.send(chosenWeapon);
 
    return false;
}

$(".chooseWeapon").on('click',playGame);

$("#playAgain").click(function(){
    $("#playAgain").css("visibility","hidden");
    $("span.chooseWeapon").css("background-color","tomato");
    $("span.chooseWeapon").hover(function(){
        $(this).css("background-color", "cadetblue");
        }, function(){
        $(this).css("background-color", "tomato");
    });
    
    $("#opponent").text('').append('<i></i>');
    $("#winner").text("");
    $(".chooseWeapon").on('click',playGame);
});
