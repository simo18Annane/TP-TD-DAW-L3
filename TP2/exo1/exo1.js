$(document).ready(function() {
    $("#b0").click(function() {
     var nvliste = $("<li>");
     nvliste.text($("#ajoutTodo").val());
     $("ol").append(nvliste);
     $("#ajoutTodo").val("");
    })


    $("ol").on("dblclick", "li", function() {
        $(this).remove();
        
    })
 });