function changeColor(){
    var x = document.getElementById("choixC").value;
    document.body.style.background = x;
}

function calculerS(){
    var x = document.getElementById("nbM").value;
    document.getElementById("sm").innerHTML = 3 * x;
}

function validerB(){
    var sm = document.getElementById("sm").value;
    var sd = document.getElementById("subD").value;
    if(sd>sm)
        {
            alert('Demande de subventions effectuer');
            window.location.reload();
        }
        else {
            alert('erreur: subventions désirée est minimum à la subventions max');
        }
}

function resetB(){
    document.getElementById("formulaire1").reset();
    document.getElementById("formulaire2").reset();
}