/*
//modifier 2eme Item
var item = document.getElementsByClassName("liste")[1];
item.innerHTML = "Miel";

//supprimer 1er Item
var remItem = document.getElementsByClassName("liste")[0];
remItem.remove();
*/

/*
//ajouter un Item
var nvliste1 = document.createElement("li");
nvliste1.innerHTML = "Confiture";
var elm = document.querySelector("ul");
elm.appendChild(nvliste1);

//ajouter "+" devant les items
function sign(){
    var list = document.querySelector(".lst");
    list.classList.remove('lst');
    list.classList.add("lt");
    
}
*/

/*
//afficher couleur
var clist = window.getComputedStyle(document.querySelector("ul")).getPropertyValue('background-color');
document.getElementById("infoCoul").value = "La precedente couleur : "+clist;
*/

/*
//gestionnaire d'evenement
var listItem = document.querySelectorAll('li');
for (var i = 0; i < listItem.length; i++) {
    listItem[i].addEventListener('mouseover', function(event) {
        var clickedItem = this;
        var eventType = event.type;
        document.getElementById("infoCoul").value = "Item: "+clickedItem.innerHTML+"\n";
        document.getElementById("infoCoul").value += " Statut: important\n";
        document.getElementById("infoCoul").value += " Evenement: "+eventType;
    })
}
*/
/*
//supprimer des items avec un clic
var itemList = document.querySelectorAll('li');
for (var i = 0; i < itemList.length; i++) {
    itemList[i].addEventListener('click', function() {
        var itemclicked = this;
        itemclicked.remove();
    })
}
*/
/*
//ajout d'un produit
function show(){
    document.getElementById("b1").style.visibility = "hidden";
    document.getElementById("ajoutprd").style.visibility = "visible";
    document.getElementById("b2").style.visibility = "visible";
}

function ajout(){
    var nvliste1 = document.createElement("li");
    nvliste1.innerHTML = document.getElementById("ajoutprd").value;
    var elm = document.querySelector("ul");
    elm.appendChild(nvliste1);
}*/