var nvliste1 = document.createElement("li");
nvliste1.innerHTML = "lait";
var elm = document.querySelector("ul");
var enf = document.getElementsByTagName("li")[0];
elm.insertBefore(nvliste1,enf); 

var nvliste2 = document.createElement("li");
nvliste2.innerHTML = "Riz";
elm.appendChild(nvliste2);

//modifier le nom de la classe
var change = document.querySelectorAll(".liste");
change.forEach(element => {
    element.classList.remove('liste');
    element.classList.add('lst');
})
/*pour verifier
var modif = document.getElementsByClassName("lst")[2];
modif.innerHTML = "poisson";
*/

var elmlst = document.querySelectorAll('ul');
for (var i = 0; i < elmlst.length; i++){
    var lielm = elmlst[i].children;
    var nbrlst = lielm.length;
    document.getElementById("nbrelm").innerHTML += nbrlst;
    document.getElementById("nbrelm").style.backgroundColor = "black";
    document.getElementById("nbrelm").style.color = "white";
    document.getElementById("nbrelm").style.borderRadius = "15px";
    document.getElementById("nbrelm").style.fontSize = "10px";
    document.getElementById("nbrelm").style.padding = "1%";
}