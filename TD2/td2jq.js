
$(document).ready(function() {
    /*
    //modifier 2eme Item
    var item = $(".liste").eq(1);
    item.text("Miel");

    //supprimer 1er Item
    var remItem = $(".liste").eq(0);
    remItem.remove();
    */

    /*
    //ajouter un Item
    var nvliste1 = $("<li>", {class: "liste"});
    nvliste1.text("Confiture");
    $("ul").append(nvliste1);

    //ajouter "+"
    $("button").click(function() {
        $("ul").removeClass("lst");
        $("ul").addClass("lt");
    })
    */

    /*
    //afficher la couleur
    var clist = $("ul").css("background-color");
    $("#infoCoul").text("La precedente couleur : "+clist);
    */

    /*
    //gestionnaire d'evenement
    $("li").mouseover(function(event) {
        var clickedItem = $(this);
        var eventType = event.type;
        $("#infoCoul").text("Item: "+clickedItem.text()+"\n");
        $("#infoCoul").append("Statut: important\n");
        $("#infoCoul").append("Evenement: "+eventType);
    })
    */

    /*
    //supprimer des items avec un clic
    $("li").click(function() {
        $(this).remove();
    })
    */

    //ajout d'un nouveau produit
    $("#b1").click(function() {
        $('#b1').hide();
        $('#b2').css("visibility","visible");
        $('#ajoutprd').css("visibility","visible");
    })

    $("#b2").click(function() {
        var nvliste1 = $("<li>", {class: "liste"});
        nvliste1.text($("#ajoutprd").val());
        $("ul").append(nvliste1);
    })

});

