$(document).ready(function(){
    $("#btn").click(function(){
        $.ajax({url: "phones.txt", success: function(result){
                $("#p1").html(result);
            }});
    });
});