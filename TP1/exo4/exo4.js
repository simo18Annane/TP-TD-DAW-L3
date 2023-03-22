var login = document.getElementById("lg");
var mssg = document.getElementsByClassName("alert")[0];

login.addEventListener('blur', verif);

function verif() {
  var loginValue = login.value;
  if (loginValue.length < 5) {
    mssg.innerHTML = "Login 5 caracteres mini";
    mssg.style.display = "block";
  } else {
    mssg.style.display = "none";
  }
};