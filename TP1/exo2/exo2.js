document.getElementsByClassName("rouge")[0].style.color = "red";

var vert = document.querySelectorAll('.vert');
vert.forEach(element => {
    element.style.color = "green";
})

var baliseb = document.querySelectorAll("b");
for(i=0 ; i < baliseb.length ; i++){
    if (i % 2 == 0)
    {
        baliseb[i].style.color = "blue";
    }
}