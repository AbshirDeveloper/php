function event() {
					document.getElementById("form").onsubmit = function() {
					if(document.getElementById("mid").value == "" || document.getElementById("labo").value == "" || document.getElementById("sadex").value == "" || document.getElementById("afar").value == "" || document.getElementById("shan").value == ""|| document.getElementById("afar").value !== document.getElementById("shan").value){
					document.getElementById("error").innerHTML = "Please fill all the fields and make sure that your two passwords are equal";
					return false;
					} else {
					document.getElementById("error").innerHTML = "You have successfully registered";
					}
					};
					}
function evente() {
					document.getElementById("fore").onsubmit = function() {
					if(document.getElementById("madax").value == "" || document.getElementById("madax").value == String){
					document.getElementById("log").innerHTML = "Please provide number value the box";
					document.getElementById("log").style.color = "red";
					return false;
					} else {
					document.getElementById("log").innerHTML = "";
					return true;
					}
					};
					}
 function even() {
document.getElementById("for").onsubmit = function() {
					if(document.getElementById("mid").value == "" || document.getElementById("labo").value == "" || document.getElementById("labo").value == String){
					document.getElementById("login").innerHTML = "Please provide correct product info";
					document.getElementById("login").style.color = "red";
					return false;
					} else {
					document.getElementById("login").innerHTML = "";
					return true;
					}
					};

					}

window.onload = function() {
	event();
	evente();
	even();
	tabfocus();
}



