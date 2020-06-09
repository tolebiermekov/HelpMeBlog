$(document).ready(function(){
    $("p").hover(function(){
        $(this).css("color", "red");
    }, function(){
        $(this).css("color", "black");
    });
});